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
    private $locale;

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
            'format' => $options['format']
        ));
        $view->vars['attr']['data-week-start'] = $options['week_start'];
        $view->vars['attr']['data-calendar-weeks'] = json_encode($options['calendar_weeks']);
        $view->vars['attr']['data-start-date'] = $options['start_date'];
        $view->vars['attr']['data-end-date'] = $options['end_date'];
        $view->vars['attr']['data-days-of-week-disabled'] = $options['days_of_week_disabled'];
        $view->vars['attr']['data-autoclose'] = json_encode($options['autoclose']);
        $view->vars['attr']['data-start-view'] = $options['start_view'];
        $view->vars['attr']['data-min-view-mode'] = $options['min_view_mode'];
        $today_btn = $options['today_btn'];
        if (is_bool($today_btn)) {
            $today_btn = json_encode($today_btn);
        }
        $view->vars['attr']['data-today-btn'] = $today_btn;
        $view->vars['attr']['data-today-highlight'] = json_encode($options['today_highlight']);
        $view->vars['attr']['data-clear-btn'] = json_encode($options['clear_btn']);
        $language = $options['language'];
        if ($language === false) {
            $language = $this->getLocale();
        }
        $view->vars['attr']['data-language'] = $language;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'input' => 'datetime',
            'format' => 'yyyy-MM-dd',
            'week_start' => 0, // day of the week start. 0 for Sunday - 6 for Saturday
            'calendar_weeks' => false,
            'start_date' => null,
            'end_date' => null,
            'days_of_week_disabled' => '',
            'autoclose' => true,
            'start_view' => 0,
            'min_view_mode' => 0,
            'today_btn' => false,
            'today_highlight' => false,
            'clear_btn' => false,
            'language' => false,
            'attr' => array(
                'class' => 'input-small'
            ),
        ));

        $resolver->setAllowedValues(array(
            'week_start' => array(0, 1, 2, 3, 4, 5, 6),
            'start_view' => array(0, 'month', 1, 'year', 2, 'decade'),
            'min_view_mode' => array(0, 'days', 1, 'months', 2, 'years'),
            'calendar_weeks' => array(true, false),
            'autoclose' => array(true, false),
            'today_btn' => array(true, false, 'linked'),
            'today_highlight' => array(true, false),
            'clear_btn' => array(true, false),
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

    /**
     * Gets Locale
     * 
     * @return [type]
     */
    public function getLocale()
    {
        return $this->locale;
    }
    
    /**
     * Sets Locale
     * 
     * @param [type] $locale Locale
     * 
     * @return [type]
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
        return $this;
    }
    
}