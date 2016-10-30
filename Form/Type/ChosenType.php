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
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * ChosenType
 *
 * @category VinceT
 * @package  VinceTBootstrapFormBundle
 * @author   Vincent Touzet <vincent.touzet@gmail.com>
 * @license  MIT License view the LICENSE file that was distributed with this source code.
 * @link     https://github.com/vincenttouzet/BootstrapFormBundle
 */
class ChosenType extends AbstractType
{
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        // else add attributes
        if ( !isset($view->vars['attr']['class']) ) {
            $view->vars['attr']['class'] = '';
        }
        $view->vars['attr']['class'] .= ' chzn-select';

        if ( $options['placeholder'] ) {
            $view->vars['attr']['data-placeholder'] = $options['placeholder'];
        }
        if ( $options['no_results_text'] ) {
            $view->vars['attr']['data-no-result-text'] = $options['no_results_text'];
        }
        if ( $options['allow_single_deselect'] ) {
            $view->vars['attr']['data-allow-single-deselect'] = $options['allow_single_deselect'];
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'placeholder' => null,
            'no_results_text' => null,
            'allow_single_deselect' => null
        ]);
    }

    public function getParent()
    {
        return ChoiceType::class;
    }

    public function getName()
    {
        return 'bootstrap_chosen';
    }
}
