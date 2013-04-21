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
use VinceT\BootstrapFormBundle\Form\DataTransformer\DateRangeToStringTransformer;

/**
 * DateRangePickerType
 *
 * @category VinceT
 * @package  VinceTBootstrapFormBundle
 * @author   Vincent Touzet <vincent.touzet@gmail.com>
 * @license  MIT License view the LICENSE file that was distributed with this source code.
 * @link     https://github.com/vincenttouzet/BootstrapFormBundle
 */
class DateRangePickerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if ( $options['use_daterange_entity'] ) {
            $builder->addModelTransformer(new DateRangeToStringTransformer($options['separator']));
        }
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars = array_replace($view->vars, array(
            'opens' => $options['opens'],
            'separator' => $options['separator'],
            'show_week_numbers' => json_encode($options['show_week_numbers']),
            'show_dropdowns' => json_encode($options['show_dropdowns']),
            'min_date' => $options['min_date'],
            'max_date' => $options['max_date'],
            'date_limit' => json_encode($options['date_limit']),
            'ranges' => json_encode($options['ranges']),
            'locale' => json_encode($options['locale']),
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            /* if a DateRange object is used it must be set to true, otherwise a string is used */
            'use_daterange_entity' => false,
            /* opens on the left or on the right */
            'opens' => 'right',
            /* separator used between the two dates */
            'separator' => ' - ',
            /* show the week numbers */
            'show_week_numbers' => true,
            /* show dropdowns for the months and year */
            'show_dropdowns' => false,
            /* min date */
            'min_date' => null,
            /* max date */
            'max_date' => null,
            /* date limit: false or array('days'=>5) */
            'date_limit' => false,
            /* ranges null or array */
            'ranges' => null,
            /* locale values */
            'locale' => array(
                'applyLabel' => 'Submit',
                'fromLabel' => 'From',
                'toLabel' => 'To',
                'customRangeLabel' => 'Custom Range',
                'daysOfWeek' => array('Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'),
                'monthNames' => array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
                'firstDay' => 0,
            ),
        ));

        $resolver->setAllowedValues(array(
            'opens' => array('left', 'right'),
            'show_week_numbers' => array(true, false),
            'show_dropdowns' => array(true, false),
        ));
    }

    public function getParent()
    {
        return 'text';
    }

    public function getName()
    {
        return 'bootstrap_daterangepicker';
    }
}