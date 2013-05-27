ColorPicker
==========

The ColorPickerType use the [**bootstrap-slider**][1]

```php
class DemoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'demoString',
                'bootstrap_slider',
                array(
                    // minimum possible value
                    'min' => 0,
                    // maximum possible value
                    'max' => 1000,
                    // increment step
                    'step' => 50,
                    // set the orientation. Accepts 'vertical' or 'horizontal'
                    'orientation' => 'horizontal',
                    // selection plament. Accepts: 'before', 'after' or 'none'. In case of a range slider, the selection will be placed between the handles
                    'selection' => 'before',
                    // whatever to show or hide the tooltip. Accepts: 'show' or 'hide'
                    'tooltip' => 'show',
                    // handle shape. Accepts: 'round', 'square' or 'triangle'
                    'handle' => 'round',
                    // whether to have a range slider or not
                    'range' => false
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
    <link rel="stylesheet" type="text/css" href="{{asset('bundles/vincetbootstrapform/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bundles/vincetbootstrapform/bootstrap-slider/css/slider.css')}}">
    <!-- CSS fix (in sonata admin 2.2 the input is dsplayed without this fix) -->
    <link rel="stylesheet" type="text/css" href="{{asset('bundles/vincetbootstrapform/css/fix.css')}}">
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script src="{{asset('bundles/vincetbootstrapform/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('bundles/vincetbootstrapform/bootstrap-slider/js/bootstrap-slider.js')}}"></script>
    <script src="{{asset('bundles/vincetbootstrapform/js/bootstrap-forms.js')}}"></script>
{% endblock %}
```

[1]: http://www.eyecon.ro/bootstrap-slider/