ColorPicker
==========

The ColorPickerType use the [**bootstrap-colorpicker**][1]

```php
class DemoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'demoString',
                ColorPickerType::class,
                array(
                    /* the color format. can be one of: hex, rgb, rgba */
                    'format' => 'rgba',
                    /* wether to display the widget as component (with input disabled and input append) */
                    'use_component' => true,
                )
            )
        ;
    }
}
```

Include stylesheets and javascripts:
```twig
{% block stylesheets %}
    {{ parent() }}
    <link rel="stylesheet" type="text/css" href="{{ asset('bundles/vincetbootstrapform/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bundles/vincetbootstrapform/vendor/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css') }}">
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script src="{{ asset('bundles/vincetbootstrapform/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('bundles/vincetbootstrapform/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bundles/vincetbootstrapform/vendor/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js') }}"></script>
    <script src="{{ asset('bundles/vincetbootstrapform/js/bootstrap-forms.js') }}"></script>
{% endblock %}
```

[1]: http://www.eyecon.ro/bootstrap-colorpicker/