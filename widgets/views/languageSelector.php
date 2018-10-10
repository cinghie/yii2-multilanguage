<?php

/**
 * @var bool $addCurrentLang
 * @var string $currentLang
 * @var string $image_type
 * @var array $languages
 * @var bool $link_home
 * @var string $width
 */

use yii\helpers\ArrayHelper;
use yii\helpers\Url;

?>

<div class="multilanguage">

    <li class="dropdown" style="list-style: outside none none;">
        
        <?php 	
            
            list($route, $params) = Yii::$app->getUrlManager()->parseRequest(Yii::$app->getRequest());

            $params = ArrayHelper::merge($_GET, $params);
            $url    = isset($params['route']) ? $params['route'] : $route;
            $html   = '';
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
            foreach($languages as $language)
            {
	            if($link_home) {

		            $url_lang = Yii::$app->urlManager->createUrl([
				            'site/index',
				            'language' => $language ]
		            );

	            } else {

		            $url_lang = Yii::$app->urlManager->createUrl(ArrayHelper::merge(
			            $params, [ $url,'language' => $language ]
		            ));
	            }

	            $url_image = Url::to('@web/img/flags/'.$image_type.'/'.$language.'.png');

                if ($language !== $currentLang || $addCurrentLang) {
	                $html .= '<li>
                              <a class="active" href="' . $url_lang . '">
                                  <img alt="' . $language . '" class="lang-flag" src="' . $url_image . '"  title="' . $language . '" width="' . $width . '">
                                  <span class="lang-name" style="margin-left: 5px;">' . $language . '</span>
                               </a>
                          </li>';
                }
            } 
            
            $html .= '</ul>';
            
            echo $html;
            
        ?>
        
    </li>

</div>