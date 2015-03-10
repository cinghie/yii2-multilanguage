<?php

namespace cinghie\multilanguage\widgets;

use yii\base\widget;
use yii\helpers\Html;

class MultiLanguageWidget extends Widget {

  public function init(){
      parent::init();
  }
  
  public function run(){
      return HTML::encode("Hello Word!");
  }

}
