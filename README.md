# Yii2 MultiLanguage

![License](https://img.shields.io/packagist/l/cinghie/yii2-multilanguage.svg)
![Latest Stable Version](https://img.shields.io/github/release/cinghie/yii2-multilanguage.svg)
![Latest Release Date](https://img.shields.io/github/release-date/cinghie/yii2-multilanguage.svg)
![Latest Commit](https://img.shields.io/github/last-commit/cinghie/yii2-multilanguage.svg)
[![Total Downloads](https://img.shields.io/packagist/dt/cinghie/yii2-multilanguage.svg)](https://packagist.org/packages/cinghie/yii2-multilanguage)

Multi Language support for Yii2 Framework based on this post on Official Forum: <br>
http://www.yiiframework.com/forum/index.php/topic/56027-yii2-multilingual-website-url-rules/

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require cinghie/yii2-multilanguage "*"
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

Make sure you have set the parameter 'language': the default language will be that

Set URL Manager in 'component' Configuration File:

```
// Url Manager
'urlManager' => [
    'class' => 'codemix\localeurls\UrlManager',
    'languages' => ['en', 'it', 'fr', 'de', 'es'], // List all supported languages here
    'enablePrettyUrl' => true,
    'showScriptName' => false,
],
```

Images
-----------------

Copy the img folder from the project root to your web folders to see flag's images

Widgets
-----------------

You can load the MultiLanguage Widget in the your view like this:

```
<?= MultiLanguageWidget::widget([
	'addCurrentLang' => true, // add current lang
	'calling_controller' => $this->context,
	'image_type'  => 'classic', // classic or rounded
	'link_home'   => true, // true or false
	'widget_type' => 'classic', // classic or selector
	'width'       => '28'
]); ?>
```

There are 4 params in the Widget:
* Widget Type can be classic or selector
* Image Type can be classic or rounded
* Width in pixel of the flags
* The Calling Controller (Do not Edit)

Changelog
-----------------

<ul>
  <li>Version 2.0.2 - Adding options to add current Lang on widgets</li>
  <li>Version 2.0.1 - Adding Ca, Ch, In, Ne, Ru, Us flags</li>
  <li>Version 2.0.0 - Refactoring project adding Yii2 Locale URLs: https://github.com/codemix/yii2-localeurls</li>
  <li>Version 1.2.0 - Minor improvements</li>
  <li>Version 1.1.2 - Fixing error to extends yii Widget problem</li>
  <li>Version 1.1.1 - Update Copyright and license</li>
  <li>Version 1.1.0 - Bug Fixed not home View</li>
  <li>Version 1.0.0 - Initial Release</li>
</ul>
