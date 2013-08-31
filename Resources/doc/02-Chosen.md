Chosen
======

The ChosenType use the [**chosen**][1]. It extends the choice type so you can referer to it's [**documentation**][2]

```php
class DemoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'demoString',
                'bootstrap_chosen',
                array(
                    // text used when no options selected
                    'placeholder' => 'Choose a country',
                    // text used when no results match the request
                    'no_results_text' => 'No result matched',
                    // to allow multiple selection
                    'multiple' => true,
                    // choices used
                    // its also possible to use choice_list
                    'choices' => array(
                        '' => '',
                        'France' => 'France',
                        'United States' => 'United States', 
                        'United Kingdom' => 'United Kingdom', 
                    ),
                    // Allow possibility to deselect the choice
                    // when the first option has empty text
                    // and this options is set to true
                    'allow_single_deselect' => null
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
    <link rel="stylesheet" type="text/css" href="{{asset('bundles/vincetbootstrapform/bootstrap-chosen/public/chosen.css')}}">
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script src="{{asset('bundles/vincetbootstrapform/bootstrap-chosen/public/chosen.jquery.min.js')}}"></script>
    <script src="{{asset('bundles/vincetbootstrapform/js/bootstrap-forms.js')}}"></script>
{% endblock %}
```

If you upgrade from a previous version, pay attention to the change of route scripts from
bundles/vincetbootstrapform/bootstrap-chosen/ **chosen** / to bundles/vincetbootstrapform/bootstrap-chosen/ **public** /

[1]: http://harvesthq.github.io/chosen/
[2]: http://symfony.com/doc/current/reference/forms/types/choice.html
