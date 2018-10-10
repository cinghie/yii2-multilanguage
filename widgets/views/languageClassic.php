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

	<?php

        list($route, $params) = Yii::$app->getUrlManager()->parseRequest(Yii::$app->getRequest());

        $params = ArrayHelper::merge($_GET, $params);
        $url    = isset($params['route']) ? $params['route'] : $route;
        $html   = '';
        $ul     = '<ul style="display: inline-flex; float: left; list-style: outside none none; margin: 0; padding: 0;">';
        $html  .= $ul;

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
                $html .= '<li style="margin-right: 10px;">
                              <a class="active" href="'.$url_lang.'" style="text-decoration: none;">
                                  <img alt="'.$language.'" class="lang-flag" src="'.$url_image.'" title="'.$language.'" width="'.$width.'">
                              </a>
                          </li>';
            }

        }

        $html .= '</ul>';

        echo $html;

	?>

</div>