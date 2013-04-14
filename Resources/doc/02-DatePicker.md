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
                    /* day of the week start. 0 for Sunday - 6 for Saturday */
                    'week_start'=>0, 
                    /* set the start view mode. Accepts: 'days', 'months', 'years', 0 for days, 1 for months and 2 for years */
                    'view_mode'=>'days',
                    /* set a limit for view mode. Accepts: 'days', 'months', 'years', 0 for days, 1 for months and 2 for years */
                    'min_view_mode'=>'days'
                )
            )
        ;
    }
}
```

[1]: http://www.eyecon.ro/bootstrap-datepicker/