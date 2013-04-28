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
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToLocalizedStringTransformer;
use Symfony\Component\Form\ReversedTransformer;
use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToStringTransformer;

/**
 * DatePickerType
 *
 * @category VinceT
 * @package  VinceTBootstrapFormBundle
 * @author   Vincent Touzet <vincent.touzet@gmail.com>
 * @license  MIT License view the LICENSE file that was distributed with this source code.
 * @link     https://github.com/vincenttouzet/BootstrapFormBundle
 */
class DatePickerType extends AbstractType
{

    private static $acceptedFormats = array(
        \IntlDateFormatter::FULL,
        \IntlDateFormatter::LONG,
        \IntlDateFormatter::MEDIUM,
        \IntlDateFormatter::SHORT,
    );
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $dateFormat = \IntlDateFormatter::MEDIUM;
        $timeFormat = \IntlDateFormatter::NONE;
        $calendar = \IntlDateFormatter::GREGORIAN;
        $pattern = $options['format'];

        if (!in_array($dateFormat, self::$acceptedFormats, true)) {
            throw new InvalidOptionsException('The "format" option must be one of the IntlDateFormatter constants (FULL, LONG, MEDIUM, SHORT) or a string representing a custom format.');
        }

        $builder->addViewTransformer(new DateTimeToLocalizedStringTransformer(
            null,
            null,
            $dateFormat,
            $timeFormat,
            $calendar,
            $pattern
        ));

        if ( $options['input'] == 'single_text' ) {
            $builder->addModelTransformer(new ReversedTransformer(
                new DateTimeToStringTransformer(null, null, 'Y-m-d')
            ));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars = array_replace($view->vars, array(
            'format' => $options['format'],
            'week_start' => $options['week_start'],
            'view_mode' => $options['view_mode'],
            'min_view_mode' => $options['min_view_mode'],
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'input' => 'datetime',
            'format' => 'yyyy-MM-dd',
            'week_start' => 0, // day of the week start. 0 for Sunday - 6 for Saturday
            'view_mode' => 0,
            'min_view_mode' => 0,
            'attr' => array(
                'class' => 'input-small'
            ),
        ));

        $resolver->setAllowedValues(array(
            'week_start' => array(0, 1, 2, 3, 4, 5, 6),
            'view_mode'    => array(0, 'days', 1, 'months', 2, 'years'),
            'min_view_mode'    => array(0, 'days', 1, 'months', 2, 'years'),
        ));
    }

    public function getParent()
    {
        return 'text';
    }

    public function getName()
    {
        return 'bootstrap_datepicker';
    }
}