DateRangePicker
==========

The DateRangePickerType use the [**bootstrap-daterangepicker**][1]

```php
class DemoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'demoString', 
                'bootstrap_daterangepicker', 
                array(
                    'label'=>'form.label_demo_string', 
                    'translation_domain'=>'VinceTDemoBundleDemo',
                    'required' => false,
                    /* if a VinceT\BootstrapFormBundle\Entity\DateRange object is used as data it must be set to true, otherwise a string is used */
                    'use_daterange_entity' => false,
                    /* opens on the left or on the right */
                    'opens' => 'right',
                    /* separator used between the two dates */
                    'separator' => ' - ',
                    /* show the week numbers */
                    'show_week_numbers' => true,
                    /* show dropdowns for the months and year */
                    'show_dropdowns' => false,
                    /* min date */
                    'min_date' => null,
                    /* max date */
                    'max_date' => null,
                    /* date limit: false or array('days'=>5) */
                    'date_limit' => false,
                    /* ranges null or array */
                    'ranges' => null,
                    /*'ranges' => array(
                        'Today' => array('today', 'today'),
                        'Yesterday' => array('yesterday', 'yesterday'),
                        'Last 7 days' => array('2013-04-14', '2013-04-21'),
                    ),*/
                    /* locale values */
                    'locale' => array(
                        'applyLabel' => 'Submit',
                        'fromLabel' => 'From',
                        'toLabel' => 'To',
                        'customRangeLabel' => 'Custom Range',
                        'daysOfWeek' => array('Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'),
                        'monthNames' => array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
                        'firstDay' => 0,
                    ),
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
    <link rel="stylesheet" type="text/css" href="{{asset('bundles/vincetbootstrapform/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bundles/vincetbootstrapform/css/daterangepicker.css')}}">
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script src="{{asset('bundles/vincetbootstrapform/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('bundles/vincetbootstrapform/js/date.js')}}"></script>
    <script src="{{asset('bundles/vincetbootstrapform/js/daterangepicker.js')}}"></script>
    <script src="{{asset('bundles/vincetbootstrapform/js/bootstrap-forms.js')}}"></script>
{% endblock %}
```

[1]: https://github.com/dangrossman/bootstrap-daterangepicker