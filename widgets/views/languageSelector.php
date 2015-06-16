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

    <li class="dropdown" style="list-style: outside none none;">
        
        <?php 	
            
            list($route, $params) = Yii::$app->getUrlManager()->parseRequest(Yii::$app->getRequest());
            $params = ArrayHelper::merge($_GET, $params);
            $url = isset($params['route']) ? $params['route'] : $route;
    
            $html   = "";
            $ul     = '<ul class="head-list dropdown-menu with-arrow">';
            
            // Actual Language
			$url_image_actual = Url::to('@web/img/flags/'.$image_type.'/'.$currentLang.'.png');
            $html .= '
                <a class="lang-selector" data-toggle="dropdown" href="#">
                    <span class="lang-selected">
                        <img alt="'.$currentLang.'" class="lang-flag" src="'.$url_image_actual.'" width="'.$width.'">
                        <span class="lang-name"></span>
                    </span>
                </a>';  
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
                            <li>
                                <a class="active" href="'.$url_lang.'">
                                    <img alt="'.$lang.'" class="lang-flag" src="'.$url_image.'"  title="'.$lang.'" width="'.$width.'">
                                    <span class="lang-name" style="margin-left: 5px;">'.$lang.'</span>
                                </a>
                            </li>';
                }
            } 
            
            $html .= "</ul>";
            
            echo $html;
            
        ?>
        
    </li>

</div>