TypeAhead
=========

The TypeAheadType use bootstrap [**typeahead**][1].

```php
class DemoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'demoString',
                'bootstrap_typeahead',
                array(
                    'source' => array(
                        'Alabama',
                        'Alaska',
                        'Arizona',
                        'Arkansas',
                        'California',
                        'Colorado',
                        'Connecticut',
                        'Delaware',
                        'Florida',
                        'Georgia',
                        'Hawaii',
                        'Idaho',
                        'Illinois',
                        'Indiana',
                        'Iowa',
                        'Kansas',
                        'Kentucky',
                        'Louisiana',
                        'Maine',
                        'Maryland',
                        'Massachusetts',
                        'Michigan',
                        'Minnesota',
                        'Mississippi',
                        'Missouri',
                        'Montana',
                        'Nebraska',
                        'Nevada',
                        'New Hampshire',
                        'New Jersey',
                        'New Mexico',
                        'New York',
                        'North Dakota',
                        'North Carolina',
                        'Ohio',
                        'Oklahoma',
                        'Oregon',
                        'Pennsylvania',
                        'Rhode Island',
                        'South Carolina',
                        'South Dakota',
                        'Tennessee',
                        'Texas',
                        'Utah',
                        'Vermont',
                        'Virginia',
                        'Washington',
                        'West Virginia',
                        'Wisconsin',
                        'Wyoming'
                    ),
                    'items' => 8,
                    'min_length' => 1,
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
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script src="{{asset('bundles/vincetbootstrapform/bootstrap/js/bootstrap.min.js')}}"></script>
{% endblock %}
```

Use ajax to get suggestions
---------------------------

The source option of typeahead allows to use a custom function to get results (see: http://getbootstrap.com/2.3.2/javascript.html#typeahead)

First, define your route ...
```yml
vincet_demo_typeahead_result:
    pattern: /demo/results
    defaults: { _controller: VinceTDemoBundle:Default:result }
```
... create the action

```php
<?php

namespace VinceT\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{

    public function resultAction()
    {
        $datas = array();
        $query = $this->getRequest()->get('query');
        // populate datas
        // ...
        return new JsonResponse($datas);
    }
}

```

Then use the route name as source option.

```php
class DemoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'demoString',
                'bootstrap_typeahead',
                array(
                    'source' => 'vincet_demo_typeahead_result',
                    'items' => 8,
                    'min_length' => 1,
                )
            )
        ;
    }
}
```

[1]: http://twitter.github.io/bootstrap/javascript.html#typeahead
