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

use VinceT\BootstrapFormBundle\Form\Type\MiniColorsType;

class MinicolorsDemoController extends DemoController
{
    public function getFormType()
    {
        return MiniColorsType::class;
    }

    public function getOptionsSet()
    {
        return [
            [
                'label' => 'Default',
            ],
        ];
    }
}
