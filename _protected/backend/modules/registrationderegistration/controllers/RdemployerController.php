<?php

namespace backend\modules\registrationderegistration\controllers;

use Yii;
use backend\modules\registrationderegistration\models\Rdemployer;
use backend\modules\registrationderegistration\models\RdemployerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use backend\modules\registrationderegistration\models\Rdemployeraddress;
use backend\modules\registrationderegistration\models\Rdperson;
use backend\modules\registrationderegistration\models\Rdemployerrepresentative;
use backend\modules\registrationderegistration\models\Rdemployernumberofemployee;
use backend\modules\registrationderegistration\models\Rdemployerstatus;
use backend\modules\registrationderegistration\models\Rdemployment;
use backend\modules\registrationderegistration\models\Rdemployerecosector;
use backend\models\Model;




/**
 * RdemployerController implements the CRUD actions for Rdemployer model.
 */
class RdemployerController extends Controller
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
     * Lists all Rdemployer models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new RdemployerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Rdemployer models.
     * @return mixed
     */
    public function actionBranchesindex()
    {    
        $searchModel = new RdemployerSearch();
        $dataProvider = $searchModel->searchBranches(Yii::$app->request->queryParams);

        return $this->render('branches', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Rdemployer model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        $modeladdress = new Rdemployeraddress();
        $ecosector = new Rdemployerecosector();
        $numberofemployees = new Rdemployernumberofemployee();
        $representatives = new Rdemployerrepresentative();
        $status = new Rdemployerstatus();




        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Rdemployer #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                        'modeladdress' => $modeladdress->addresses($id),
                        'ecosector' => $ecosector->ecosectors($id),
                        'numberofemployees' => $numberofemployees->numberofemployees($id),
                        'representatives' => $representatives->representatives($id),
                        'status' => $status->status($id),

                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
                'modeladdress' => $modeladdress->addresses($id),
                'ecosector' => $ecosector->ecosectors($id),
                'numberofemployees' => $numberofemployees->numberofemployees($id),
                'representatives' => $representatives->representatives($id),
                'status' => $status->status($id),
            ]);
        }
    }

    /**
     * Creates a new Rdemployer model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Rdemployer();
        $address = new Rdemployeraddress();
        $person  = new Rdperson();
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
                    'title'=> "Create new Rdemployer",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
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

                $person->load($request->post()) ;
                $address->load($request->post()) ; 
                $employeenumbers->load($request->post()) ;
                $employerstatus->load($request->post()) ;  

                  $countPersons = Rdperson::find()
                    ->where('nid=:u',['u'=>$person->nid])
                    ->count();
        
     
                    if( $countPersons == 0 ){
                        
                        if( $person->save() ){
                                        
                            $model->save();

                            $representative->person_id = $person->id;
                            $representative->employer_id = $model->id;
                            $representative->save();

                            $address->employer_id = $model->id;
                            $address->save();

                            $employeenumbers->employer_id = $model->id;
                            $employeenumbers->save();

                            $employerstatus->employer_id = $model->id;
                            $employerstatus->save();


                        }

                    }else{ 
                        
                    $personInfo = Rdperson::find()
                    ->where('nid=:u',['u'=>$person->nid])
                    ->one();

                        $model->save();

                        $representative->person_id = $personInfo->id;
                        $representative->employer_id = $model->id;
                        $representative->save();


                        $address->employer_id = $model->id;
                        $address->save();

                        $employeenumbers->employer_id = $model->id;
                        $employeenumbers->save();

                        $employerstatus->employer_id = $model->id;
                        $employerstatus->save();
                            
                    }



            $modelseconomicsector = Model::createMultiple(Rdemployerecosector::classname());
            Model::loadMultiple($modelseconomicsector, Yii::$app->request->post());

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelseconomicsector) && $valid;
            
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelseconomicsector as $modeleconomicsector) 
                        {
                            $modeleconomicsector->employer_id = $model->id;
                            if (! ($flag = $modeleconomicsector->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return [
                        'forceReload'=>'#crud-datatable-pjax',
                        'title'=> "Create new Rdemployer",
                        'content'=>'<span class="text-success">Create Rdemployer success</span>',
                        'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                        Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])

                        ]; 
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        
            }else{           
                return [
                    'title'=> "Create new Rdemployer",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
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


                $person->load($request->post()) ;
                $address->load($request->post()) ; 
                $employeenumbers->load($request->post()) ;
                $employerstatus->load($request->post()) ;  

                  $countPersons = Rdperson::find()
                    ->where('nid=:u',['u'=>$person->nid])
                    ->count();
        
     
                    if( $countPersons == 0 ){
                        
                        if( $person->save() ){
                                        
                            $model->save();

                            $representative->person_id = $person->id;
                            $representative->employer_id = $model->id;
                            $representative->save();

                            $address->employer_id = $model->id;
                            $address->save();

                            $employeenumbers->employer_id = $model->id;
                            $employeenumbers->save();

                            $employerstatus->employer_id = $model->id;
                            $employerstatus->save();


                        }

                    }else{ 
                        
                    $personInfo = Rdperson::find()
                    ->where('nid=:u',['u'=>$person->nid])
                    ->one();

                        $model->save();

                        $representative->person_id = $personInfo->id;
                        $representative->employer_id = $model->id;
                        $representative->save();


                        $address->employer_id = $model->id;
                        $address->save();

                        $employeenumbers->employer_id = $model->id;
                        $employeenumbers->save();

                        $employerstatus->employer_id = $model->id;
                        $employerstatus->save();
                            
                    }

            $modelseconomicsector = Model::createMultiple(Rdemployerecosector::classname());
            Model::loadMultiple($modelseconomicsector, Yii::$app->request->post());

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelseconomicsector) && $valid;
            
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelseconomicsector as $modeleconomicsector) 
                        {
                            $modeleconomicsector->employer_id = $model->id;
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
        
            } else {
                return $this->render('create', [
                    'model' => $model,
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
     * Creates a new Rdemployer model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionBranch()
    {
        $request = Yii::$app->request;
        $model = new Rdemployer();
        $address = new Rdemployeraddress();
        $person  = new Rdperson();
        $representative = new Rdemployerrepresentative();
        $employeenumbers = new Rdemployernumberofemployee();
        $employerstatus = new Rdemployerstatus(); 
        // $modelsecononicsector = [new Rdemployerecosector]; 



        //create object to get data from employers table

        $dataEstablishment = new Rdemployer;
        $dataFromEmployer = $dataEstablishment->find()->where('id=:id',['id'=>$_GET['id']])->one(); 

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new Rdemployer",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                        'address' => $address,
                        'person' => $person,
                        'representative'=>$representative,
                        'employeenumbers'=>$employeenumbers,
                        'employerstatus'=>$employerstatus,
                        // 'modelseconomicsector'=>(empty($modelseconomicsector)) ? [new Rdemployerecosector ]: $modelseconomicsector,
                        'dataFromEmployer'=>$dataFromEmployer
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post())){

                $person->load($request->post()) ;
                $address->load($request->post()) ; 
                $employeenumbers->load($request->post()) ;
                $employerstatus->load($request->post()) ;  

                  $countPersons = Rdperson::find()
                    ->where('nid=:u',['u'=>$person->nid])
                    ->count();
        
     
                    if( $countPersons == 0 ){
                        
                        if( $person->save() ){
                            
                            $model->parent=1;
                            $model->child=$dataFromEmployer->id;            
                            $model->save();

                            $representative->person_id = $person->id;
                            $representative->employer_id = $model->id;
                            $representative->save();

                            $address->employer_id = $model->id;
                            $address->save();

                            $employeenumbers->employer_id = $model->id;
                            $employeenumbers->save();

                            $employerstatus->employer_id = $model->id;
                            $employerstatus->save();


                        }

                    }else{ 
                        
                    $personInfo = Rdperson::find()
                    ->where('nid=:u',['u'=>$person->nid])
                    ->one();

                        $model->parent=1;
                        $model->child=$dataFromEmployer->id;
                        $model->save();

                        $representative->person_id = $personInfo->id;
                        $representative->employer_id = $model->id;
                        $representative->save();


                        $address->employer_id = $model->id;
                        $address->save();

                        $employeenumbers->employer_id = $model->id;
                        $employeenumbers->save();

                        $employerstatus->employer_id = $model->id;
                        $employerstatus->save();
                            
                    }



            // $modelseconomicsector = Model::createMultiple(Rdemployerecosector::classname());
            // Model::loadMultiple($modelseconomicsector, Yii::$app->request->post());

            // // validate all models
            // $valid = $model->validate();
            // $valid = Model::validateMultiple($modelseconomicsector) && $valid;
            
            // if ($valid) {
            //     $transaction = \Yii::$app->db->beginTransaction();
            //     try {
            //         if ($flag = $model->save(false)) {
            //             foreach ($modelseconomicsector as $modeleconomicsector) 
            //             {
            //                 $modeleconomicsector->employer_id = $model->id;
            //                 if (! ($flag = $modeleconomicsector->save(false))) {
            //                     $transaction->rollBack();
            //                     break;
            //                 }
            //             }
            //         }
            //         if ($flag) {
            //             $transaction->commit();
            //             return [
            //             'forceReload'=>'#crud-datatable-pjax',
            //             'title'=> "Create new Rdemployer",
            //             'content'=>'<span class="text-success">Create Rdemployer success</span>',
            //             'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
            //             Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])

            //             ]; 
            //         }
            //     } catch (Exception $e) {
            //         $transaction->rollBack();
            //     }
            // }
        
            }else{           
                return [
                    'title'=> "Create new Rdemployer",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                        'address' => $address,
                        'person' => $person,
                        'representative'=>$representative,
                        'employeenumbers'=>$employeenumbers,
                        'employerstatus'=>$employerstatus,
                        // 'modelseconomicsector'=>(empty($modelseconomicsector)) ? [new Rdemployerecosector ]: $modelseconomicsector,
                        'dataFromEmployer'=>$dataFromEmployer
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


                $person->load($request->post()) ;
                $address->load($request->post()) ; 
                $employeenumbers->load($request->post()) ;
                $employerstatus->load($request->post()) ;  

                  $countPersons = Rdperson::find()
                    ->where('nid=:u',['u'=>$person->nid])
                    ->count();
        
     
                    if( $countPersons == 0 ){
                        
                        if( $person->save() ){
                             
                            $model->parent=1;
                            $model->child=$dataFromEmployer->id;
                            $model->save();

                            $representative->person_id = $person->id;
                            $representative->employer_id = $model->id;
                            $representative->save();

                            $address->employer_id = $model->id;
                            $address->save();

                            $employeenumbers->employer_id = $model->id;
                            $employeenumbers->save();

                            $employerstatus->employer_id = $model->id;
                            $employerstatus->save();


                        }

                    }else{ 
                        
                    $personInfo = Rdperson::find()
                    ->where('nid=:u',['u'=>$person->nid])
                    ->one();

                        $model->parent=1;
                        $model->child=$dataFromEmployer->id;
                        $model->save();

                        $representative->person_id = $personInfo->id;
                        $representative->employer_id = $model->id;
                        $representative->save();


                        $address->employer_id = $model->id;
                        $address->save();

                        $employeenumbers->employer_id = $model->id;
                        $employeenumbers->save();

                        $employerstatus->employer_id = $model->id;
                        $employerstatus->save();
                            
                    }

            // $modelseconomicsector = Model::createMultiple(Rdemployerecosector::classname());
            // Model::loadMultiple($modelseconomicsector, Yii::$app->request->post());

            // // validate all models
            // $valid = $model->validate();
            // $valid = Model::validateMultiple($modelseconomicsector) && $valid;
            
            // if ($valid) {
            //     $transaction = \Yii::$app->db->beginTransaction();
            //     try {
            //         if ($flag = $model->save(false)) {
            //             foreach ($modelseconomicsector as $modeleconomicsector) 
            //             {
            //                 $modeleconomicsector->employer_id = $model->id;
            //                 if (! ($flag = $modeleconomicsector->save(false))) {
            //                     $transaction->rollBack();
            //                     break;
            //                 }
            //             }
            //         }
            //         if ($flag) {
            //             $transaction->commit();
            //             return $this->redirect(['view', 'id' => $model->id]); 
            //         }
            //     } catch (Exception $e) {
            //         $transaction->rollBack();
            //     }
            // }
        
            } else {
                return $this->render('branch', [
                    'model' => $model,
                    'address' => $address,
                    'person' => $person,
                    'representative'=>$representative,
                    'employeenumbers'=>$employeenumbers,
                    'employerstatus'=>$employerstatus,
                    'modelseconomicsector'=>(empty($modelseconomicsector)) ? [new Rdemployerecosector ]: $modelseconomicsector,
                    'dataFromEmployer'=>$dataFromEmployer

                ]);
            }
        }
       
    }

    /**
     * Updates an existing Rdemployer model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);
        $address = new Rdemployeraddress();
        $person  = new Rdperson();
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
                    'title'=> "Update Rdemployer #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
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

                $person->load($request->post()) ;
                $address->load($request->post()) ; 
                $employeenumbers->load($request->post()) ;
                $employerstatus->load($request->post()) ;  

                  $countPersons = Rdperson::find()
                    ->where('nid=:u',['u'=>$person->nid])
                    ->count();
        
     
                    if( $countPersons == 0 ){
                        
                        if( $person->save() ){
                                        
                            $model->save();

                            $representative->person_id = $person->id;
                            $representative->employer_id = $model->id;
                            $representative->save();

                            $address->employer_id = $model->id;
                            $address->save();

                            $employeenumbers->employer_id = $model->id;
                            $employeenumbers->save();

                            $employerstatus->employer_id = $model->id;
                            $employerstatus->save();


                        }

                    }else{ 
                        
                    $personInfo = Rdperson::find()
                    ->where('nid=:u',['u'=>$person->nid])
                    ->one();

                        $model->save();

                        $representative->person_id = $personInfo->id;
                        $representative->employer_id = $model->id;
                        $representative->save();


                        $address->employer_id = $model->id;
                        $address->save();

                        $employeenumbers->employer_id = $model->id;
                        $employeenumbers->save();

                        $employerstatus->employer_id = $model->id;
                        $employerstatus->save();
                            
                    }


            $modelseconomicsector = Model::createMultiple(Rdemployerecosector::classname());
            Model::loadMultiple($modelseconomicsector, Yii::$app->request->post());

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelseconomicsector) && $valid;
            
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelseconomicsector as $modeleconomicsector) 
                        {
                            $modeleconomicsector->employer_id = $model->id;
                            if (! ($flag = $modeleconomicsector->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return [
                        'forceReload'=>'#crud-datatable-pjax',
                        'title'=> "Rdemployer #".$id,
                        'content'=>$this->renderAjax('view', [
                            'model' => $model,
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
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        
            }else{
                 return [
                    'title'=> "Update Rdemployer #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
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

                $person->load($request->post()) ;
                $address->load($request->post()) ; 
                $employeenumbers->load($request->post()) ;
                $employerstatus->load($request->post()) ;  

                  $countPersons = Rdperson::find()
                    ->where('nid=:u',['u'=>$person->nid])
                    ->count();
        
     
                    if( $countPersons == 0 ){
                        
                        if( $person->save() ){
                                        
                            $model->save();

                            $representative->person_id = $person->id;
                            $representative->employer_id = $model->id;
                            $representative->save();

                            $address->employer_id = $model->id;
                            $address->save();

                            $employeenumbers->employer_id = $model->id;
                            $employeenumbers->save();

                            $employerstatus->employer_id = $model->id;
                            $employerstatus->save();


                        }

                    }else{ 
                        
                    $personInfo = Rdperson::find()
                    ->where('nid=:u',['u'=>$person->nid])
                    ->one();

                        $model->save();

                        $representative->person_id = $personInfo->id;
                        $representative->employer_id = $model->id;
                        $representative->save();


                        $address->employer_id = $model->id;
                        $address->save();

                        $employeenumbers->employer_id = $model->id;
                        $employeenumbers->save();

                        $employerstatus->employer_id = $model->id;
                        $employerstatus->save();
                            
                    }






            $modelseconomicsector = Model::createMultiple(Rdemployerecosector::classname());
            Model::loadMultiple($modelseconomicsector, Yii::$app->request->post());

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelseconomicsector) && $valid;
            
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelseconomicsector as $modeleconomicsector) 
                        {
                            $modeleconomicsector->employer_id = $model->id;
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
        
            } else {
                return $this->render('update', [
                    'model' => $model,
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
     * Delete an existing Rdemployer model.
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
     * Delete multiple existing Rdemployer model.
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
     * Finds the Rdemployer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rdemployer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Rdemployer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionLists($id){        
          
        $countPersons = Rdemployment::find()->distinct()
                    ->where('person_id=:u',['u'=>$id])
                    ->count();

        $employers = Rdemployer::find()->where(['IN','id',Rdemployment::find()->select('employer_id')->distinct()->where('person_id=:u',['u'=>$id])])->all();

            if($countPersons > 0)
        {
            
            foreach($employers as $employer){

                echo "<option></option><option value='".$employer->id."'>".$employer->companyName."</option>";     
             }
        }
        else{
            echo "<option></option>";
        }

        
    }
    static public function employers()
    {

        return Rdemployer::find()->where(['IN','id',Rdemployment::find()->select('employer_id')->distinct()->where('person_id=:u',['u'=>1])])->all(); 
    }
}
