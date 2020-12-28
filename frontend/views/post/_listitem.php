<?php

use yii\helpers\Html;
?>

<div class="
                col-sm-12
                col-xs-12
                post-container
            ">
    <div class="post-preview">
        <a href="<?= $model->url; ?>">
            <h2 class="post-title"><?= Html::encode($model->title) ?></h2>
            <div class="post-content-preview">
                <p> <?= $model->beginning; ?></p>
            </div>
        </a>
        <p class="post-meta">
            post by <?= Html::encode($model->author->nickname) ?> on <?= date('Y-m-s H:i:s', $model->create_time); ?>
        </p>
    </div>
</div>