<?php

use common\models\Adminuser;
use common\models\Poststatus;
use common\models\Post;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <textarea id="markdown-editor"></textarea>

    <script>
        const simplemde = new SimpleMDE({
            element: document.getElementById("markdown-editor")
        });
        const dom = document.getElementById('post-content');
        simplemde.value(dom.value);
        dom.style.visibility = 'hidden';
        dom.style.height = '0';
        simplemde.codemirror.on("change", function() {
            dom.value = simplemde.value()
        });
    </script>

    <?= $form->field($model, 'tags')->textarea(['rows' => 6]) ?>

    <?php
    // $psObjs = Poststatus::find()->all();
    // $allStatus = ArrayHelper::map($psObjs, 'id', 'name');

    // $allStatus = (new \yii\db\Query())
    // ->select(['name', 'id'])
    // ->from('poststatus')
    // ->indexBy('id')
    // ->column()

    $allStatus = Poststatus::find()
        ->select(['name', 'id'])
        ->orderBy('position')
        ->indexBy('id')
        ->column();

    $allAdminuser = Adminuser::find()
        ->select(['nickname', 'id'])
        ->indexBy('id')
        ->column();

    ?>

    <?= $form->field($model, 'status')->dropDownList($allStatus, ['prompt' => '请选择状态']) ?>

    <?= $form->field($model, 'author_id')->dropDownList($allAdminuser, ['prompt' => '请选择作者']) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>