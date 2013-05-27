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
use Symfony\Component\Translation\TranslatorInterface;
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
    protected $translator;

    public function setTranslator(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if ( $options['use_daterange_entity'] ) {
            $builder->addModelTransformer(new DateRangeToStringTransformer($options['separator']));
        }
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $locale = array(
            'applyLabel' => $this->translator->trans($options['locale']['applyLabel'], array(), $options['drp_translation_domain']),
            'clearLabel' => $this->translator->trans($options['locale']['clearLabel'], array(), $options['drp_translation_domain']),
            'fromLabel' => $this->translator->trans($options['locale']['fromLabel'], array(), $options['drp_translation_domain']),
            'toLabel' => $this->translator->trans($options['locale']['toLabel'], array(), $options['drp_translation_domain']),
            'weekLabel' => $this->translator->trans($options['locale']['weekLabel'], array(), $options['drp_translation_domain']),
            'customRangeLabel' => $this->translator->trans($options['locale']['customRangeLabel'], array(), $options['drp_translation_domain']),
            'daysOfWeek' => array(
                $this->translator->trans($options['locale']['daysOfWeek'][0], array(), $options['drp_translation_domain']),
                $this->translator->trans($options['locale']['daysOfWeek'][1], array(), $options['drp_translation_domain']),
                $this->translator->trans($options['locale']['daysOfWeek'][2], array(), $options['drp_translation_domain']),
                $this->translator->trans($options['locale']['daysOfWeek'][3], array(), $options['drp_translation_domain']),
                $this->translator->trans($options['locale']['daysOfWeek'][4], array(), $options['drp_translation_domain']),
                $this->translator->trans($options['locale']['daysOfWeek'][5], array(), $options['drp_translation_domain']),
                $this->translator->trans($options['locale']['daysOfWeek'][6], array(), $options['drp_translation_domain']),
            ),
            'monthNames' => array(
                $this->translator->trans($options['locale']['monthNames'][0], array(), $options['drp_translation_domain']),
                $this->translator->trans($options['locale']['monthNames'][1], array(), $options['drp_translation_domain']),
                $this->translator->trans($options['locale']['monthNames'][2], array(), $options['drp_translation_domain']),
                $this->translator->trans($options['locale']['monthNames'][3], array(), $options['drp_translation_domain']),
                $this->translator->trans($options['locale']['monthNames'][4], array(), $options['drp_translation_domain']),
                $this->translator->trans($options['locale']['monthNames'][5], array(), $options['drp_translation_domain']),
                $this->translator->trans($options['locale']['monthNames'][6], array(), $options['drp_translation_domain']),
                $this->translator->trans($options['locale']['monthNames'][7], array(), $options['drp_translation_domain']),
                $this->translator->trans($options['locale']['monthNames'][8], array(), $options['drp_translation_domain']),
                $this->translator->trans($options['locale']['monthNames'][9], array(), $options['drp_translation_domain']),
                $this->translator->trans($options['locale']['monthNames'][10], array(), $options['drp_translation_domain']),
                $this->translator->trans($options['locale']['monthNames'][11], array(), $options['drp_translation_domain']),
            ),
            'firstDay' => intval($this->translator->trans($options['locale']['firstDay'], array(), $options['drp_translation_domain'])),
        );
        $ranges = array();
        if ( is_array($options['ranges']) ) {
            foreach ($options['ranges'] as $key => $value) {
                $key_tr = $this->translator->trans($key, array(), $options['drp_translation_domain']);
                $ranges[$key_tr] = $value;
            }
        }
        $view->vars = array_replace($view->vars, array(
            'opens' => $options['opens'],
            'separator' => $options['separator'],
            'show_week_numbers' => json_encode($options['show_week_numbers']),
            'show_dropdowns' => json_encode($options['show_dropdowns']),
            'min_date' => $options['min_date'],
            'max_date' => $options['max_date'],
            'date_limit' => json_encode($options['date_limit']),
            'ranges' => json_encode($ranges),
            'locale' => json_encode($locale),
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            // translation domain for the date range picker widget
            'drp_translation_domain' => 'VinceTBootstrapFormBundle',
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
                'clearLabel' => 'Clear',
                'fromLabel' => 'From',
                'toLabel' => 'To',
                'weekLabel' => 'W',
                'customRangeLabel' => 'Custom Range',
                'daysOfWeek' => array('Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'),
                'monthNames' => array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
                'firstDay' => "0",
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