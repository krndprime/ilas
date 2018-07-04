<?php

namespace backend\modules\osh\controllers;

use Yii;
use backend\modules\osh\models\Oshinjury;
use backend\modules\osh\models\OshinjurySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use backend\modules\registrationderegistration\models\Rdperson;
use backend\modules\registrationderegistration\models\Rdemployment;
use backend\modules\osh\models\Oshpreventivemeasure;
use backend\modules\osh\models\Oshactiontaken;

/**
 * OshinjuryController implements the CRUD actions for Oshinjury model.
 */
class OshinjuryController extends Controller
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
     * Lists all Oshinjury models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new OshinjurySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Oshinjury model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Oshinjury #".$id,
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
     * Creates a new Oshinjury model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Oshinjury(); 
        $person = new Rdperson();
        $employment = new Rdemployment(); 

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new Oshinjury",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                        'person' => $person,
                        'employment' => $employment,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post())) {
                $person->load($request->post()) ;
                $employment->load($request->post()) ;

                  $countPersons = Rdperson::find()
                    ->where('nid=:u',['u'=>$person->nid])
                    ->count();
        
     
                    if( $countPersons == 0 ){
                        
                        if( $person->save()){
                                        
                            $employment->person_id = $person->id;
                            $employment->employer_id =Yii::$app->user->identity->id;   //Yii::$app->user->identity->id;
                            $employment->save();

                            $model->employee_id = $person->id;
                            if( $person->save()){
                                        
                            $employment->person_id = $person->id;
                            $employment->employer_id =Yii::$app->user->identity->id;   //Yii::$app->user->identity->id;
                            $employment->save();

                            $model->employee_id = $person->id;
                    
                                if($model->save()){

                                    foreach($model->preventivemeasure AS $measure)
                                    {
                                        $preventivemeasuremodel= new Oshpreventivemeasure();
                                        $preventivemeasuremodel->oshinjury_id=$model->id;
                                        $preventivemeasuremodel->preventivemeasure_id=$measure;
                                        $preventivemeasuremodel->createdBy=Yii::$app->user->identity->id;
                                        $preventivemeasuremodel->createdOn=date("Y-m-d h:i:s");  
                                        $preventivemeasuremodel->save();
                                    }

                                     foreach($model->actiontaken AS $action)
                                    {
                                        $actionmodel= new Oshactiontaken();
                                        $actionmodel->oshinjury_id=$model->id;
                                        $actionmodel->actiontaken_id=$action;
                                        $actionmodel->createdBy=Yii::$app->user->identity->id;
                                        $actionmodel->createdOn=date("Y-m-d h:i:s");  
                                        $actionmodel->save();
                                    }

                                    }


                                    }


                        }

                    }else{ 
                        
                    $personInfo = Rdperson::find()
                    ->where('nid=:u',['u'=>$person->nid])
                    ->one();

                        $employment->person_id = $personInfo->id;
                        $employment->employer_id =Yii::$app->user->identity->id;
                        $employment->save();

                        $model->employee_id = $personInfo->id;
                        if( $person->save()){
                                        
                            $employment->person_id = $person->id;
                            $employment->employer_id =Yii::$app->user->identity->id;   //Yii::$app->user->identity->id;
                            $employment->save();

                            $model->employee_id = $person->id;
                    
                                if($model->save()){

                                    foreach($model->preventivemeasure AS $measure)
                                    {
                                        $preventivemeasuremodel= new Oshpreventivemeasure();
                                        $preventivemeasuremodel->oshinjury_id=$model->id;
                                        $preventivemeasuremodel->preventivemeasure_id=$measure;
                                        $preventivemeasuremodel->createdBy=Yii::$app->user->identity->id;
                                        $preventivemeasuremodel->createdOn=date("Y-m-d h:i:s");  
                                        $preventivemeasuremodel->save();
                                    }

                                     foreach($model->actiontaken AS $action)
                                    {
                                        $actionmodel= new Oshactiontaken();
                                        $actionmodel->oshinjury_id=$model->id;
                                        $actionmodel->actiontaken_id=$action;
                                        $actionmodel->createdBy=Yii::$app->user->identity->id;
                                        $actionmodel->createdOn=date("Y-m-d h:i:s");  
                                        $actionmodel->save();
                                    }

                                    }


                                    }
                            
                    }   
                     return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Create new Oshinjury",
                    'content'=>'<span class="text-success">Create Oshinjury success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];     


            }else{           
                return [
                    'title'=> "Create new Oshinjury",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                        'person' => $person,
                        'employment' => $employment,
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
                $person->load($request->post()) ;
                $employment->load($request->post()) ;


                $countPersons = Rdperson::find()
                    ->where('nid=:u',['u'=>$person->nid])
                    ->count();        
     
                    if( $countPersons == 0 ){
                        
                        if( $person->save()){
                                        
                            $employment->person_id = $person->id;
                            $employment->employer_id =Yii::$app->user->identity->id;   //Yii::$app->user->identity->id;
                            $employment->save();

                            $model->employee_id = $person->id;
                    
                                if($model->save()){

                                    foreach($model->preventivemeasure AS $measure)
                                    {
                                        $preventivemeasuremodel= new Oshpreventivemeasure();
                                        $preventivemeasuremodel->oshinjury_id=$model->id;
                                        $preventivemeasuremodel->preventivemeasure_id=$measure;
                                        $preventivemeasuremodel->createdBy=Yii::$app->user->identity->id;
                                        $preventivemeasuremodel->createdOn=date("Y-m-d h:i:s");  
                                        $preventivemeasuremodel->save();
                                    }

                                     foreach($model->actiontaken AS $action)
                                    {
                                        $actionmodel= new Oshactiontaken();
                                        $actionmodel->oshinjury_id=$model->id;
                                        $actionmodel->actiontaken_id=$action;
                                        $actionmodel->createdBy=Yii::$app->user->identity->id;
                                        $actionmodel->createdOn=date("Y-m-d h:i:s");  
                                        $actionmodel->save();
                                    }

                                    }


                                    }

                                    }else{ 
                                        
                                    $personInfo = Rdperson::find()
                                    ->where('nid=:u',['u'=>$person->nid])
                                    ->one();

                                        $employment->person_id = $personInfo->id;
                                        $employment->employer_id =Yii::$app->user->identity->id;
                                        $employment->save();

                                        $model->employee_id = $personInfo->id;                        

                                        if($model->save()){

                                        foreach($model->preventivemeasure AS $measure)
                                        {
                                            $preventivemeasuremodel= new Oshpreventivemeasure();
                                            $preventivemeasuremodel->oshinjury_id=$model->id;
                                            $preventivemeasuremodel->preventivemeasure_id=$measure;
                                            $preventivemeasuremodel->createdBy=Yii::$app->user->identity->id;
                                            $preventivemeasuremodel->createdOn=date("Y-m-d h:i:s");  
                                            $preventivemeasuremodel->save();
                                        }

                                         foreach($model->actiontaken AS $action)
                                        {
                                            $actionmodel= new Oshactiontaken();
                                            $actionmodel->oshinjury_id=$model->id;
                                            $actionmodel->actiontaken_id=$action;
                                            $actionmodel->createdBy=Yii::$app->user->identity->id;
                                            $actionmodel->createdOn=date("Y-m-d h:i:s");  
                                            $actionmodel->save();
                                        }

                                        }
                                            
                                    }
                
                            return $this->redirect(['view', 'id' => $model->id]);
               
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'person' => $person,
                    'employment' => $employment,
                ]);
            }
        }
       
    }

    /**
     * Updates an existing Oshinjury model.
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
                    'title'=> "Update Oshinjury #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Oshinjury #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update Oshinjury #".$id,
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
     * Delete an existing Oshinjury model.
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
     * Delete multiple existing Oshinjury model.
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
     * Finds the Oshinjury model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Oshinjury the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Oshinjury::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
