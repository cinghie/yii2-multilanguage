# Yii2 MultiLanguage
Multi Language support for Yii2 Framework based on this post on Official Forum: <br>
http://www.yiiframework.com/forum/index.php/topic/56027-yii2-multilingual-website-url-rules/

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist cinghie/yii2-multilanguage "*"
```

or add this line to the require section of your `composer.json` file.

```
"cinghie/yii2-multilanguage": "*"
```

Configuration
-----------------

Set in Configuration File:

```
// Language Settings
'language'   => 'en',
'sourceLanguage' => 'en_GB',
```

Set URL Manager in 'component' Configuration File:

```
// Url Manager
'urlManager' => [
    'class' => 'cinghie\multilanguage\components\AdvancedUrlManager',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
],
```

Params
-----------------

Set in Params File all the languages do you needs

```
'languages'  =>  [
	'en' => 'English', 
	'it' => 'Italiano', 
	'es' => 'Español',
	'fr' => 'Français',
	'de' => 'Deutsch'
],
```

The first item (English) is your default language.

Controllers
-----------------

All your Controllers needs to extend MultiLanguageController like this:

```
use cinghie\multilanguage\controllers\MultiLanguageController as MultiLanguageController;

class SiteController extends MultiLanguageController
```

Images
-----------------

Copy the img folder from the project root to your web folders to see flag's images

Widgets
-----------------

You can load the MultiLanguage Widget in the your view like this:

```
<?= MultiLanguageWidget::widget([ 
		'widget_type' => 'classic',
		'image_type'  => 'classic',
		'width'       => '18',
		'calling_controller' => $this->context	
]); ?>
```

There are 4 params in the Widget:
* Widget Type can be classic or selector
* Image Type can be classic or rounded
* Width in pixel of the flags
* The Calling Controller (Do not Edit)