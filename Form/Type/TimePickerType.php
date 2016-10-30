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
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;

/**
 * TimePickerType
 *
 * @category VinceT
 * @package  VinceTBootstrapFormBundle
 * @author   Vincent Touzet <vincent.touzet@gmail.com>
 * @license  MIT License view the LICENSE file that was distributed with this source code.
 * @link     https://github.com/vincenttouzet/BootstrapFormBundle
 */
class TimePickerType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars = array_replace($view->vars, array(
            'minute_step' => $options['minute_step'],
            'second_step' => $options['second_step'],
            'disable_focus' => $options['disable_focus'],
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'widget' => 'single_text',
            'minute_step' => 15,
            'second_step' => 15,
            'disable_focus' => false,
        ));
    }

    public function getParent()
    {
        return TimeType::class;
    }

    public function getName()
    {
        return 'bootstrap_timepicker';
    }
}
