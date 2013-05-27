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
                    'drp_translation_domain'=>'VinceTBootstrapFormBundle',
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
                        'clearLabel' => 'Clear',
                        'fromLabel' => 'From',
                        'toLabel' => 'To',
                        'weekLabel' => 'W',
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
    <link rel="stylesheet" type="text/css" href="{{asset('bundles/vincetbootstrapform/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bundles/vincetbootstrapform/bootstrap-daterangepicker/daterangepicker.css')}}">
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script src="{{asset('bundles/vincetbootstrapform/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('bundles/vincetbootstrapform/bootstrap-daterangepicker/date.js')}}"></script>
    <script src="{{asset('bundles/vincetbootstrapform/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('bundles/vincetbootstrapform/js/bootstrap-forms.js')}}"></script>
{% endblock %}
```

Translate
---------

You can translate the labels and ranges. By default it uses the `VinceTBootstrapFormBundle` translation domain. 
You can customize this by override this domain or by using your own domain with the `dpr_translation_domain` and create your catalog file.

yml example:
```yml
"Submit": "Valider"
"Clear": "Réinitialiser"
"From": "De"
"To": "À"
"W": "S"
"Custom Range": "Personnalisé"
"Su": "Di"
"Mo": "Lu"
"Tu": "Ma"
"We": "Me"
"Th": "Je"
"Fr": "Ve"
"Sa": "Sa"
"January": "Janvier"
"February": "Février"
"March": "Mars"
"April": "Avril"
"May": "Mai"
"June": "Juin"
"July": "Juillet"
"August": "Août"
"September": "Septembre"
"October": "Octobre"
"November": "Novembre"
"December": "Décembre"
"0": "1" # firstDay
# ranges
"Today": "Aujourd'hui"
"Yesterday": "Hier"
"Last 7 days": "Les 7 derniers jours"
"Last week": "La semaine dernière"
"Last month": "Le mois dernier"
"Last year": "L'année dernière"
```

You can also contribute to the translation for this bundle. Just fork and make a pull request.


[1]: https://github.com/dangrossman/bootstrap-daterangepicker