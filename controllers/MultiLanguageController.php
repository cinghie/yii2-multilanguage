<?php

namespace cinghie\multilanguage\components;
use Yii;

class Controller extends \yii\web\Controller
{
    public function init()
     {
        parent::init();
        // If there is a post-request, redirect the application to the provided url of the selected language
         if (isset($_POST['language'])) {
            $lang = $_POST['language'];
            $MultilangReturnUrl = $_POST[$lang];
            $this->redirect($MultilangReturnUrl);
        }
        // Set the application language if provided by GET, session or cookie
        if (isset($_GET['language'])) {
            Yii::$app->language = $_GET['language'];
            Yii::$app->session->set('language', $_GET['language']);
            $cookie = new \yii\web\Cookie([
                'name' => 'language',
                'value' => $_GET['language'],
            ]);
            $cookie->expire = time() + (60 * 60 * 24 * 365); // (1 year)
            Yii::$app->response->cookies->add($cookie);
        } else if (Yii::$app->session->has('language'))
            Yii::$app->language = Yii::$app->session->get('language');
        else if (isset(Yii::$app->request->cookies['language']))
            Yii::$app->language = Yii::$app->request->cookies['language']->value;

    }

     public function createMultilanguageReturnUrl($lang = 'fr_CA', $params = [])
    {
        if (count($_GET) > 0) {
            $arr = $_GET;
            $arr['language'] = $lang;
        } else
            $arr = array('language' => $lang);

        $param_temp = [
            $this->module->requestedRoute,
            'language' => $arr['language'],
        ];
        $params = array_merge($param_temp,$params);
        $urlManager = Yii::$app->urlManager;
        return $urlManager->createUrl($params);
    }
}
