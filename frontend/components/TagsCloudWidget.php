<?php

namespace frontend\components;

use Yii;
use yii\base\Widget;
class TagsCloudWidget extends Widget
{
    public $tags;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $tagString = '<div class="tags">';
        foreach ($this->tags as $tag) {
            $url = Yii::$app->urlManager->createUrl(['post/index', 'PostSearch[tags]' => $tag]);
            $tagString .= '<a href="' . $url . '">' .$tag. '</a>';
        }
        return $tagString.'</div>';
    }
}
