<?php

/**
* @copyright Copyright &copy; Gogodigital Srls
* @company Gogodigital Srls - Wide ICT Solutions 
* @website http://www.gogodigital.it
* @github https://github.com/cinghie/yii2-multilanguage
* @license GNU GENERAL PUBLIC LICENSE VERSION 3
* @package yii2-multilanguage
* @version 1.0
*/

namespace cinghie\multilanguage\widgets;

use Yii;
use yii\base\widget;

class MultiLanguageWidget extends Widget 
{

  public $calling_controller;
  public $image_type;
  
  public function init(){
	  parent::init();
	  
	  // Exception IF params -> languages not defined
	  if (!isset(Yii::$app->params['languages'])) {
	   	  throw new \yii\base\InvalidConfigException("You must define Yii::\$app->params['languages'] array");
	  }
	  
	  // Image Type
	  if(!$this->image_type) {
	  	  $this->image_type	= 'classic';
	  } else {
  	  	  $this->image_type = $this->image_type;
	  }
  }
  
  public function run($params = [])
  {
      $currentLang = Yii::$app->language;
      $languages   = Yii::$app->params['languages'];
      
      return $this->render('languageSelector', [
          'currentLang' => $currentLang,
          'languages'   => $languages,
		  'image_type'  => $this->image_type,
		  'controller'  => $this->calling_controller
      ]);
  }

}
