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

namespace cinghie\multilanguage\controllers;

use Yii;
use yii\web\Controller;

class MultiLanguageController extends Controller
{
    public function init()
    {
        parent::init();
        
		// If there is a post-request, redirect the application to the provided url of the selected lang
        if (isset($_POST['lang'])) {
            $lang = $_POST['lang'];
            $MultilangReturnUrl = $_POST[$lang];
            $this->redirect($MultilangReturnUrl);
        }
        
		// Set the application lang if provided by GET, session or cookie
        if (isset($_GET['lang'])) {
            Yii::$app->language = $_GET['lang'];
            Yii::$app->session->set('lang', $_GET['lang']);
            $cookie = new \yii\web\Cookie([
                'name' => 'lang',
                'value' => $_GET['lang'],
            ]);
            $cookie->expire = time() + (60 * 60 * 24 * 365); // (1 year)
            Yii::$app->response->cookies->add($cookie);
        } else if (Yii::$app->session->has('lang'))
            Yii::$app->language = Yii::$app->session->get('lang');
        else if (isset(Yii::$app->request->cookies['lang']))
            Yii::$app->language = Yii::$app->request->cookies['lang']->value;

    }

    public function createMultilangReturnUrl($lang = 'en_GB', $params = [])
    {
        if (count($_GET) > 0) {
            $arr = $_GET;
            $arr['lang'] = $lang;
        } else
            $arr = array('lang' => $lang);

        $param_temp = [
            $this->module->requestedRoute,
            'lang' => $arr['lang'],
        ];
        $params = array_merge($param_temp,$params);
        $urlManager = Yii::$app->urlManager;
        return $urlManager->createUrl($params);
    }
	
}
