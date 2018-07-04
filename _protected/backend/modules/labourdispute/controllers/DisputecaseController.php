<?php

namespace backend\modules\labourdispute\controllers;

use Yii;
use backend\modules\labourdispute\models\Disputecase;
use backend\modules\labourdispute\models\DisputecaseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use backend\modules\registrationderegistration\models\Rdperson2;
use backend\modules\registrationderegistration\models\Rdemployment;
use backend\modules\labourdispute\models\Disputenote;

/**
 * DisputecaseController implements the CRUD actions for Disputecase model.
 */
class DisputecaseController extends Controller
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
     * Lists all Disputecase models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new DisputecaseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionClosedcases()
    {    
        $searchModel = new DisputecaseSearch();
        $dataProvider = $searchModel->searchClosecases(Yii::$app->request->queryParams);

        return $this->render('closecases', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Disputecase model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Disputecase #".$id,
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
     * Creates a new Disputecase model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Disputecase(); 
        $person = new Rdperson2();
        $employment = new Rdemployment(); 
        $disputenote = new Disputenote();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new Disputecase",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                        'person' => $person,
                        'employment' => $employment,
                        'disputenote' => $disputenote,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post())) {
                $person->load($request->post());
                $employment->load($request->post());
                $disputenote->load($request->post());               

                if (($person->nid)==null) {
                    $model->employer_id = $model->employer_id;
                    $model->employee_id =1;
                    $model->save();

                }
                else{

                  $countPersons = Rdperson2::find()
                    ->where('nid=:u',['u'=>$person->nid])
                    ->count();
        
     
                    if( $countPersons == 0 ){
                        
                        if( $person->save()){
                        
                        $employment->person_id = $person->id;                
                        $employment->save();

                        $model->employer_id = $employment->employer_id;
                        $model->employee_id = $person->id;
                        $model->tradeUnion_id =1;
                        $model->save();

                        // $disputenote->case_id = $model->id;
                        // $disputenote->save();


                        }

                    }else{ 
                        
                    $personInfo = Rdperson2::find()
                    ->where('nid=:u',['u'=>$person->nid])
                    ->one();

                        $employment->person_id = $personInfo->id;
                        $employment->save();

                        $model->employer_id = $employment->employer_id;
                        $model->employee_id= $personInfo->id;
                        $model->tradeUnion_id =1;
                        $model->save();

                        // $disputenote->case_id = $model->id;
                        // $disputenote->save();
                            
                    } 


                     
                }                   
                    return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Create new Disputecase",
                    'content'=>'<span class="text-success">Create Disputecase success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ]; 


            }else{           
                return [
                    'title'=> "Create new Disputecase",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                        'person' => $person,
                        'employment' => $employment,
                        'disputenote' => $disputenote,
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
                $person->load($request->post());
                $employment->load($request->post());
                $disputenote->load($request->post());               

                if (($person->nid)==null) {
                    $model->employer_id = $model->employer_id;
                    $model->employee_id =1;
                    $model->save();

                }
                else{

                  $countPersons = Rdperson2::find()
                    ->where('nid=:u',['u'=>$person->nid])
                    ->count();
        
     
                    if( $countPersons == 0 ){
                        
                        if( $person->save()){
                        
                        $employment->person_id = $person->id;                
                        $employment->save();

                        $model->employer_id = $employment->employer_id;
                        $model->employee_id = $person->id;
                        $model->tradeUnion_id =1;
                        $model->save();

                        // $disputenote->case_id = $model->id;
                        // $disputenote->save();


                        }

                    }else{ 
                        
                    $personInfo = Rdperson2::find()
                    ->where('nid=:u',['u'=>$person->nid])
                    ->one();

                        $employment->person_id = $personInfo->id;
                        $employment->save();

                        $model->employer_id = $employment->employer_id;
                        $model->employee_id= $personInfo->id;
                        $model->tradeUnion_id =1;
                        $model->save();

                        // $disputenote->case_id = $model->id;
                        // $disputenote->save();
                            
                    } 


                     
                }

                   
                    return $this->redirect(['view', 'id' => $model->id]);    


            } else {
                return $this->render('create', [
                    'model' => $model,
                    'person' => $person,
                    'employment' => $employment,
                    'disputenote' => $disputenote,
                ]);
            }
        }
       
    }

    /**
     * Updates an existing Disputecase model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id); 
        $person = new Rdperson2();
        $employment = new Rdemployment(); 
        $disputenote = new Disputenote();     

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update Disputecase #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                        'person' => $person,
                        'employment' => $employment,
                        'disputenote' => $disputenote,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post())) {
                $person->load($request->post());
                $employment->load($request->post());
                $disputenote->load($request->post());               

                if (($person->nid)==null) {
                    $model->employer_id = $model->employer_id;
                    $model->employee_id =1;
                    $model->save();

                }
                else{

                  $countPersons = Rdperson2::find()
                    ->where('nid=:u',['u'=>$person->nid])
                    ->count();
        
     
                    if( $countPersons == 0 ){
                        
                        if( $person->save()){
                        
                        $employment->person_id = $person->id;                
                        $employment->save();

                        $model->employer_id = $employment->employer_id;
                        $model->employee_id = $person->id;
                        $model->tradeUnion_id =1;
                        $model->save();

                        // $disputenote->case_id = $model->id;
                        // $disputenote->save();


                        }

                    }else{ 
                        
                    $personInfo = Rdperson2::find()
                    ->where('nid=:u',['u'=>$person->nid])
                    ->one();

                        $employment->person_id = $personInfo->id;
                        $employment->save();

                        $model->employer_id = $employment->employer_id;
                        $model->employee_id= $personInfo->id;
                        $model->tradeUnion_id =1;
                        $model->save();

                        // $disputenote->case_id = $model->id;
                        // $disputenote->save();
                            
                    } 


                     
                }                   
                    return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Disputecase #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                        'person' => $person,
                        'employment' => $employment,
                        'disputenote' => $disputenote,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ]; 


            }


            else{
                 return [
                    'title'=> "Update Disputecase #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                        'person' => $person,
                        'employment' => $employment,
                        'disputenote' => $disputenote,
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
                $person->load($request->post());
                $employment->load($request->post());
                $disputenote->load($request->post());               

                if (($person->nid)==null) {
                    $model->employer_id = $model->employer_id;
                    $model->employee_id =1;
                    $model->save();

                }
                else{

                  $countPersons = Rdperson2::find()
                    ->where('nid=:u',['u'=>$person->nid])
                    ->count();
        
     
                    if( $countPersons == 0 ){
                        
                        if( $person->save()){
                        
                        $employment->person_id = $person->id;                
                        $employment->save();

                        $model->employer_id = $employment->employer_id;
                        $model->employee_id = $person->id;
                        $model->tradeUnion_id =1;
                        $model->save();

                        // $disputenote->case_id = $model->id;
                        // $disputenote->save();


                        }

                    }else{ 
                        
                    $personInfo = Rdperson2::find()
                    ->where('nid=:u',['u'=>$person->nid])
                    ->one();

                        $employment->person_id = $personInfo->id;
                        $employment->save();

                        $model->employer_id = $employment->employer_id;
                        $model->employee_id= $personInfo->id;
                        $model->tradeUnion_id =1;
                        $model->save();

                        // $disputenote->case_id = $model->id;
                        // $disputenote->save();
                            
                    } 


                     
                }

                   
                    return $this->redirect(['view', 'id' => $model->id]); 


            } else {
                return $this->render('update', [
                    'model' => $model,
                    'person' => $person,
                    'employment' => $employment,
                    'disputenote' => $disputenote,
                ]);
            }
        }
    }

    /**
     * Delete an existing Disputecase model.
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
     * Delete multiple existing Disputecase model.
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
     * Finds the Disputecase model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Disputecase the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Disputecase::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
