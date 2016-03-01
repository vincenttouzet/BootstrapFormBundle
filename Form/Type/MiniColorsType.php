<?php

/*
 * This file is part of the ReservationPinasse project.
 *
 * (c) Vincent Touzet <vincent.touzet@dotsafe.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace VinceT\BootstrapFormBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MiniColorsType extends AbstractType
{
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        if ( !isset($view->vars['attr']['class']) ) {
            $view->vars['attr']['class'] = '';
        }
        $view->vars['attr']['class'] .= ' minicolors';

        $view->vars['attr']['data-animation-speed'] = $options['animation_speed'];
        $view->vars['attr']['data-animation-easing'] = $options['animation_easing'];
        $view->vars['attr']['data-change'] = $options['change'];
        $view->vars['attr']['data-change-delay'] = $options['change_delay'];
        $view->vars['attr']['data-control'] = $options['control'];
        $view->vars['attr']['data-data-uris'] = $options['data_uris'];
        $view->vars['attr']['data-default-value'] = $options['default_value'];
        $view->vars['attr']['data-format'] = $options['format'];
        $view->vars['attr']['data-hide'] = $options['hide'];
        $view->vars['attr']['data-hide-speed'] = $options['hide_speed'];
        $view->vars['attr']['data-inline'] = $options['inline'];
        $view->vars['attr']['data-keywords'] = $options['keywords'];
        $view->vars['attr']['data-letter-case'] = $options['letter_case'];
        $view->vars['attr']['data-opacity'] = $options['opacity'];
        $view->vars['attr']['data-position'] = $options['position'];
        $view->vars['attr']['data-show'] = $options['show'];
        $view->vars['attr']['data-show-speed'] = $options['show_speed'];
        $view->vars['attr']['data-theme'] = $options['theme'];
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
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
        ));

        $resolver->setAllowedValues(array(
            'control' => array('hue', 'brightness', 'saturation', 'wheel'),
            'format' => array('hex', 'rgb'),
            'letter_case' => array('uppercase', 'lowercase'),
            'position' => array('bottom left', 'bottom right', 'top left', 'top right'),
        ));
    }

    public function getParent()
    {
        return 'text';
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'bootstrap_minicolors';
    }
}
