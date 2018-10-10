<?php

/**
* @copyright Copyright &copy; Gogodigital Srls
* @company Gogodigital Srls - Wide ICT Solutions 
* @website http://www.gogodigital.it
* @github https://github.com/cinghie/yii2-multilanguage
* @license GNU GENERAL PUBLIC LICENSE VERSION 3
* @package yii2-multilanguage
* @version 2.0.2
*/

namespace cinghie\multilanguage\widgets;

use Yii;
use yii\base\InvalidConfigException;
use yii\base\Widget;

class MultiLanguageWidget extends Widget
{

    public $addCurrentLang;
    public $calling_controller;
    public $image_type;
    public $link_home;
    public $widget_type;
    public $width;

	/**
	 * @throws InvalidConfigException
	 */
	public function init()
    {
	    parent::init();

	    // Exception IF params -> languages not defined
	    if (!isset(Yii::$app->urlManager->languages)) {
	   	    throw new InvalidConfigException("You must define Yii::\$app->urlManager->languages array like ['it', 'en', 'fr', 'de', 'es']");
	    }

	    // Add Current Lang
	    if(!$this->addCurrentLang) {
		    $this->addCurrentLang = false;
	    }

	    // Icon Width
	    if(!$this->width) {
		    $this->width = '24';
	    }

	    // Image Type
	    if(!$this->image_type) {
	  	    $this->image_type = 'classic';
	    }

	    // Link Home
	    if(!$this->link_home) {
		    $this->link_home = false;
	    }

	    // Widget Type
	    if(!$this->widget_type) {
		    $this->widget_type = 'classic';
	    }
    }

    public function run($params = [])
    {
        $currentLang = Yii::$app->language;
        $languages   = Yii::$app->urlManager->languages;

	    if ((string)$this->widget_type === 'selector') {
		    $renderView = 'languageSelector';
	    } else {
		    $renderView = 'languageClassic';
	    }

        return $this->render($renderView, [
	        'addCurrentLang' => $this->addCurrentLang,
	        'controller'  => $this->calling_controller,
            'currentLang' => $currentLang,
		    'image_type'  => $this->image_type,
            'languages'   => $languages,
            'link_home'   => $this->link_home,
	        'width'       => $this->width
        ]);
    }

}
