<?php

namespace backend\modules\audit\controllers;

use Yii;
use backend\modules\audit\models\AuditAnswer;
use backend\modules\audit\models\AuditAnswerSearch;
use backend\modules\audit\models\AuditAnswerinfo;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

use backend\modules\audit\models\AuditOption;
use backend\modules\audit\models\AuditSummary;
use backend\modules\audit\models\AuditSummarySearch;

/**
 * AuditAnswerController implements the CRUD actions for AuditAnswer model.
 */
class AuditAnswerController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all AuditAnswer models.
     * @return mixed
     */
    public function actionIndex()
    {            
        IF(ISSET($_GET['aid']))
            $aid=$_GET['aid'];
        ELSE
            $aid=NULL;
        
        IF(ISSET($_GET['id']))
            $eid=$_GET['id'];
        ELSE
            $eid=NULL;
        
        $searchModel = new AuditAnswerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['audit_id'=>$aid,'establishment_id'=>$eid]);
        
        $summarySearchModel = new AuditSummarySearch();
        $summaryDataProvider = $summarySearchModel->search(Yii::$app->request->queryParams);
        $summaryDataProvider->query->andWhere(['audit_id'=>$aid,'establishment_id'=>$eid]);
        
        $myAverage = 0;
        $myTot  =0;
        $myCnt = 0;
        
        foreach ($summaryDataProvider->models as $key => $value) {
            $myTot += $value['percentage'];
            $myCnt++; // This should be $myCnt
        }
        
        if ($myCnt>0){  // inside if use $myCnt
            $myAverage = $myTot/$myCnt; // here use $myTot/$myCnt
        }
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'summarySearchModel' => $summarySearchModel,
            'summaryDataProvider' => $summaryDataProvider,
            'average'=>$myAverage,
        ]);
    }
    
    public function actionAuditedEstablishment()
    {    
        $searchModel = new AuditAnswerSearch();
        $dataProvider = $searchModel->searchDistinct(Yii::$app->request->queryParams);

        return $this->render('establishment', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionAudit()
    {    
        $aid=$_POST['id'];
        
        $searchModel = new AuditAnswerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['audit_id'=>$aid]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single AuditAnswer model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "AuditAnswer #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new AuditAnswer model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {   
        $request = Yii::$app->request;
        $model = new AuditAnswer();  

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new AuditAnswer",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Create new AuditAnswer",
                    'content'=>'<span class="text-success">Create AuditAnswer success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> "Create new AuditAnswer",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }
        }else{
            /*
            *   Process for non-ajax request
            */

            if ($model->load($request->post())) {
                
                IF(ISSET($_POST['AuditAnswer']['audit_id']))
                    $aid=$_POST['AuditAnswer']['audit_id'];
                
                IF(ISSET($_POST['AuditAnswer']['establishment_id']))
                    $eid=$_POST['AuditAnswer']['establishment_id'];
                
                $rows = [];
                
                
                $options=$_POST['option'];
                $answers=$_POST['answer'];
                $answersradio=$_POST['answerradio'];
             
                for($i=0; $i < COUNT($_POST['option']); $i++)
                {
                    $questions=new AuditOption();
                    $question=$questions::find()
                            ->select('question_id')
                            ->where(['id' => $options[$i]])
                            ->asArray()
                            ->all();
                    
                    IF($answers[$i]!='')
                    {
                        $row[]=
                        [
                            'inspection_id' => $aid,
                            'establishment_id' => $eid,
                            'question_id' => $question[0]['question_id'],
                            'option_id' => $options[$i],
                            'answer' => $answers[$i],
                            'created_by' => Yii::$app->user->getId(),
                            'created_on' => date("Y-m-d h:i:s"),
                        ];
                    }
                }
                
                Yii::$app->db->createCommand()->batchInsert(AuditAnswerinfo::tableName(), ['audit_id','establishment_id','question_id','option_id','answer','created_by','created_on'], $row)->execute();
                
                foreach($answersradio AS $key=>$value)
                {        
                    $rowradio[]=
                    [
                        'inspection_id' => $aid,
                        'establishment_id' => $eid,
                        'question_id' => $key,
                        'option_id' => 0,
                        'answer' => $value,
                        'created_by' => Yii::$app->user->getId(),
                        'created_on' => date("Y-m-d h:i:s"),
                    ];
                }
                
                Yii::$app->db->createCommand()->batchInsert(AuditAnswer::tableName(), ['audit_id','establishment_id','question_id','option_id','answer','created_by','created_on'], $rowradio)->execute();
                
                //return $this->redirect(['view', 'id' => $model->id]);
                return $this->redirect(['audited-establishment','id'=>$model->audit_id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
       
    }

    /**
     * Updates an existing AuditAnswer model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update AuditAnswer #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post())){
                $model->created_by=Yii::$app->user->identity->id;;
                $model->created_on=date("Y-m-d h:i:s");
                $model->save();
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "AuditAnswer #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update AuditAnswer #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];        
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post())) {
                $model->created_by=Yii::$app->user->identity->id;;
                $model->created_on=date("Y-m-d h:i:s");
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing AuditAnswer model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }


    }

     /**
     * Delete multiple existing AuditAnswer model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkDelete()
    {        
        $request = Yii::$app->request;
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
       
    }

    /**
     * Finds the AuditAnswer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AuditAnswer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuditAnswer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
