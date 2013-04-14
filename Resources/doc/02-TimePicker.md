TimePicker
==========

The TimePickerType use [**Bootstrap Timepicker**][1]


```php
class DemoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            /*->add('demoInt', null, array('label'=>'form.label_demo_int', 'translation_domain'=>'VinceTDemoBundleDemo'))
            ->add('demoBoolean', null, array('label'=>'form.label_demo_boolean', 'translation_domain'=>'VinceTDemoBundleDemo'))
            ->add('demoString', null, array('label'=>'form.label_demo_string', 'translation_domain'=>'VinceTDemoBundleDemo'))
            ->add('demoText', null, array('label'=>'form.label_demo_text', 'translation_domain'=>'VinceTDemoBundleDemo'))
            ->add('demoDatetime', null, array('label'=>'form.label_demo_datetime', 'translation_domain'=>'VinceTDemoBundleDemo'))*/
            ->add(
                'demoDate', 
                'bootstrap_datepicker', 
                array(
                    'label'=>'form.label_demo_date', 
                    'translation_domain'=>'VinceTDemoBundleDemo', 
                    'required'=>false, 
                    /* day of the week start. 0 for Sunday - 6 for Saturday */
                    'week_start'=>0, 
                    /* set the start view mode. Accepts: 'days', 'months', 'years', 0 for days, 1 for months and 2 for years */
                    'view_mode'=>'days',
                    /* set a limit for view mode. Accepts: 'days', 'months', 'years', 0 for days, 1 for months and 2 for years */
                    'min_view_mode'=>'days'
                )
            )
            ->add(
                'demoTime', 
                'bootstrap_timepicker', 
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
            /*->add('demoDecimal', null, array('label'=>'form.label_demo_decimal', 'translation_domain'=>'VinceTDemoBundleDemo'))
            ->add('demoFloat', null, array('label'=>'form.label_demo_float', 'translation_domain'=>'VinceTDemoBundleDemo'))
            ->add('demoArray', null, array('label'=>'form.label_demo_array', 'translation_domain'=>'VinceTDemoBundleDemo'))
            ->add('demoObject', null, array('label'=>'form.label_demo_object', 'translation_domain'=>'VinceTDemoBundleDemo'))
            ->add('demoJson', null, array('label'=>'form.label_demo_json', 'translation_domain'=>'VinceTDemoBundleDemo'))
            ->add('demoDateTimeZ', null, array('label'=>'form.label_demo_date_time_z', 'translation_domain'=>'VinceTDemoBundleDemo'))*/
        ;
    }
}
```

[1]: http://jdewit.github.io/bootstrap-timepicker/