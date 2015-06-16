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

use yii\helpers\ArrayHelper;
use yii\helpers\Url;

?>

<div class="multilanguage">
        
        <?php 	
            
            list($route, $params) = Yii::$app->getUrlManager()->parseRequest(Yii::$app->getRequest());
            $params = ArrayHelper::merge($_GET, $params);
            $url = isset($params['route']) ? $params['route'] : $route;
    
            $html   = "";
            $ul     = '<ul style="display: inline-flex; float: left; list-style: outside none none; margin: 0; padding: 0;">';
            $html .= $ul; 
            
            // All other languages
            foreach($languages as $key=>$lang) 
            { 			
                if ($key!=$currentLang) {
                    
                    $url_lang = Yii::$app->urlManager->createUrl(ArrayHelper::merge(
                        $params, [ $url,'lang' => $key ]
                    ));
					
					$url_image = Url::to('@web/img/flags/'.$image_type.'/'.$key.'.png');
                
                    $html .= '
                            <li style="margin-right: 10px;">
                                <a class="active" href="'.$url_lang.'" style="text-decoration: none;">
                                    <img alt="'.$lang.'" class="lang-flag" src="'.$url_image.'" title="'.$lang.'" width="'.$width.'">
                                </a>
                            </li>';
                }
            } 
            
            $html .= "</ul>";
            
            echo $html;
            
        ?>

</div>