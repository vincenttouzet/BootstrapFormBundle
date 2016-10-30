Email
=====

The EmailType just prepend the input with an icon.


```php
class DemoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('demoString', EmailType::class)
        ;
    }
}
```

Include stylesheets and javascripts:
```twig
{% block stylesheets %}
    {{ parent() }}
    <link rel="stylesheet" type="text/css" href="{{asset('bundles/vincetbootstrapform/bootstrap/css/bootstrap.min.css')}}">
{% endblock %}
```
