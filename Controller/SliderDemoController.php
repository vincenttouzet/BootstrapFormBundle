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

use VinceT\BootstrapFormBundle\Form\Type\SliderType;

class SliderDemoController extends DemoController
{

    /**
     * Get the Form type
     * @return string
     */
    public function getFormType()
    {
        return SliderType::class;
    }

    /**
     * Get the options set for the different examples
     *
     * @return array
     */
    public function getOptionsSet()
    {
        return [
            [
                'label' => 'default',
            ],
            [
                'label' => 'min / max',
                'min' => '-50',
                'max' => '50',
            ],
            [
                'label' => 'step',
                'step' => '2',
            ],
            [
                'label' => 'vertical',
                'orientation' => 'vertical',
            ],
            [
                'label' => 'Range value',
                'range' => true,
            ],
            [
                'label' => 'handle square',
                'handle' => 'square',
            ],
            [
                'label' => 'handle square',
                'handle' => 'triangle',
            ],
        ];
    }
}
