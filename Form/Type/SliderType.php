<?php
/**
 * This file is part of VinceTBootstrapFormBundle for Symfony2
 *
 * @category VinceT
 * @package  VinceTBootstrapFormBundle
 * @author   Vincent Touzet <vincent.touzet@gmail.com>
 * @license  MIT License view the LICENSE file that was distributed with this source code.
 * @link     https://github.com/vincenttouzet/BootstrapFormBundle
 */

namespace VinceT\BootstrapFormBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;

/**
 * SliderType
 *
 * @category VinceT
 * @package  VinceTBootstrapFormBundle
 * @author   Vincent Touzet <vincent.touzet@gmail.com>
 * @license  MIT License view the LICENSE file that was distributed with this source code.
 * @link     https://github.com/vincenttouzet/BootstrapFormBundle
 */
class SliderType extends AbstractType
{

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        if ( !isset($view->vars['attr']['class']) ) {
            $view->vars['attr']['class'] = '';
        }
        $view->vars['attr']['class'] .= ' bootstrap-slider';
        $value = $view->vars['value'];
        if ( $value ) {
            if ( strpos($value, ',') !== false ) {
                $value = sprintf('[%s]', $value);
            }
            $view->vars['attr']['data-slider-value'] = $value;
        }
        $view->vars['attr']['data-slider-min'] = $options['min'];
        $view->vars['attr']['data-slider-max'] = $options['max'];
        $view->vars['attr']['data-slider-step'] = $options['step'];
        $view->vars['attr']['data-slider-orientation'] = $options['orientation'];
        $view->vars['attr']['data-slider-selection'] = $options['selection'];
        $view->vars['attr']['data-slider-tooltip'] = $options['tooltip'];
        $view->vars['attr']['data-slider-handle'] = $options['handle'];
        if ( $options['range'] && !$value ) {
            $view->vars['attr']['data-slider-value'] = sprintf(
                '[%s,%s]',
                $options['min'], 
                $options['max']
            );
        }
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'min' => 0,
            'max' => 10,
            'step' => 1,
            'orientation' => 'horizontal',
            'selection' => 'before',
            'tooltip' => 'show',
            'handle' => 'round',
            'range' => false,
        ));

        $resolver->setAllowedValues(array(
            'orientation' => array('horizontal', 'vertical'),
            'selection' => array('before', 'after', 'none'),
            'tooltip' => array('show', 'hide'),
            'handle' => array('round', 'square', 'triangle'),
            'range' => array(true, false),
        ));
    }

    public function getParent()
    {
        return 'text';
    }

    public function getName()
    {
        return 'bootstrap_slider';
    }
}