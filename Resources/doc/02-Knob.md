Knob
====

The KnobType use [**knob**][1]

```php
class DemoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'demoString',
                'bootstrap_colorpicker',
                array(
                    /* the color format. can be one of: hex, rgb, rgba */
                    'format' => 'rgba'
                )
            )
        ;
    }
}
```

Include stylesheets and javascripts:
```twig
{% block javascripts %}
    {{ parent() }}
    <script src="{{asset('bundles/vincetbootstrapform/knob/js/jquery.knob.js')}}"></script>
    <script src="{{asset('bundles/vincetbootstrapform/js/bootstrap-forms.js')}}"></script>
{% endblock %}
```

[1]: http://anthonyterrien.com/knob/