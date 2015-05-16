<?php $this->beginBody() ?>
    <div class="wrap">
<!--
      <?php
            NavBar::begin([
                'brandLabel' => 'KESCO',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
    'items' => [
       ['label' => 'Android APK', 'url' => Yii::getAlias('@web').'/android/latest/GPSPhotoUploader.apk'],
        ['label' => 'Master Data', 'url' => ['/site/index'],'linkOptions'=>[],'options'=>['class'=>'dropdown']
            ,'items'=>[
             ['label' => 'Designation', 'url' => ['/users/designation/create'],'options'=>['class'=>'dropdown']],
             ['label' => 'DesignationType', 'url' => ['/users/designationtype/create'],'options'=>['class'=>'dropdown']],
              ['label' => 'Division', 'url' => ['/work/division/create'],'options'=>['class'=>'dropdown']],
             ['label' => 'Substation', 'url' => ['/work/substation/create'],'options'=>['class'=>'dropdown']],
             ['label' => 'Circle', 'url' => ['/work/circle/create'],'options'=>['class'=>'dropdown']],
             ['label' => 'Scheme', 'url' => ['/work/scheme/create'],'options'=>['class'=>'dropdown']],
            ['label' => 'MaterialType', 'url' => ['/work/materialtype/create'],'options'=>['class'=>'dropdown']],
            
            
                
            ]],
        ['label' => 'Data Entry', 'url' => ['#'],'options'=>['class'=>'dropdown']
            ,'items'=>[ 
                ['label' => 'Work', 'url' => ['/work/work/create'],'options'=>['class'=>'dropdown']],
                ['label' => 'Work Progress', 'url' => ['/work/work/addwp'],'options'=>['class'=>'dropdown']],
                ['label' => 'Add Material Requirement', 'url' => ['/work/work/addmq'],'options'=>['class'=>'dropdown']]
            ],
    ],
                ['label' => 'Reports', 'url' => ['#'],'options'=>['class'=>'dropdown']
            ,'items'=>[ 
                ['label' => 'List of Works Scheme wise', 'url' => ['/work/report?rt=r2'],'options'=>['class'=>'dropdown']],
                ['label' => 'List of Schemes', 'url' => ['/work/report?rt=r1'],'options'=>['class'=>'dropdown']],
                ['label' => 'Divisions', 'url' => ['/work/division/index'],'options'=>['class'=>'dropdown']],
                ['label' => 'Material Requirements Scheme Wise', 'url' => ['/work/report?rt=r3'],'options'=>['class'=>'dropdown']],
                ['label' => 'Material Requirements Work Wise', 'url' => ['/work/report?rt=r4'],'options'=>['class'=>'dropdown']],        
                 ['label' => 'Latest Photos of Breakdown', 'url' => ['/gpsphoto/photo/latest?cat=br&title=Breakdown'],'options'=>['class'=>'dropdown']],        
                ['label' => 'Latest Photos of Theft', 'url' => ['/gpsphoto/photo/latest?cat=t&title=Theft'],'options'=>['class'=>'dropdown']],        
                ['label' => 'Latest Photos of Work', 'url' => ['/gpsphoto/photo/latest?cat=w&title=Work'],'options'=>['class'=>'dropdown']],        
               
                ['label' => 'Exception Reports', 'url' => ['/work/index'],'options'=>['class'=>'dropdown']],

            ],
    ],
        
        Yii::$app->user->isGuest ?
        ['label' => 'Login', 'url' => ['/user/login']] :
        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            'url' => ['/user/logout'],
            'linkOptions' => ['data-method' => 'post']],],'options'=>['class'=>'navbar-nav']
]);

            NavBar::end();
        ?>
-->
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
