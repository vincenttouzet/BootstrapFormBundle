Installation
============

1) Installing the bundle
------------------------

Use composer to install this bundle (using the master version)
```
composer require vincet/bootstrap-form-bundle
```

2) Register the bundle
----------------------

In app/appKernel.php add the following line to register the bundle:
```php
[...]
            new VinceT\BootstrapFormBundle\VinceTBootstrapFormBundle(),
[...]
```

3) Configure
------------

In app/config/config.yml add:
```yml
twig:
    form:
        resources:
            # For bootstrap 2
            #- 'VinceTBootstrapFormBundle:Form:fields.html.twig'
            # For bootstrap 3
            - 'VinceTBootstrapFormBundle:Form:bootstrap3.html.twig.html.twig'

```

4) Install assets
-----------------

```
php app/console assets:install
```
5) Optionnal : import demo routes
---------------------------------

The bundle comes with demo controller to show examples for the different form types.

```yml
#app/config/routing_dev.yml
vincet_bootstrap_form:
    resource: "@VinceTBootstrapFormBundle/Resources/config/routing.yml"
    prefix: /_bootstrap-form
```

Then you can access examples on http://localhost/app_dev.php/_bootstrap-form/chosen
