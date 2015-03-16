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

namespace cinghie\multilanguage\components;

use yii\web\UrlManager;
use Yii;

class AdvancedUrlManager extends UrlManager
{
    public function createUrl($params)
    {
        if (!isset($params['lang'])) {
            if (Yii::$app->session->has('lang'))
                Yii::$app->language = Yii::$app->session->get('lang');
            else if(isset(Yii::$app->request->cookies['lang']))
                Yii::$app->language = Yii::$app->request->cookies['lang']->value;
            $params['lang']=Yii::$app->language;
        }
        return parent::createUrl($params);
    }
}
