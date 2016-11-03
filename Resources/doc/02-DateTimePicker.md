DateTimePicker
==============

The DateTimePickerType use the [**bootstrap-datepicker**][1] and [**Bootstrap Timepicker**][2]

```php

class DemoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'demoDatetime', 
                DateTimePickerType::class,
                array(
                    /* day of the week start. 0 for Sunday - 6 for Saturday */
                    'week_start'=>0, 
                    /* set the start view mode. Accepts: 'days', 'months', 'years', 0 for days, 1 for months and 2 for years */
                    'view_mode'=>'days',
                    /* set a limit for view mode. Accepts: 'days', 'months', 'years', 0 for days, 1 for months and 2 for years */
                    'min_view_mode'=>'days',
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
    <link rel="stylesheet" type="text/css" href="{{ asset('bundles/vincetbootstrapform/vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bundles/vincetbootstrapform/vendor/bootstrap-timepicker/css/timepicker.css') }}">
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script src="{{ asset('bundles/vincetbootstrapform/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('bundles/vincetbootstrapform/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bundles/vincetbootstrapform/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- Include translation for the language you choose (optionnal if you're using 'en' language) -->
    {% if app.request.locale != 'en' %}
        <script src="{{ asset('bundles/vincetbootstrapform/vendor/bootstrap-datepicker/dist/locales/bootstrap-datepicker.'~app.request.locale~'.min.js') }}"></script>
    {% endif %}
    <script src="{{ asset('bundles/vincetbootstrapform/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js') }}"></script>
    <script src="{{ asset('bundles/vincetbootstrapform/js/bootstrap-forms.js') }}"></script>
{% endblock %}
```

[1]: http://www.eyecon.ro/bootstrap-datepicker/
[2]: http://jdewit.github.io/bootstrap-timepicker/
