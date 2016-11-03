TimePicker
==========

The TimePickerType use [**Bootstrap Timepicker**][1]


```php
class DemoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'demoTime', 
                TimePickerType::class,
                array(
                    'label'=>'form.label_demo_time', 
                    'translation_domain'=>'VinceTDemoBundleDemo', 
                    'required'=>false, 
                    /* Specify a step for the minute field. */
                    'minute_step' => 15,
                    /* Specify a step for the second field. */
                    'second_step' => 15,
                    /* Show the seconds field. */
                    'with_seconds' => false,
                    /* Disables the input from focusing. This is useful for touch screen devices that display a keyboard on input focus. */
                    'disable_focus'=>true,
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
    <link rel="stylesheet" type="text/css" href="{{ asset('bundles/vincetbootstrapform/vendor/bootstrap-timepicker/css/timepicker.css') }}">
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script src="{{ asset('bundles/vincetbootstrapform/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('bundles/vincetbootstrapform/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bundles/vincetbootstrapform/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js') }}"></script>
    <script src="{{ asset('bundles/vincetbootstrapform/js/bootstrap-forms.js') }}"></script>
{% endblock %}
```

[1]: http://jdewit.github.io/bootstrap-timepicker/