FlashAlertBundle
========================
FlashAlertBundle is an open source Bundle which simplifies displaying flash alerts such as success, error, info and warning

[![Build Status](https://scrutinizer-ci.com/g/rasanga/FlashAlertBundle/badges/build.png?b=master)](https://scrutinizer-ci.com/g/rasanga/FlashAlertBundle/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/rasanga/FlashAlertBundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/rasanga/FlashAlertBundle/?branch=master)

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

### Step 2: Configure the Autoloader
If you are not using composer.
Add the following to your `autoload.php`:
```php
<?php
...
'Ras' => __DIR__.'/../vendor/bundles',
```

### Step 3: Enable the bundle
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

### Step 4: Configure the bundle
***Assetic Configuration***
Add the following to the `config.(yml,xml)` file:
```
assetic:
    bundles:        [RasFlashAlertBundle]
```

Usage
=====
### Add flash alerts
Add the following PHP code to report an alert message:
```
    $this->get('Ras.Alert.AlertReportingService')->addError("Access denied");
```
**Note:** You can choose one of the following functions to call from 
`$this->get('Ras.Alert.AlertReportingService')`
```
    addSuccess()
    addError()
    addInfo()
    addWarning()
```

### Display flash alerts
Add the following twig code where you want to display alert messages:
```
    {{ render(controller('RasFlashAlertBundle:Alert:displayAlerts')) }}
```
**Note:** The parent twig template would be the best place for displaying flash alerts

LICENSE
=======
FlashAlertBundle is licensed under the MIT Open Source license.
