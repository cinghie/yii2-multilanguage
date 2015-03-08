# Yii2 MultiLanguage
Multi Language support for Yii2 Framework

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

Set in Cofiguration File:

// Language Settings
'language'   => 'en',
'sourceLanguage' => 'en_GB',

Set URL Manager in 'component' Configuration File:

```
// Url Manager
'urlManager' => [
    'class' => 'cinghie\multilanguage\components\AdvancedUrlManager',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
],
```
