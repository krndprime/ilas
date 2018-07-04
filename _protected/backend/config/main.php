<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
       'child' => [
            'class' => 'backend\modules\child\Settings',
        ],
        'osh' => [
            'class' => 'backend\modules\osh\Settings',
        ],
        'labourdispute' => [
            'class' => 'backend\modules\labourdispute\Settings',
        ],
        'socialdialogue' => [
            'class' => 'backend\modules\socialdialogue\Settings',
        ],
       'registrationderegistration' => [
            'class' => 'backend\modules\registrationderegistration\Settings',
        ],
        'inspection' => [
            'class' => 'backend\modules\inspection\Inspection',
        ],
        'audit' => [
            'class' => 'backend\modules\audit\Audit',
        ],
        'bi' => [
            'class' => 'backend\modules\bi\Bi',
        ],
        'gridview' => [
                'class' => 'kartik\grid\Module',
            ],
        'admin' => [
            'class' => 'mdm\admin\Module',
            //'layout' => 'left-menu',
            'mainLayout' => '@app/views/layouts/main.php',
        ],
    ],
    'components' => [
        // here you can set theme used for your backend application 
        // - template comes with: 'default', 'slate', 'spacelab' and 'cerulean'
        'RwandaMap' => [
            'class' => 'backend\components\RwandaMap',
        ],
        'view' => [
            'theme' => [
                'pathMap' => ['@app/views' => '@webroot/themes/default/views'],
                'baseUrl' => '@web/themes/default',
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
            'defaultRoles' => ['guest'],
        ],
        'i18n' => [
        'translations' => [
            '*' => [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@app/messages', // if advanced application, set @frontend/messages
                'sourceLanguage' => 'en',
                'fileMap' => [
                    //'main' => 'main.php',
                 ],
                ],
            ],
        ],
        'user' => [

        ////////////////////////////original codes///////////////

            // 'identityClass' => 'common\models\UserIdentity',
            // 'enableAutoLogin' => true,

        ////////////////////////////Newly added codes///////////////////

            'identityClass' => 'common\models\UserIdentity',
            'enableAutoLogin' => false,
            'enableSession' => true,
            'authTimeout' =>1800,
            'loginUrl' => ['site/login'],
        ],

        ////////////////////////////Newly added codes///////////////////
         //'session' => [
                    //'timeout' => 300,
           // ],

        ////////////////////////////End Newly added codes///////////////////

        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
            'admin/*',
            // The actions listed here will be allowed to everyone including guests.
            // So, 'admin/*' should not appear here in the production, of course.
            // But in the earlier stages of your development, you may probably want to
            // add a lot of actions here until you finally completed setting up rbac,
            // otherwise you may not even take a first step.
        ]

    ],
    'errorHandler' => [
            'errorAction' => 'site/error',
    ],
    ],//iyi akorade????
    
    ////////////////////////////Newly added codes///////////////////

    'as beforeRequest'=>[
    'class'=>'backend\components\CheckIfLoggedIn',
    'class' => 'yii\filters\AccessControl',
        'rules' => [
        [
        'actions' => ['login', 'error'],
        'allow' => true,
        ],
        [

        'allow' => true,
        'roles' => ['@'],
        ],
        ],
    ],

    ////////////////////////////End Newly added codes///////////////////
    'params' => $params,
];
