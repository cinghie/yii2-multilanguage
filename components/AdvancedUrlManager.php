<?php

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
            $params['language']=Yii::$app->language;
        }
        return parent::createUrl($params);
    }
}
