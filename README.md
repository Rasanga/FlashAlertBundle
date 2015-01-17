FlashAlertBundle
========================
FlashAlertBundle is an open source Bundle which simplifies displaying flash alerts such as success, error, info and warning

[![Build Status](https://scrutinizer-ci.com/g/rasanga/FlashAlertBundle/badges/build.png?b=master)](https://scrutinizer-ci.com/g/rasanga/FlashAlertBundle/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/rasanga/FlashAlertBundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/rasanga/FlashAlertBundle/?branch=master)

![Demo screenshot](https://s3.amazonaws.com/fvd-data/notes/258675/1410605457-Kse8z1/screen.png "Demo screenshot")

Table of Contents
========================
1. [Installation](#installation)
  1. [Download the FlashAlertBundle](#step-1-download-the-flashalertbundle)
  2. [Enable the bundle](#step-2-enable-the-bundle)
  3. [Configure the bundle](#step-3-configure-the-bundle)
2. [Usage](#usage)
  1. [Report flash alerts](#report-flash-alerts)
  2. [Display flash alerts](#display-flash-alerts)
3. [Configuration](#configuration)
  1. [Override view template](#override-view-template)
  2. [Add custom styles](#add-custom-styles)
4. [Changelog](#changelog)
5. [License](#license)


Installation
============
### Step 1: Download the FlashAlertBundle
***Using Composer***
Add the following to the "require" section of your `composer.json` file:
```
    "ras/flash-alert-bundle": "dev-master"
```
And update your dependencies
```
    php composer.phar update
```

***Using submodules***
Execute the following command on your project root:
``` bash
$ git submodule add git@github.com:rasanga/FlashAlertBundle.git vendor/bundles/Ras/FlashAlertBundle
$ git submodule update --init
```

### Step 2: Enable the bundle
Registers the bundle in your `app/AppKernel.php`:
```php
<?php
...
public function registerBundles()
{
    $bundles = array(
        ...
        new Ras\Bundle\FlashAlertBundle\RasFlashAlertBundle(),
        ...
    );
...
```

### Step Optional, if you are not using composer: Configure the Autoloader
Add the following to your `autoload.php`:
```php
<?php
...
'Ras' => __DIR__.'/../vendor/bundles',
```

Usage
=====
## Report flash alerts
Add the following PHP code to report an alert message:
```
    $this->get('ras_flash_alert.alert_reporter')->addError("Access denied");
```
**Note:** You can choose one of the following functions to call from
`$this->get('ras_flash_alert.alert_reporter')`
```
    addSuccess()
    addError()
    addWarning()
    addInfo()
```

## Display flash alerts
Add the following twig code where you want to display alert messages:
```
    {{ render_flash_alerts() }}
```
**Note 1:** The parent twig template would be the best place for displaying flash alerts

Configuration
=====
The following parameters can be overriden in your `config.yml` or similar:
```
ras_flash_alert:
    template: '::flashAlerts.html.twig'     # defaults to 'RasFlashAlertBundle::layout.html.twig'
    isAddStyles: false                      # defaults to true
    isAddJsAlertClose: false                # defaults to true
```

These can also be passed as parameters in the view when rendering alerts - for example:
```
    {{ render_flash_alerts({ 'template': '::flashAlerts.html.twig', 'isAddStyles': false }) }}
```

## Override view template
1. Crete template in the `/Resources/views/` or in your bundle
2. Retrieve alerts into your template with `{{ get_alert_publisher() }}`
3. Include template blocks in `FlashAlertBundle/Resources/views/FlashAlert` directory or define your own blocks (follow `FlashAlertBundle/Resources/views/FlashAlert/flashAlerts.html.twig` to see how you can define your own template) 

## Add custom styles
The bundle default template has styles defined by default. However, you can turn off default styles by configuring
isAddStyles variable to false as shown in below.
```
    {{ render_flash_alerts({ 'isAddStyles': false }) }}
```

Then you can <b>define your own styles</b> to match alert classes such as `alert`,
`alert-close`, `alert-success`, `alert-error`, `alert-warning` and `alert-info`

CHANGELOG
=======
#### 2.0
    Add twig method for rendering alerts: `{{ render_flash_alerts() }}`
    Add twig method for retrieving alerts: `{{ get_alert_publisher() }}`
    Deprecated controller view render 

LICENSE
=======
FlashAlertBundle is licensed under the MIT Open Source license.


[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/rasanga/flashalertbundle/trend.png)](https://bitdeli.com/free "Bitdeli Badge")

