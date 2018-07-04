<?php

namespace frontend\modules\osh\controllers;

use Yii;
use frontend\modules\osh\models\Oshinjuryopenn;
use frontend\modules\osh\models\OshinjuryopennSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use backend\modules\registrationderegistration\models\Rdperson;

/**
 * OshinjuryopennController implements the CRUD actions for Oshinjuryopenn model.
 */
class OshinjuryopennController extends Controller
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
     * Lists all Oshinjuryopenn models.
     * @return mixed
     */
    // public function actionIndex()
    // {    
    //     $searchModel = new OshinjuryopennSearch();
    //     $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    //     return $this->render('index', [
    //         'searchModel' => $searchModel,
    //         'dataProvider' => $dataProvider,
    //     ]);
    // }

    public function actionIndex()
    {
        $model = new Oshinjuryopenn;
        $person = new Rdperson;
        if(!Yii::$app->user->isGuest){

            $searchModel = new OshinjuryopennSearch;
            $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

            return $this->render('index', [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
            ]);
        }else{
            return $this->render('create', [
                'model' => $model,
                'person' => $person,
            ]);
        }
    }


    /**
     * Displays a single Oshinjuryopenn model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Oshinjuryopenn #".$id,
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
     * Creates a new Oshinjuryopenn model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Oshinjuryopenn(); 
        $person = new Rdperson(); 

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new Oshinjuryopenn",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                        'person' => $person,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Create new Oshinjuryopenn",
                    'content'=>'<span class="text-success">Create Oshinjuryopenn success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> "Create new Oshinjuryopenn",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                        'person' => $person,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if($model->load($request->post())) {
                $person->load($request->post()) ;

                 $countPersons = Rdperson::find()
                    ->where('nid=:u',['u'=>$person->nid])
                    ->count();

                 if( $countPersons == 0 ){
                        
                        if( $person->save() ){   

                            $model->employee_id = $person->id;
                            $model->save();
                        }

                    }else{ 
                        
                    $personInfo = Rdperson::find()
                    ->where('nid=:u',['u'=>$person->nid])
                    ->one();

                        $model->save();

                        $model->employee_id = $personInfo->id;
                        $model->save();
                            
                    }
                return $this->redirect(['view', 'id' => $model->id]);             
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'person' => $person,
                ]);
            }
        }
       
    }

    /**
     * Updates an existing Oshinjuryopenn model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);   
        $person = new Rdperson();    

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update Oshinjuryopenn #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                        'person' => $person,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Oshinjuryopenn #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                        'person' => $person,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update Oshinjuryopenn #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                        'person' => $person,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];        
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if($model->load($request->post())) {
                $person->load($request->post()) ;

                 $countPersons = Rdperson::find()
                    ->where('nid=:u',['u'=>$person->nid])
                    ->count();

                 if( $countPersons == 0 ){
                        
                        if( $person->save() ){  

                        // if($model->injurytype_id == 1){               
                        //     $model->desease_id =1;                                             
                        //     }
                            $model->employee_id = $person->id;
                            $model->save();
                        }

                    }else{ 
                        
                    $personInfo = Rdperson::find()
                    ->where('nid=:u',['u'=>$person->nid])
                    ->one();

                        // if($model->injurytype_id == 1){               
                        //     $model->desease_id =1;                                             
                        //     }
                        $model->employee_id = $personInfo->id;
                        $model->save();
                            
                    }
                return $this->redirect(['view', 'id' => $model->id]);             
            }else {
                return $this->render('update', [
                    'model' => $model,
                    'person' => $person,
                ]);
            }
        }
    }

    /**
     * Delete an existing Oshinjuryopenn model.
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
     * Delete multiple existing Oshinjuryopenn model.
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
     * Finds the Oshinjuryopenn model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Oshinjuryopenn the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Oshinjuryopenn::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
