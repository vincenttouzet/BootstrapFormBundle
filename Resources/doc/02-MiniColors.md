MiniColor
=========

The MiniColorType use the [**jquery-minicolors**][1]

```php
class DemoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'demoString',
                MiniColorsType::class,
                array(
                    'animation_speed' => 50,
                    'animation_easing' => 'swing',
                    'change' => null,
                    'change_delay' => 0,
                    'control' => 'hue',
                    'data_uris' => true,
                    'default_value' => '',
                    'format' => 'hex',
                    'hide' => null,
                    'hide_speed' => 100,
                    'inline' => false,
                    'keywords' => '',
                    'letter_case' => 'lowercase',
                    'opacity' => false,
                    'position' => 'bottom left',
                    'show' => null,
                    'show_speed' => 100,
                    'theme' => 'bootstrap',
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
    <link rel="stylesheet" type="text/css" href="{{ asset('bundles/vincetbootstrapform/vendor/jquery-minicolors/jquery.minicolors.css') }}">
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script src="{{ asset('bundles/vincetbootstrapform/vendor/jquery-minicolors/jquery.minicolors.min.js') }}"></script>
    <script src="{{ asset('bundles/vincetbootstrapform/js/bootstrap-forms.js') }}"></script>
{% endblock %}
```

You can also retrieve the update version with the bower's package @minicolors@.

[1]: http://labs.abeautifulsite.net/jquery-minicolors/