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
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use VinceT\BootstrapFormBundle\Form\DataTransformer\DateTimeToPartsTransformer;

/**
 * TimePickerType
 *
 * @category VinceT
 * @package  VinceTBootstrapFormBundle
 * @author   Vincent Touzet <vincent.touzet@gmail.com>
 * @license  MIT License view the LICENSE file that was distributed with this source code.
 * @link     https://github.com/vincenttouzet/BootstrapFormBundle
 */
class DateTimePickerType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $dateOptions = array_intersect_key($options, array_flip(array(
            'week_start',
            'calendar_weeks',
            'start_date',
            'end_date',
            'days_of_week_disabled',
            'autoclose',
            'start_view',
            'min_view_mode',
            'today_btn',
            'today_highlight',
            'clear_btn',
            'language',
        )));

        $timeOptions = array_intersect_key($options, array_flip(array(
            'minute_step',
            'second_step',
            'disable_focus',
            'with_seconds',
        )));
        $builder
            ->resetViewTransformers()
            ->remove('date')
            ->remove('time')
            ->addViewTransformer(new DateTimeToPartsTransformer())
            ->add('date', DatePickerType::class, $dateOptions)
            ->add('time', TimePickerType::class, $timeOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars = array_replace($view->vars, array(
            'week_start' => $options['week_start'],
            'view_mode' => $options['view_mode'],
            'min_view_mode' => $options['min_view_mode'],
            'minute_step' => $options['minute_step'],
            'second_step' => $options['second_step'],
            'disable_focus' => $options['disable_focus'],
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'format' => 'yyyy-MM-dd',
            'week_start' => 0, // day of the week start. 0 for Sunday - 6 for Saturday
            'view_mode' => 0,
            'min_view_mode' => 0,
            'minute_step' => 15,
            'second_step' => 15,
            'disable_focus' => false,


            'calendar_weeks' => false,
            'start_date' => null,
            'end_date' => null,
            'days_of_week_disabled' => '',
            'autoclose' => true,
            'start_view' => 0,
            'today_btn' => false,
            'today_highlight' => false,
            'clear_btn' => false,
            'language' => false,
        ));

        $resolver->setAllowedValues('week_start', [0, 1, 2, 3, 4, 5, 6]);
        $resolver->setAllowedValues('view_mode', [0, 'days', 1, 'months', 2, 'years']);
        $resolver->setAllowedValues('min_view_mode', [0, 'days', 1, 'months', 2, 'years']);
        $resolver->setAllowedValues('start_view', [0, 'month', 1, 'year', 2, 'decade']);
        $resolver->setAllowedValues('calendar_weeks', [true, false]);
        $resolver->setAllowedValues('autoclose', [true, false]);
        $resolver->setAllowedValues('today_btn', [true, false, 'linked']);
        $resolver->setAllowedValues('today_highlight', [true, false]);
        $resolver->setAllowedValues('clear_btn', [true, false]);
        
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return DateTimeType::class;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'bootstrap_datetimepicker';
    }
}
