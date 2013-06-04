DatePicker
==========

The DatePickerType use the [**bootstrap-datepicker**][1]

```php
class DemoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'demoDate', 
                'bootstrap_datepicker', 
                array(
                    // format
                    'format' => 'yyyy-MM-dd',
                    //  day of the week start. 0 for Sunday - 6 for Saturday 
                    'week_start'=>0, 
                    // Whether or not to show week numbers to the left of week rows
                    'calendar_weeks' => false,
                    // The earliest date that may be selected; all earlier dates will be disabled.
                    'start_date' => '',
                    // The latest date that may be selected; all later dates will be disabled.
                    'end_date' => '',
                    // Days of the week that should be disabled. Values are 0 (Sunday) to 6 (Saturday). Multiple values should be comma-separated
                    'days_of_week_disabled' => '',
                    // Whether or not to close the datepicker immediately when a date is selected
                    'autoclose' => true,
                    //  set the start view mode. Accepts: month', 'year', 'decade', 0 for month, 1 for year and 2 for decade
                    'start_view'=>'month',
                    //  set a limit for view mode. Accepts: 'days', 'months', 'years', 0 for days, 1 for months and 2 for years 
                    'min_view_mode'=>'days',
                    // If true or "linked", displays a "Today" button at the bottom of the datepicker to select the current date. 
                    // If true, the "Today" button will only move the current date into view; if "linked", the current date will also be selected.
                    'today_btn' => false,
                    // If true, highlights the current date.
                    'today_highlight' => false,
                    // If true, displays a "Clear" button at the bottom of the datepicker to clear the input value. 
                    // If "autoclose" is also set to true, this button will also close the datepicker.
                    'clear_btn' => false,
                    // language to use. If false it use the %locale% parameter
                    'language' => false,
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
    <link rel="stylesheet" type="text/css" href="{{asset('bundles/vincetbootstrapform/bootstrap-datepicker/css/datepicker.css')}}">
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script src="{{asset('bundles/vincetbootstrapform/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('bundles/vincetbootstrapform/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
    <!-- Include translation for the language you choose (optionnal if you're using 'en' language) -->
    <script src="{{asset('bundles/vincetbootstrapform/bootstrap-datepicker/js/locales/bootstrap-datepicker.fr.js')}}"></script>
    <script src="{{asset('bundles/vincetbootstrapform/js/bootstrap-forms.js')}}"></script>
{% endblock %}
```

[1]: https://github.com/eternicode/bootstrap-datepicker