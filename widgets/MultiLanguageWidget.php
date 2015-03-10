<?php

/**
* @copyright Copyright &copy; Gogodigital Srls, gogodigital.it, 2015
* @package yii2-multilanguage
* @license GNU GPLv3
* @version 1.0
*/

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
