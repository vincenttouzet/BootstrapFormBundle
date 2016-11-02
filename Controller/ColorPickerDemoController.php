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

use VinceT\BootstrapFormBundle\Form\Type\ColorPickerType;

class ColorPickerDemoController extends DemoController
{
    public function getFormType()
    {
        return ColorPickerType::class;
    }

    public function getOptionsSet()
    {
        return [
            [
                'label' => 'default',
            ],
            [
                'label' => 'Format: hex',
                'format' => 'hex',
            ],
            [
                'label' => 'Format: rgb',
                'format' => 'rgb',
            ],
            [
                'label' => 'Format: rgba',
                'format' => 'rgba',
            ],
            [
                'label' => 'use_component : false',
                'use_component' => false,
            ],
            [
                'label' => 'horizontal : true',
                'horizontal' => true,
            ],
            [
                'label' => 'align : right',
                'align' => 'right',
            ],
            [
                'label' => 'use_component : false, horizontal : true',
                'use_component' => false,
                'horizontal' => true,
            ],
            [
                'label' => 'use_component : false, align : right',
                'use_component' => false,
                'align' => 'right',
            ]
        ];
    }
}
