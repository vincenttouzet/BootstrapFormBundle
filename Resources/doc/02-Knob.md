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
                'demoInt',
                'knob',
                array(
                    // width of knob: integer
                    'width' => 200,
                    // height of knob: integer
                    'height' => 200,
                    // display input: true | false
                    'displayInput' => true,
                    // use a cursor: null | true | integer (width of cursor)
                    'cursor' => 0,
                    // thickness: null | float (<1)
                    'thickness' => 0.35,
                    // color: null | string
                    'fgColor' => '#87CEEB',
                    // display previous or not: true | false
                    'displayPrevious' => false,
                    // linecap: null | string
                    'linecap' => 'butt',
                    // angle offset: null | integer
                    'angleOffset' => null,
                    // angle arc: null | integer
                    'angleArc' => null,
                    // step: null | integer
                    'step' => 1,
                    // min: null | integer
                    'min' => 0,
                    // max: null | integer
                    'max' => 100,
                    // readonly: false|true
                    'readonly' => false,
                    // hide the box shadow for the input
                    // add a attribute style 
                    'hide_box_shadow' => true,
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