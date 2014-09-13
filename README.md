FlashAlertBundle
========================
FlashAlertBundle is an open source Bundle which simplifies displaying flash alerts such as success, error, info and warning

[![Build Status](https://scrutinizer-ci.com/g/rasanga/FlashAlertBundle/badges/build.png?b=master)](https://scrutinizer-ci.com/g/rasanga/FlashAlertBundle/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/rasanga/FlashAlertBundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/rasanga/FlashAlertBundle/?branch=master)

![Demo screenshot](https://s3.amazonaws.com/fvd-data/notes/258675/1410605457-Kse8z1/screen.png "Demo screenshot")

Table of Contents
========================
1. [Usage](#usage)
  1. [Report flash alerts](#report-flash-alerts)
  2. [Display flash alerts](#display-flash-alerts)
2. [Installation](#installation)
  1. [Download the FlashAlertBundle](#step-1-download-the-flashalertbundle)
  2. [Enable the bundle](#step-2-enable-the-bundle)
3. [License](#license)

Usage
=====
## Report flash alerts
Add the following PHP code to report an alert message:
```
    $this->get('Ras.Alert.AlertReportingService')->addError("Access denied");
```
**Note:** You can choose one of the following functions to call from
`$this->get('Ras.Alert.AlertReportingService')`
```
    addSuccess()
    addError()
    addWarning()
    addInfo()
```

## Display flash alerts
Add the following twig code where you want to display alert messages:
```
    {{ render(controller('RasFlashAlertBundle:Alert:displayAlerts')) }}
```
**Note 1:** The parent twig template would be the best place for displaying flash alerts

#### Display flash alerts with custom styles
The bundle defines alert styles by default. However, you can turn off default styles by setting
isAddStyles variable to false as shown in below.
```
    {{ render(controller('RasFlashAlertBundle:Alert:displayAlerts', { 
        'isAddStyles': false
    })) }}
```

Then you can <b>define your own styles</b> to match alert classes such as `alert`,
`alert-close`, `alert-success`, `alert-error`, `alert-warning` and `alert-info`

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

LICENSE
=======
FlashAlertBundle is licensed under the MIT Open Source license.
