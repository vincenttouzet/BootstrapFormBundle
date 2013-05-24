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
 * KnobType
 *
 * @category VinceT
 * @package  VinceTBootstrapFormBundle
 * @author   Vincent Touzet <vincent.touzet@gmail.com>
 * @license  MIT License view the LICENSE file that was distributed with this source code.
 * @link     https://github.com/vincenttouzet/BootstrapFormBundle
 */
class KnobType extends AbstractType
{

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        // style
        if ( !isset($view->vars['attr']['style']) ) {
            $view->vars['attr']['style'] = '';
        }
        if ( $options['hide_box_shadow'] ) {
            $view->vars['attr']['style'] .= ';box-shadow:none;';
        }
        // class
        if ( !isset($view->vars['attr']['class']) ) {
            $view->vars['attr']['class'] = '';
        }
        $view->vars['attr']['class'] .= ' knob';
        $view->vars['attr']['data-width'] = $options['width'];
        $view->vars['attr']['data-height'] = $options['height'];
        $view->vars['attr']['data-displayInput'] = $options['displayInput'];
        $view->vars['attr']['data-displayPrevious'] = $options['displayPrevious'];
        $view->vars['attr']['data-cursor'] = $options['cursor'];
        $view->vars['attr']['data-readonly'] = $options['readonly'];

        if ( $options['thickness'] ) {
            $view->vars['attr']['data-thickness'] = $options['thickness'];
        }
        if ( $options['fgColor'] ) {
            $view->vars['attr']['data-fgColor'] = $options['fgColor'];
        }
        if ( $options['angleOffset'] ) {
            $view->vars['attr']['data-angleOffset'] = $options['angleOffset'];
        }
        if ( $options['linecap'] ) {
            $view->vars['attr']['data-linecap'] = $options['linecap'];
        }
        if ( $options['angleArc'] ) {
            $view->vars['attr']['data-angleArc'] = $options['angleArc'];
        }
        if ( $options['step'] ) {
            $view->vars['attr']['data-step'] = $options['step'];
        }
        if ( $options['min'] ) {
            $view->vars['attr']['data-min'] = $options['min'];
        }
        if ( $options['max'] ) {
            $view->vars['attr']['data-max'] = $options['max'];
        }
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'width' => 200,
            'height' => 200,
            'displayInput' => true,
            'cursor' => 0,
            'thickness' => 0.35,
            'fgColor' => '#87CEEB',
            'displayPrevious' => false,
            'linecap' => 'butt',
            'angleOffset' => null,
            'angleArc' => null,
            'step' => 1,
            'min' => 0,
            'max' => 100,
            'readonly' => false,
            'hide_box_shadow' => true,
        ));

        $resolver->setAllowedValues(array(
            'displayInput' => array(true, false),
            'displayPrevious' => array(true, false),
        ));
    }

    public function getParent()
    {
        return 'number';
    }

    public function getName()
    {
        return 'knob';
    }
}