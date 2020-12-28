<?php

use yii\widgets\ListView;
use frontend\components\TagsCloudWidget;
use common\models\Post;

?>

<div class="container">
	<div class="row">
		<div class="col-md-9">
			<?= ListView::widget([
				'id' => 'postList',
				'dataProvider' => $dataProvider,
				'itemView' => '_listitem', //子视图,显示一篇文章的标题等内容.
				'layout' => '{items} {pager}',
				'pager' => [
					'maxButtonCount' => 10,
					'nextPageLabel' => Yii::t('app', '下一页'),
					'prevPageLabel' => Yii::t('app', '上一页'),
				],
			]) ?>
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