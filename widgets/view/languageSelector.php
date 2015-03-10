<?php

/**
* @copyright Copyright &copy; Gogodigital Srls, gogodigital.it, 2015
* @package yii2-multilanguage
* @license GNU GPLv3
* @version 1.0
*/

?>

<div id="language-select">
    <?php
        // Render options as dropDownList
        echo yii\helpers\Html::form();
        foreach($languages as $key=>$lang) {
            echo yii\helpers\Html::hiddenInput(
            $key,
            $this->getOwner()->createMultilanguageReturnUrl($key));
        }
        echo yii\helpers\Html::dropDownList('language', $currentLang, $languages,
          array(
              'submit'=>'',
          )
        );
        echo yii\helpers\Html::endForm();
    ?>
</div>
