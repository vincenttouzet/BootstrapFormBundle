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


use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;

/**
 * TypeAheadType
 *
 * @category VinceT
 * @package  VinceTBootstrapFormBundle
 * @author   Vincent Touzet <vincent.touzet@gmail.com>
 * @license  MIT License view the LICENSE file that was distributed with this source code.
 * @link     https://github.com/vincenttouzet/BootstrapFormBundle
 */
class TypeAheadType extends AbstractType implements ContainerAwareInterface
{
    protected $container = null;

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $source = $options['source'];
        if ( is_array($source) ) {
            $source = json_encode($source);
        }elseif (is_string($source)) {
            $source = $this->container->get('router')->generate($source);
        }
        //$view->vars['attr']['data-provide'] = 'typeahead';
        if ( !isset($view->vars['attr']['class']) ) {
            $view->vars['attr']['class'] = '';
        }
        
        $view->vars['attr']['class'] .= ' bootstrap-typeahead';
        
        $view->vars['attr']['data-source'] = $source;
        $view->vars['attr']['data-items'] = $options['items'];
        $view->vars['attr']['data-min-length'] = $options['min_length'];
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'source' => array(),
            'items' => 8,
            'min_length' => 1,
        ));
    }

    public function getParent()
    {
        return 'text';
    }

    public function getName()
    {
        return 'bootstrap_typeahead';
    }

    /**
     * Sets the Container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     *
     * @api
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

}