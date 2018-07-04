<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
            NavBar::begin([
                'brandLabel' => Yii::t('app', Yii::$app->name),
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-default navbar-fixed-top',
                ],
            ]);

            // everyone can see Home page
            //$menuItems[] = ['label' => Yii::t('app', 'Home'), 'url' => ['/']];
            $menuItems[] = ['label' => Yii::t('app', 'Frontend'), 'url' => ['../index']];

            // we do not need to display Article/index, About and Contact pages to editor+ roles
            // if (!Yii::$app->user->can('editor')) 
            // {
            //     $menuItems[] = [
            //         'label' => Yii::t('app', 'Labour supply'), 
            //         'url' => ['/supply/index'],
            //         'items' => [
            //             [
            //                 'label'=> Yii::t('app','Demographics'),
            //                 'url'=>['sociodemo-populationwithregions/index'],
            //             ],
            //             [
            //                 'label'=> Yii::t('app','Education'),
            //                 'url'=>['primary-numberofschools/index'],
            //             ],
            //             [
            //                 'label'=> Yii::t('app','Labour force'),
            //                 'url'=>['kilmlabourforceparticipationrate/index'],
            //             ],
            //         ],
            //     ];
            //     $menuItems[] = [
            //         'label' => Yii::t('app', 'Labour demand'), 
            //         'url' => ['/demand/index'],
            //         'items' => [
            //             [
            //                 'label'=> Yii::t('app','Employment'),
            //                 'url'=>['kilmemploymenttopopulationratio/index'],
            //             ],
            //             [
            //                 'label'=> Yii::t('app','Unemployment'),
            //                 'url'=>['kilmunemploymentrate/index'],
            //             ],
            //         ],
            //     ];
            //     $menuItems[] = ['label' => Yii::t('app', 'About'), 'url' => ['/about']];
            //     $menuItems[] = ['label' => Yii::t('app', 'Contact'), 'url' => ['/contact']];
            // }

            // display Article admin page to editor+ roles
            // if (Yii::$app->user->can('editor'))
            // {
            //     $menuItems[] = ['label' => Yii::t('app', 'Articles'), 'url' => ['/article/admin']];
            // }            
            
            // display Signup and Login pages to guests of the site
            if (Yii::$app->user->isGuest) 
            {
                $menuItems[] = ['label' => Yii::t('app', 'Signup'), 'url' => ['/signup']];
                $menuItems[] = ['label' => Yii::t('app', 'Sign in'), 'url' => ['/login']];
            }
            // display Logout to all logged in users
            else 
            {
                $menuItems[] = [
                    'label' => Yii::t('app', 'Logout'). ' (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
           
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>