<?php

namespace backend\modules\inspection\controllers;

use Yii;
use backend\modules\inspection\models\InspectionAnswer;
use backend\modules\inspection\models\InspectionAnswerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

use backend\modules\inspection\models\InspectionOption;

/**
 * InspectionAnswerController implements the CRUD actions for InspectionAnswer model.
 */
class InspectionAnswerController extends Controller
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
     * Lists all InspectionAnswer models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $request = Yii::$app->request;
        $iid=$request->get('iid');
        $eid=$request->get('eid');
        $name=$request->get('name');
        
        $searchModel = new InspectionAnswerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['inspection_id'=>$iid,'establishment_id'=>$eid]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionEstablishment()
    {    
        $request = Yii::$app->request;
        $iid=$request->get('id');
        //$iid=2;
        $searchModel = new InspectionAnswerSearch();
        $dataProvider = $searchModel->searchByEstablishment(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['inspection_id'=>$iid]);

        return $this->render('establishment', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionInspection()
    {    
        IF(ISSET($_POST['id']))
            $eid=$_POST['id'];
        ELSE 
            $eid=NULL;
        
        $searchModel = new InspectionAnswerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['inspection_id'=>$eid]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single InspectionAnswer model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "InspectionAnswer #".$id,
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
     * Creates a new InspectionAnswer model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new InspectionAnswer();  

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new InspectionAnswer",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post())){
                
                IF(ISSET($_POST['InspectionAnswer']['inspection_id']))
                    $id=$_POST['InspectionAnswer']['inspection_id'];
        
                IF(ISSET($_POST['InspectionAnswer']['establishment_id']))
                    $eid2=$_POST['InspectionAnswer']['establishment_id'];
                
                $rows = [];
                
                $u= array_keys($_POST);

                for($i=2;$i<=COUNT($u);$i++)
                {
                    //echo $i."/";
                    $k=$u[$i];
                    
                    for($j=0;$j<COUNT($_POST[$k]);$j++)
                    {
                        IF($_POST[$k][$j]!='')
                        {
                            $model->inspection_id=$id;
                            $model->establishment_id=$_POST['InspectionAnswer']['establishment_id'];
                            $model->question_id=$i;
                            $model->option_id=$j;
                            $model->answer= $_POST[$k][$j];
                            $model->created_by=Yii::$app->user->getId();
                            $model->created_on=date("Y-m-d");
                            $model->save(false);
                        }
                    }
                }
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Create new InspectionAnswer",
                    'content'=>'<span class="text-success">Create InspectionAnswer success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> "Create new InspectionAnswer",
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
                
                IF(ISSET($_POST['InspectionAnswer']['inspection_id']))
                    $iid=$_POST['InspectionAnswer']['inspection_id'];
        
                IF(ISSET($_POST['InspectionAnswer']['establishment_id']))
                    $eid=$_POST['InspectionAnswer']['establishment_id'];
                
                $rows = [];
                
                $options=$_POST['option'];
                $answers=$_POST['answer'];
             
                for($i=0; $i < COUNT($_POST['option']); $i++)
                {
                    $questions=new InspectionOption();
                    $question=$questions::find()
                            ->select('question_id')
                            ->where(['id' => $options[$i]])
                            ->asArray()
                            ->all();
                    
                    IF($answers[$i]!='')
                    {
                        $row[]=
                        [
                            'inspection_id' => $iid,
                            'establishment_id' => $eid,
                            'question_id' => $question[0]['question_id'],
                            'option_id' => $options[$i],
                            'answer' => $answers[$i],
                            'created_by' => Yii::$app->user->getId(),
                            'created_on' => date("Y-m-d h:i:s"),
                        ];
                    }
                }
                
//                print "<pre>";
//                print_r($row);
//                print "</pre>";
//                die();
                
                Yii::$app->db->createCommand()->batchInsert(InspectionAnswer::tableName(), ['inspection_id','establishment_id','question_id','option_id','answer','created_by','created_on'], $row)->execute();
                
                return $this->redirect(['establishment', 'id' => $iid]);
                //return $this->redirect('establishment');
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
       
    }

    /**
     * Updates an existing InspectionAnswer model.
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
                    'title'=> "Update InspectionAnswer #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "InspectionAnswer #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update InspectionAnswer #".$id,
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
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing InspectionAnswer model.
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
     * Delete multiple existing InspectionAnswer model.
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
     * Finds the InspectionAnswer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InspectionAnswer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InspectionAnswer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
