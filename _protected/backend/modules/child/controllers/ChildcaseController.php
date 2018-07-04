<?php

namespace backend\modules\child\controllers;

use Yii;
use backend\modules\child\models\Childcase;
use backend\modules\child\models\ChildcaseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use backend\modules\child\models\Child;
use backend\modules\child\models\Childemployment;
use backend\modules\child\models\Childfound;

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
 * ChildcaseController implements the CRUD actions for Childcase model.
 */
class ChildcaseController extends Controller
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
     * Lists all Childcase models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new ChildcaseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Childcase model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Childcase #".$id,
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
     * Creates a new Childcase model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Childcase(); 
        $child = new Child(); 
        $employment = new Childemployment();
        $childfound = new Childfound();

        $establishment = new Rdemployer2 ();
        $address = new Rdemployeraddress();
        $person  = new Rdperson2();
        $representative = new Rdemployerrepresentative();
        $employeenumbers = new Rdemployernumberofemployee();
        $employerstatus = new Rdemployerstatus(); 
        $modelsecononicsector = [new Rdemployerecosector]; 

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new Childcase",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
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
            }else if($model->load($request->post())) {
                $child->load($request->post()) ; 
                $childfound->load($request->post()) ;
                $employment->load($request->post()) ; 

                $establishment->load($request->post()) ;
                $person->load($request->post()) ;
                $address->load($request->post()) ; 
                $employeenumbers->load($request->post()) ;
                $employerstatus->load($request->post()) ; 



                $countChildren = Child::find()
                ->where('childLastName=:u',['u'=>$child->childLastName])
                ->andWhere('childFirstName=:t',['t'=>$child->childFirstName])
                ->count();         
     
                    if( $countChildren == 0 ){
                        
                        if($child->save() ){
                                        
                        $childfound->child_id = $child->id;
                        $childfound->save();

                        $employment->child_id = $child->id;
                        $employment->save();


                        $model->childEmployment_id = $employment->id;
                        $model->save();

                        }

                    }else{     

                    $childInfo = Child::find()
                    ->where('childLastName=:u',['u'=>$child->childLastName])
                    ->andWhere('childFirstName=:t',['t'=>$child->childFirstName])
                    ->one(); 

                        $childfound->child_id = $childInfo->id;
                        $childfound->save();

                        $employment->child_id = $childInfo->id;
                        $employment->save();


                        $model->childEmployment_id = $employment->id;
                        $model->save();
                            
                    } 
                    return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Create new Childcase",
                    'content'=>'<span class="text-success">Create Childcase success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         


            }else{           
                return [
                    'title'=> "Create new Childcase",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
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
            if($model->load($request->post())) {
                $child->load($request->post()) ; 
                $childfound->load($request->post()) ;
                $employment->load($request->post()) ;


                $establishment->load($request->post()) ;
                $person->load($request->post()) ;
                $address->load($request->post()) ; 
                $employeenumbers->load($request->post()) ;
                $employerstatus->load($request->post()) ; 

                // var_dump($establishment);die(); 
                if (($person->nid)==null) {

                $countChildren = Child::find()
                ->where('childLastName=:u',['u'=>$child->childLastName])
                ->andWhere('childFirstName=:t',['t'=>$child->childFirstName])
                ->count();         
     
                    if( $countChildren == 0 ){
                        
                        if($child->save() ){
                                        
                        $childfound->child_id = $child->id;
                        $childfound->save();

                        $employment->child_id = $child->id;
                        $employment->save();


                        $model->childEmployment_id = $employment->id;
                        $model->save();

                        }

                    }else{     

                    $childInfo = Child::find()
                    ->where('childLastName=:u',['u'=>$child->childLastName])
                    ->andWhere('childFirstName=:t',['t'=>$child->childFirstName])
                    ->one(); 

                        $childfound->child_id = $childInfo->id;
                        $childfound->save();

                        $employment->child_id = $childInfo->id;
                        $employment->save();


                        $model->childEmployment_id = $employment->id;
                        $model->save();
                            
                    } 

                }else{


                    //Insert Establishment data


                    $countPersons = Rdperson2::find()
                    ->where('nid=:u',['u'=>$person->nid])
                    ->count();
        
     
                    if( $countPersons == 0 ){
                        
                        if( $person->save() ){
                                        
                            $establishment->save();

                            $representative->person_id = $person->id;
                            $representative->employer_id = $establishment->id;
                            $representative->save();

                            $address->employer_id = $establishment->id;
                            $address->save();

                            $employeenumbers->employer_id = $establishment->id;
                            $employeenumbers->save();

                            $employerstatus->employer_id = $establishment->id;
                            $employerstatus->save();


                        }

                    }else{ 
                        
                    $personInfo = Rdperson2::find()
                    ->where('nid=:u',['u'=>$person->nid])
                    ->one();

                        $establishment->save();

                        $representative->person_id = $personInfo->id;
                        $representative->employer_id = $establishment->id;
                        $representative->save();


                        $address->employer_id = $establishment->id;
                        $address->save();

                        $employeenumbers->employer_id = $establishment->id;
                        $employeenumbers->save();

                        $employerstatus->employer_id = $establishment->id;
                        $employerstatus->save();
                            
                    }



            $modelseconomicsector = Model::createMultiple(Rdemployerecosector::classname());
            Model::loadMultiple($modelseconomicsector, Yii::$app->request->post());

            // validate all models
            $valid = $establishment->validate();
            $valid = Model::validateMultiple($modelseconomicsector) && $valid;
            
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $establishment->save(false)) {
                        foreach ($modelseconomicsector as $modeleconomicsector) 
                        {
                            $modeleconomicsector->employer_id = $establishment->id;
                            if (! ($flag = $modeleconomicsector->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                         return $this->redirect(['view', 'id' => $model->id]); 
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
            }
                    //End Insert Establishment data

                    
            } else {
                return $this->render('create', [
                    'model' => $model,
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
     * Updates an existing Childcase model.
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
        $employment = new Childemployment();
        $childfound = new Childfound();

        $establishment = new Rdemployer2 ();
        $address = new Rdemployeraddress();
        $person  = new Rdperson2();
        $representative = new Rdemployerrepresentative();
        $employeenumbers = new Rdemployernumberofemployee();
        $employerstatus = new Rdemployerstatus(); 
        $modelsecononicsector = [new Rdemployerecosector];       

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update Childcase #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
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
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Childcase #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
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
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update Childcase #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
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
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
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
     * Delete an existing Childcase model.
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
     * Delete multiple existing Childcase model.
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
     * Finds the Childcase model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Childcase the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Childcase::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
