<?php

namespace console\controllers;

use yii\console\Controller;
use common\models\Post;

class HelloController extends Controller
{

  // public function actionList()
  // {
  //   $posts = Post::find()->all();

  //   foreach ($posts as $aPost) {
  //     echo ($aPost['id'] . " - " . $aPost['title'] . "\n");
  //   }
  // }
  // public function actionWho($name)
  // {
  //   echo ("Hello " . $name . "!\n");
  // }

  public $rev;
  public function options($actionID)
  {
    return ['rev'];
  }
  public function optionAliases()
  {
    return ['r' => 'rev'];
  }
  public function actionIndex()
  {
    if ($this->rev == 1) {
      echo strrev("Hello World!") . "\n";
    } else {
      echo "Hello World\n";
    }
  }
}
