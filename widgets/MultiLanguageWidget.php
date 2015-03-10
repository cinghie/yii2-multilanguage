<?php

namespace cinghie\multilanguage\widgets;

use Yii;
use yii\base\widget;
use yii\helpers\Html;

class MultiLanguageWidget extends Widget 
{

  public $callingcontroller;
  
  public function run($params = [])
  {
      $currentLang = Yii::$app->language;
      $languages   = Yii::$app->params['languages'];
      
      return HTML::encode("Hello Word!");
  }

}
