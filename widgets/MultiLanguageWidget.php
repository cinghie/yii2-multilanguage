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

class MultiLanguageWidget extends \yii\base\Widget  
{

  public $calling_controller;
  public $image_type;
  public $widget_type;
  public $width;
  
  public function init()
  {
	  parent::init();
	  
	  // Exception IF params -> languages not defined
	  if (!isset(Yii::$app->params['languages'])) {
	   	  throw new \yii\base\InvalidConfigException("You must define Yii::\$app->params['languages'] array");
	  }
	  
	  // Widget Type
	  if(!$this->widget_type) {
	  	  $this->widget_type = 'classic';
	  } else {
  	  	  $this->widget_type = $this->widget_type;
	  }
	  
	  // Image Type
	  if(!$this->image_type) {
	  	  $this->image_type = 'classic';
	  } else {
  	  	  $this->image_type = $this->image_type;
	  }
	  
	  // Widget Type
	  if(!$this->width) {
	  	  $this->width = '24';
	  } else {
  	  	  $this->width = $this->width;
	  }
  }
  
  public function run($params = [])
  {
      $currentLang = Yii::$app->language;
      $languages   = Yii::$app->params['languages'];
	  
	  switch($this->widget_type) 
	  {
		 case "selector":
		 	$renderView = 'languageSelector';
			break;
		 default:
		 	$renderView = 'languageClassic';
	  }
      
      return $this->render($renderView, [
		  'image_type'  => $this->image_type,
		  'width'       => $this->width,
          'currentLang' => $currentLang,
          'languages'   => $languages,
	  	  'controller'  => $this->calling_controller
      ]);
  }

}
