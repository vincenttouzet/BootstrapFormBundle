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
 * MoneyType
 *
 * @category VinceT
 * @package  VinceTBootstrapFormBundle
 * @author   Vincent Touzet <vincent.touzet@gmail.com>
 * @license  MIT License view the LICENSE file that was distributed with this source code.
 * @link     https://github.com/vincenttouzet/BootstrapFormBundle
 */
class MoneyType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $currency = $options['currency'];
        $view->vars['input_prepend'] = null;
        $view->vars['input_append'] = null;

        $locale = \Locale::getDefault();

        $format = new \NumberFormatter($locale, \NumberFormatter::CURRENCY);
        $pattern = $format->formatCurrency('123', $currency);

        // the spacings between currency symbol and number are ignored, because
        // a single space leads to better readability in combination with input
        // fields

        // the regex also considers non-break spaces (0xC2 or 0xA0 in UTF-8)

        preg_match('/^([^\s\xc2\xa0]*)[\s\xc2\xa0]*123(?:[,.]0+)?[\s\xc2\xa0]*([^\s\xc2\xa0]*)$/u', $pattern, $matches);

        if (!empty($matches[1])) {
            $view->vars['input_prepend'] = $matches[1];
        } elseif (!empty($matches[2])) {
            $view->vars['input_append'] = $matches[2];
        }
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'attr' => array(
                'class' => 'input-small',
            ),
        ));
    }

    public function getParent()
    {
        return 'money';
    }

    public function getName()
    {
        return 'bootstrap_money';
    }
        /**
     * Returns the pattern for this locale
     *
     * The pattern contains the placeholder "{{ widget }}" where the HTML tag should
     * be inserted
     */
    private static function getPattern($currency)
    {
        if (!$currency) {
            return '{{ widget }}';
        }

        $locale = \Locale::getDefault();

        if (!isset(self::$patterns[$locale])) {
            self::$patterns[$locale] = array();
        }

        if (!isset(self::$patterns[$locale][$currency])) {
            $format = new \NumberFormatter($locale, \NumberFormatter::CURRENCY);
            $pattern = $format->formatCurrency('123', $currency);

            // the spacings between currency symbol and number are ignored, because
            // a single space leads to better readability in combination with input
            // fields

            // the regex also considers non-break spaces (0xC2 or 0xA0 in UTF-8)

            preg_match('/^([^\s\xc2\xa0]*)[\s\xc2\xa0]*123(?:[,.]0+)?[\s\xc2\xa0]*([^\s\xc2\xa0]*)$/u', $pattern, $matches);

            if (!empty($matches[1])) {
                self::$patterns[$locale][$currency] = $matches[1].' {{ widget }}';
            } elseif (!empty($matches[2])) {
                self::$patterns[$locale][$currency] = '{{ widget }} '.$matches[2];
            } else {
                self::$patterns[$locale][$currency] = '{{ widget }}';
            }
        }

        return self::$patterns[$locale][$currency];
    }
}