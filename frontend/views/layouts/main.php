<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src='https://cdn.bootcss.com/echarts/3.7.0/echarts.simple.js'></script>
    <script src="/js/echarts-wordcloud.min.js"></script>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>

    <div class="wrap">
        <header>
            <?php
            NavBar::begin([
                'brandLabel' => 'Huro\'s Blog',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'nav nav-pills custom-nav nav-justified',
                ],
            ]);
            $menuItems = [];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => '注册', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => '登陆', 'url' => ['/site/login']];
            } else {
                $menuItems[] = '<li>'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        '退出 (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>';
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right '],
                'items' => $menuItems,
            ]);
            NavBar::end();
            ?>
            <div class="jumbotron intro-header">
                <h1>Huro's blog</h1>
                <h2>To Be A Lean Developer!</h2>
            </div>
        </header>
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>

    <!-- <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer> -->

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>