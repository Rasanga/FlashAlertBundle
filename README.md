AlertNotificationsBundle
========================

Symfony2 Alert Notification Bundle

[![Build Status](https://scrutinizer-ci.com/g/rasanga/AlertNotificationBundle/badges/build.png?b=master)](https://scrutinizer-ci.com/g/rasanga/AlertNotificationBundle/build-status/master)

# What is AlertNotificationBundle?
AlertNotificationBundle is an open source Bundle which simplifies displaying alert notifications (flash messages) such as success, error, block and info 

## LICENSE
AlertNotificationBundle is licensed under the MIT Open Source license.

Installation
============

## Step 1: Download the AlertNotificationBundle

***Using Composer***

Add the following to the "require" section of your `composer.json` file:

```
    "ras/alert-notification-bundle": "dev-master"
```

And update your dependencies

```
    php composer.phar update
```

***Using submodules***

Excecute following command on your project root:

``` bash
$ git submodule add git@github.com:rasanga/AlertNotificationBundle.git vendor/bundles/Ras/AlertNotificationBundle
$ git submodule update --init
```

## Step 2: Configure the Autoloader

If you are not using composer.
Add it to your `autoload.pp` :

```php
<?php
...
'Ras' => __DIR__.'/../vendor/bundles',
```
## Step 3: Enable the bundle

Registers the bundle in your `app/AppKernel.php`:

```php
<?php
...
public function registerBundles()
{
    $bundles = array(
        ...
        new Ras\Bundle\AlertNotificationBundle\RasAlertNotificationBundle(),
        ...
    );
...
```

## Step 4: Configure the bundle

***Assetic Configuration***

Add the following to the `config.yml` file
```
assetic:
 bundles:        [RasAlertNotificationBundle]
 ```
