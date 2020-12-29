<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use common\models\Comment;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.2/css/swiper.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.2/css/swiper.min.css">
    <script src='https://cdn.bootcss.com/echarts/3.7.0/echarts.simple.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.2/js/swiper.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.2/js/swiper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.2/js/swiper.esm.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.2/js/swiper.esm.bundle.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style>
        .wrapper {
            display: grid;
            margin: 100px 20px auto;
            grid-gap: 20px;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        }

        @media (max-width: 700px) {
            .wrapper {
                margin: 100px auto;
            }
        }

        .wrapper .box {
            width: 350px;
            margin: 0 auto;
            position: relative;
            perspective: 1000px;
        }

        .wrapper .box .front-face {
            background: #fff;
            height: 220px;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            box-shadow: 0px 5px 20px 0px rgba(0, 81, 250, 0.1);
            transition: all 0.5s ease;
        }

        .box .front-face .icon {
            height: 80px;
        }

        .box .front-face .icon i {
            font-size: 65px;
        }
        .box .front-face {
            text-align: center;
        }

        .box .front-face span,
        .box .back-face span {
            font-size: 22px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .box .back-face span {
            font-size: 50px;
        }

        .box .front-face .icon i,
        .box .front-face span {
            background: linear-gradient(-135deg, #c850c0, #4158d0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .box .back-face {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
            height: 220px;
            width: 100%;
            padding: 30px;
            color: #fff;
            opacity: 0;
            transform-style: preserve-3d;
            backface-visibility: hidden;
            background: linear-gradient(-135deg, #c850c0, #4158d0);
            transform: translateY(110px) rotateX(-90deg);
            box-shadow: 0px 5px 20px 0px rgba(0, 81, 250, 0.1);
            transition: all 0.5s ease;
        }

        .box .back-face p {
            margin-top: 10px;
            text-align: justify;
        }

        .box:hover .back-face {
            opacity: 1;
            transform: rotateX(0deg);
        }

        .box:hover .front-face {
            opacity: 0;
            transform: translateY(-110px) rotateX(90deg);
        }

        .animate {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #000;
        }

        .animate h2 {
            font-size: 6em;
            font-weight: 500;
            color: #222;
            letter-spacing: 5px;
            cursor: pointer;
        }

        .animate h2 span {
            transition: 0.5s;
        }

        .animate h2:hover span:nth-child(1) {
            margin-right: 10px;
        }

        .animate h2:hover span:nth-child(1)::after {
            content: "'";
        }

        .animate h2:hover span:nth-child(2) {
            margin-left: 40px;
        }

        .animate h2:hover span {
            color: #fff;
            text-shadow: 0 0 10px #fff,
                0 0 20px #fff,
                0 0 40px #fff,
                0 0 80px #fff,
                0 0 120px #fff,
                0 0 160px #fff;
        }
    </style>
</head>

<body>
    <?php $this->beginBody() ?>

    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => '博客后台管理系统',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        $menuItems = [
            ['label' => '文章管理', 'url' => ['/post/index']],
            ['label' => '评论管理', 'url' => ['/comment/index']],
            '<li><span class="badge">' . Comment::getPendingCommentCount() . '</span></li>',
            ['label' => '用户管理', 'url' => ['/user/index']],
            ['label' => '管理员', 'url' => ['/adminuser/index']],
            ['label' => '数据分析', 'url' => ['/site/analyze']]
        ];
        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => '登陆', 'url' => ['/site/login']];
        } else {
            $menuItems[] = '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    '注销 (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>';
        }
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menuItems,
        ]);
        NavBar::end();
        ?>
        <?php
        if ($this->title == "博客管理后台") {
        ?>
            <div class="animate">
                <h2><span>I</span>M<span>POSSIBLE</span></h2>
            </div>
        <?php } else { ?>
            <div class="container">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
    </div>
<?php } ?>

<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>