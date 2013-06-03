Installation
============

1) Installing the bundle
------------------------

Use composer to install this bundle (using the master version)
```
php composer.phar require vincet/bootstrap-form-bundle
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
            - 'VinceTBootstrapFormBundle:Form:fields.html.twig'

```

4) Install assets
-----------------

```
php app/console assets:install
```
