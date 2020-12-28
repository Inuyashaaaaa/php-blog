<?php

use yii\helpers\Html;
use frontend\components\TagsCloudWidget;
use frontend\components\RctReplyWidget;
use common\models\Comment;
use common\models\Post;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

Yii::$app->params['intro'] = $model->title
?>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="post">
                <div class="content">
                    <?php
                    $Parsedown = new Parsedown();
                    echo $Parsedown->text($model->content);
                    ?>
                </div>
                <br>
                <div class="nav">
                    <?= Html::a("评论({$model->commentCount})", $model->url . '#comments'); ?>
                    最后修改于<?= date('Y-m-d H:i:s', $model->update_time); ?>
                </div>
            </div>
            <div id="comments">
                <?php if ($added) { ?>
                    <br>
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4>谢谢您的回复，我们会尽快审核后发布出来！</h4>
                        <p><?= nl2br($commentModel->content); ?></p>
                        <span class="glyphicon glyphicon-time" aria-hidden="true"></span><em><?= date('Y-m-d H:i:s', $model->create_time) . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; ?></em>
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span><em><?= Html::encode($model->author->nickname); ?></em>
                    </div>
                <?php } ?>
                <?php if ($model->commentCount >= 1) : ?>
                    <h5><?= $model->commentCount . '条评论'; ?></h5>
                    <?= $this->render('_comment', array(
                        'post' => $model,
                        'comments' => $model->activeComments,
                    )); ?>
                <?php endif; ?>
                <h5>发表评论</h5>
                <?php
                $commentModel = new Comment();
                echo $this->render('_guestform', array(
                    'id' => $model->id,
                    'commentModel' => $commentModel,
                )); ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="searchbox">
                <h5>查找文章（
                    <?= Post::find()->count(); ?>
                    ）</h5>
                <form class="form-inline" action="<?= Yii::$app->urlManager->createUrl(['post/index']); ?>" id="w0" method="get">
                    <div class="form-group">
                        <input type="text" class="form-control" name="PostSearch[title]" id="w0input" placeholder="按标题">
                    </div>
                    <button type="submit" class="btn btn-default">搜索</button>
                </form>
            </div>
            <hr />
            <div class="tagcloudbox">
                <h5>Feature Tags</h5>
                <?= TagsCloudWidget::widget(['tags' => $tags]); ?>
            </div>
            <hr />
        </div>
    </div>
</div>