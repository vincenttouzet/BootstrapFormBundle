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
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;

/**
 * ColorPickerType
 *
 * @category VinceT
 * @package  VinceTBootstrapFormBundle
 * @author   Vincent Touzet <vincent.touzet@gmail.com>
 * @license  MIT License view the LICENSE file that was distributed with this source code.
 * @link     https://github.com/vincenttouzet/BootstrapFormBundle
 */
class ColorPickerType extends AbstractType
{

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars = array_replace($view->vars, array(
            'format' => $options['format'],
            'horizontal' => $options['horizontal'],
            'align' => $options['align'],
            'use_component' => $options['use_component'],
        ));
        // if use of widget component
        if ( $options['use_component'] ) {
            // make input readonly
            $view->vars['attr']['readonly'] = true;
        } else {
            // else add attributes
            if ( !isset($view->vars['attr']['class']) ) {
                $view->vars['attr']['class'] = '';
            }
            $view->vars['attr']['class'] .= ' bootstrap-colorpicker';
            $view->vars['attr']['data-format'] = $options['format'];
            $view->vars['attr']['data-horizontal'] = $options['horizontal'];
            $view->vars['attr']['data-align'] = $options['align'];
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'format' => 'hex',
            'horizontal' => false,
            'align' => 'left',
            'use_component' => true,
        ]);

        $resolver->setAllowedValues('format', ['hex', 'rgb', 'rgba']);
        $resolver->setAllowedValues('horizontal', [true, false]);
        $resolver->setAllowedValues('align', ['right', 'left']);
        $resolver->setAllowedValues('use_component', [true, false]);
    }

    public function getParent()
    {
        return TextType::class;
    }

    public function getName()
    {
        return 'bootstrap_colorpicker';
    }
}