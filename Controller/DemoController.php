<?php

/*
 * This file is part of the 2.8 project.
 *
 * (c) Vincent Touzet <vincent.touzet@dotsafe.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace VinceT\BootstrapFormBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class DemoController extends Controller
{
    /**
     * Get the Form type
     * @return string
     */
    abstract public function getFormType();

    /**
     * Get the options set for the different examples
     *
     * @return array
     */
    abstract public function getOptionsSet();

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function demoAction()
    {
        return $this->renderDemo($this->getFormType(), $this->getOptionsSet());
    }

    protected function renderDemo($type, $optionsSet)
    {
        $data = [];

        // create demo form
        $form = $this->createDemoForm($type, $optionsSet);

        // handle form submission
        $request = $this->get('request_stack')->getCurrentRequest();
        $form->handleRequest($request);

        if ($form->isValid()) {
            $data = $form->getData();
        }

        $options = $this->getTypeOptions($type);
        list($typeShort, $namespace) = $this->getTypeInfo($type);

        $parentType = $this->getTypeParent($type);
        list($parentTypeShort, $parentNamespace) = $this->getTypeInfo($parentType);


        return $this->render('VinceTBootstrapFormBundle:Demo:index.html.twig', [
            // demo field
            'type_short' => $typeShort,
            'namespace' => $namespace,
            'name' => $this->getTypeName($type),
            // parent
            'parent_type_short' => $parentTypeShort,
            'parent_namespace' => $parentNamespace,
            'parent_name' => $this->getTypeName($parentType),
            'form' => $form->createView(),
            'data' => $data,
            'options' => $options,
            'options_set' => $optionsSet,
        ]);
    }

    protected function createDemoForm($type, $options_set)
    {
        $form = $this->createFormBuilder();
        $i = 0;
        foreach ($options_set as $options) {
            if (!isset($options['required'])) {
                $options['required'] = false;
            }
            $form->add('demo'.$i, $type, $options);
            $i++;
        }
        return $form->getForm();
    }

    protected function getTypeOptions($type)
    {
        $resolver = new OptionsResolver();
        /** @var AbstractType $formType */
        $formType = new $type();
        $formType->configureOptions($resolver);

        return $resolver->getDefinedOptions();
    }

    protected function getTypeInfo($type)
    {
        $classParts = explode('\\', $type);
        $typeName = array_pop($classParts);
        $typeNamespace = implode('\\', $classParts);

        return array($typeName, $typeNamespace);
    }

    protected function getTypeParent($type)
    {
        /** @var AbstractType $formType */
        $formType = new $type();

        return $formType->getParent();
    }

    protected function getTypeName($type)
    {
        /** @var AbstractType $formType */
        $formType = new $type();

        return $formType->getName();
    }
}
