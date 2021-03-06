<?php

namespace backend\modules\child\controllers;

use Yii;
use backend\modules\child\models\Childussdapproval;
use backend\modules\child\models\ChildussdapprovalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use backend\modules\child\models\Childussd;

use backend\modules\child\models\Child;
use backend\modules\child\models\Childemployment;
use backend\modules\child\models\Childfound;
use backend\modules\child\models\Childcase2;

use backend\modules\registrationderegistration\models\Rdemployeraddress;
use backend\modules\registrationderegistration\models\Rdperson2;
use backend\modules\registrationderegistration\models\Rdemployerrepresentative;
use backend\modules\registrationderegistration\models\Rdemployernumberofemployee;
use backend\modules\registrationderegistration\models\Rdemployerstatus;
use backend\modules\registrationderegistration\models\Rdemployment;
use backend\modules\registrationderegistration\models\Rdemployerecosector;
use backend\modules\registrationderegistration\models\Rdemployer2;
use backend\models\Model;


/**
 * ChildussdapprovalController implements the CRUD actions for Childussdapproval model.
 */
class ChildussdapprovalController extends Controller
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
     * Lists all Childussdapproval models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new ChildussdapprovalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $_GET['id'],
        ]);
    }


    /**
     * Displays a single Childussdapproval model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Childussdapproval #".$id,
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
     * Creates a new Childussdapproval model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Childussdapproval();

        
        $child = new Child(); 
        $employment = new Childemployment();
        $childfound = new Childfound();
        $childcase = new Childcase2();  

        $establishment = new Rdemployer2 ();
        $address = new Rdemployeraddress();
        $person  = new Rdperson2();
        $representative = new Rdemployerrepresentative();
        $employeenumbers = new Rdemployernumberofemployee();
        $employerstatus = new Rdemployerstatus(); 
        $modelsecononicsector = [new Rdemployerecosector]; 


        //create object to get data from childussd table

        $dataModel = new Childussd;
        $dataFromUSSD = $dataModel->find()->where('id='.$_GET['id'])->one(); 


        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                        'dataFromUSSD'=>$dataFromUSSD,

                        'childcase' => $childcase,
                        'child' => $child,
                        'employment' => $employment,
                        'childfound' => $childfound,

                        'establishment' => $establishment,
                        'address' => $address,
                        'person' => $person,
                        'representative'=>$representative,
                        'employeenumbers'=>$employeenumbers,
                        'employerstatus'=>$employerstatus,
                        'modelseconomicsector'=>(empty($modelseconomicsector)) ? [new Rdemployerecosector ]: $modelseconomicsector
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post())){

                $dataFromUSSD->reported=1;
                $dataFromUSSD->save();

                if($model->save()){
                    return [
                        'forceReload'=>'#crud-datatable-pjax',
                        'title'=> "",
                        'content'=>'<span class="text-success">Create Childussdapproval success</span>',
                        'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::a('Create More',['create?idplan='.$_GET['id']],['class'=>'btn btn-primary','role'=>'modal-remote'])
            
                    ]; 

                }

                        
            }else{           
                return [
                    'title'=> "",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                        'dataFromUSSD'=>$dataFromUSSD,


                        'childcase' => $childcase,
                        'child' => $child,
                        'employment' => $employment,
                        'childfound' => $childfound,
                        'establishment' => $establishment,
                        'address' => $address,
                        'person' => $person,
                        'representative'=>$representative,
                        'employeenumbers'=>$employeenumbers,
                        'employerstatus'=>$employerstatus,
                        'modelseconomicsector'=>(empty($modelseconomicsector)) ? [new Rdemployerecosector ]: $modelseconomicsector
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }
        }else{
            /*
            *   Process for non-ajax request
            */
           if($model->load($request->post())){
                
                $dataFromUSSD->reported=1;
                // echo "<pre>";
                // print_r($model);die;
                $dataFromUSSD->save();

                if($model->save()){

                return $this->redirect(['view', 'id' => $model->id]); 

                }
                        
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'dataFromUSSD'=>$dataFromUSSD,

                    'childcase' => $childcase,
                    'child' => $child,
                    'employment' => $employment,
                    'childfound' => $childfound,
                    'establishment' => $establishment,
                    'address' => $address,
                    'person' => $person,
                    'representative'=>$representative,
                    'employeenumbers'=>$employeenumbers,
                    'employerstatus'=>$employerstatus,
                    'modelseconomicsector'=>(empty($modelseconomicsector)) ? [new Rdemployerecosector ]: $modelseconomicsector
                ]);
            }
        }
       
    }

    /**
     * Updates an existing Childussdapproval model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);  

        $dataModel = new Childussd;
        $dataFromUSSD = $dataModel->find()->where('id='.$_GET['id'])->one();      

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> " #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                        'dataFromUSSD'=>$dataFromUSSD,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> " #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                        'dataFromUSSD'=>$dataFromUSSD,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> " #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                        'dataFromUSSD'=>$dataFromUSSD,
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
                    'dataFromUSSD'=>$dataFromUSSD,
                ]);
            }
        }
    }

    /**
     * Delete an existing Childussdapproval model.
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
     * Delete multiple existing Childussdapproval model.
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
     * Finds the Childussdapproval model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Childussdapproval the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Childussdapproval::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
