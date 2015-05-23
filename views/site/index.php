<?php
/* @var $this yii\web\View */
$this->title = 'KESCo Work Management System';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">
            Works Monitoring and Material Monitoring</p>

        <p><a class="btn btn-lg btn-success" href="http://www.kesco.com">Get started with It</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Work Proposed</h2>

                <section>
                    <ul>
                        <li><a href="#">Highlighted Proposed Work</a>
                        <li><a href="#">Highlighted Proposed Work</a>
                        <li><a href="#">Highlighted Proposed Work</a>
                    </ul>
                </section>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Work Progress</h2>

                <section>
                    <ul>
                        <li><a href="#">Highlighted Work in Progress</a>
                        <li><a href="#">Highlighted Work in Progress</a>
                        <li><a href="#">Highlighted Work in Progress</a>
                    </ul>
                </section>
                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Material Requirement</h2>
                <?= \app\modules\work\Utility::createPiechart() ?>
                <section>
                    <ul>
                        <li><a href="#">Highlighted Material Requirement for Works</a>
                        <li><a href="#">Highlighted Material Requirement for Works</a>
                        <li><a href="#">Highlighted Material Requirement for Works</a>
                    </ul>
                </section>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
