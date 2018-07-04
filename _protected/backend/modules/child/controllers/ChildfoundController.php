<?php

namespace backend\modules\child\controllers;

use Yii;
use backend\modules\child\models\Childfound;
use backend\modules\child\models\ChildfoundSearch;
use backend\modules\child\models\Child;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * ChildfoundController implements the CRUD actions for Childfound model.
 */
class ChildfoundController extends Controller
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
     * Lists all Childfound models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new ChildfoundSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Childfound model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Childfound #".$id,
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
     * Creates a new Childfound model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Childfound();  
        $child = new Child();

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
                        'child' => $child,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post())) {
                $child->load($request->post()) ;   

                $countChildren = Child::find()
                ->where('childLastName=:u',['u'=>$child->childLastName])
                ->andWhere('childFirstName=:t',['t'=>$child->childFirstName])
                ->count(); 
        
     
                    if( $countChildren == 0 ){
                        
                        if($child->save() ){
                                        
                        $model->child_id = $child->id;
                        $model->save(); 

                        }

                    }else{     

                    $childInfo = Child::find()
                    ->where('childLastName=:u',['u'=>$child->childLastName])
                    ->andWhere('childFirstName=:t',['t'=>$child->childFirstName])
                    ->one(); 

                        $model->child_id = $childInfo->id;
                        $model->save();
                            
                    } 

                       return [
                        'forceReload'=>'#crud-datatable-pjax',
                        'title'=> "",
                        'content'=>'<span class="text-success">Create Childfound success</span>',
                        'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
            
                    ];        


            }else{           
                return [
                    'title'=> "",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                        'child' => $child,
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
                $child->load($request->post()) ;   

                $countChildren = Child::find()
                ->where('childLastName=:u',['u'=>$child->childLastName])
                ->andWhere('childFirstName=:t',['t'=>$child->childFirstName])
                ->count(); 
        
     
                    if( $countChildren == 0 ){
                        
                        if($child->save() ){
                                        
                        $model->child_id = $child->id;
                        $model->save(); 

                        }

                    }else{     

                    $childInfo = Child::find()
                    ->where('childLastName=:u',['u'=>$child->childLastName])
                    ->andWhere('childFirstName=:t',['t'=>$child->childFirstName])
                    ->one(); 

                        $model->child_id = $childInfo->id;
                        $model->save();
                            
                    } 

                        return $this->redirect(['view', 'id' => $model->id]);  


            } else {
                return $this->render('create', [
                    'model' => $model,
                    'child' => $child,
                ]);
            }
        }
       
    }

    /**
     * Updates an existing Childfound model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id); 
        $child = new Child();      

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "#".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                        'child' => $child,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                  
            }
            else if($model->load($request->post())) {
                $child->load($request->post()) ;   

                $countChildren = Child::find()
                ->where('childLastName=:u',['u'=>$child->childLastName])
                ->andWhere('childFirstName=:t',['t'=>$child->childFirstName])
                ->count(); 
        
     
                    if( $countChildren == 0 ){
                        
                        if($child->save() ){
                                        
                        $model->child_id = $child->id;
                        $model->save(); 

                        }

                    }else{     

                    $childInfo = Child::find()
                    ->where('childLastName=:u',['u'=>$child->childLastName])
                    ->andWhere('childFirstName=:t',['t'=>$child->childFirstName])
                    ->one(); 

                        $model->child_id = $childInfo->id;
                        $model->save();
                            
                    } 

                    return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "#".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                        'child' => $child,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];          


            }

            else{
                 return [
                    'title'=> "#".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                        'child' => $child,
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
                $child->load($request->post()) ;   

                $countChildren = Child::find()
                ->where('childLastName=:u',['u'=>$child->childLastName])
                ->andWhere('childFirstName=:t',['t'=>$child->childFirstName])
                ->count(); 
        
     
                    if( $countChildren == 0 ){
                        
                        if($child->save() ){
                                        
                        $model->child_id = $child->id;
                        $model->save(); 

                        }

                    }else{     

                    $childInfo = Child::find()
                    ->where('childLastName=:u',['u'=>$child->childLastName])
                    ->andWhere('childFirstName=:t',['t'=>$child->childFirstName])
                    ->one(); 

                        $model->child_id = $childInfo->id;
                        $model->save();
                            
                    } 

                        return $this->redirect(['view', 'id' => $model->id]);  


            } else {
                return $this->render('update', [
                    'model' => $model,
                    'child' => $child,
                ]);
            }
        }
    }

    /**
     * Delete an existing Childfound model.
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
     * Delete multiple existing Childfound model.
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
     * Finds the Childfound model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Childfound the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Childfound::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
