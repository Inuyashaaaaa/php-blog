<?php

use yii\helpers\Html;
?>

<?php foreach ($comments as $comment) : ?>
    <div class="comment">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading" style="display: flex; justify-content:space-between;">
                        <h3 class="panel-title"> <?= Html::encode($comment->user->username); ?></h3>
                        <em><?= date('Y-m-d H:i:s', $comment->create_time); ?></em>
                    </div>
                    <div class="panel-body">
                        <h4 class="media-heading"> <?= nl2br($comment->content); ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>