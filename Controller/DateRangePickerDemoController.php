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

use VinceT\BootstrapFormBundle\Form\Type\DateRangePickerType;

class DateRangePickerDemoController extends DemoController
{
    public function getFormType()
    {
        return DateRangePickerType::class;
    }

    public function getOptionsSet()
    {
        return [
            [
                'label' => 'Default',
            ],
            [
                'label' => 'Opens on left',
                'opens' => 'left',
            ],
            [
                'label' => 'Use DateRange object',
                'use_daterange_entity' => true,
            ],
        ];
    }
}
