<?php

use App\Enums\PlanEnum;

return [
    /*
    |--------------------------------------------------------------------------
    | Number of Grade
    |--------------------------------------------------------------------------
    |
    | This value is the current number of grade inside the wilg application
    |
    */
    'grade_number' => 4,

    /*
    |--------------------------------------------------------------------------
    | List of the grades
    |--------------------------------------------------------------------------
    |
    |
    |
    */
    'grades' => [
        'free' => [
            'title' => 'Grade 0',
            'description' => 'Free grade',
            'access_condition' => [
                'plan' => [
                    PlanEnum::START->value => true,
                    PlanEnum::SMART->value => true,
                    PlanEnum::PREMIUM->value => true,
                ],
                'token_balance' => [
                    'min' => 0,
                    'max' => 4999,
                ],
            ],
            'advantages' => [
                'cashback' => [
                    PlanEnum::START->value => 0.5,
                    PlanEnum::SMART->value => 2.5,
                    PlanEnum::PREMIUM->value => 4,
                ],
                'efficiency' => [
                    PlanEnum::START->value => 1,
                    PlanEnum::SMART->value => 1.5,
                    PlanEnum::PREMIUM->value => 2,
                ],
            ],
        ],
        'one' => [
            'title' => 'Grade 1',
            'description' => 'First grade',
            'access_condition' => [
                'plan' => [
                    PlanEnum::START->value => true,
                    PlanEnum::SMART->value => true,
                    PlanEnum::PREMIUM->value => true,
                ],
                'token_balance' => [
                    'min' => 5000,
                    'max' => 9999,
                ],
            ],
            'advantages' => [
                'cashback' => [
                    PlanEnum::START->value => 1,
                    PlanEnum::SMART->value => 3,
                    PlanEnum::PREMIUM->value => 4.5,
                ],
                'efficiency' => [
                    PlanEnum::START->value => 1.1,
                    PlanEnum::SMART->value => 1.65,
                    PlanEnum::PREMIUM->value => 2.2,
                ],
            ],
        ],
        'two' => [
            'title' => 'Grade 2',
            'description' => 'Second grade',
            'access_condition' => [
                'plan' => [
                    PlanEnum::START->value => false,
                    PlanEnum::SMART->value => true,
                    PlanEnum::PREMIUM->value => true,
                ],
                'token_balance' => [
                    'min' => 10000,
                    'max' => 19999,
                ],
            ],
            'advantages' => [
                'cashback' => [
                    PlanEnum::SMART->value => 4,
                    PlanEnum::PREMIUM->value => 5.5,
                ],
                'efficiency' => [
                    PlanEnum::SMART->value => 1.8,
                    PlanEnum::PREMIUM->value => 2.4,
                ],
            ],
        ],
        'three' => [
            'title' => 'Grade 3',
            'description' => 'Third grade',
            'access_condition' => [
                'plan' => [
                    PlanEnum::START->value => false,
                    PlanEnum::SMART->value => false,
                    PlanEnum::PREMIUM->value => true,
                ],
                'token_balance' => [
                    'min' => 20000,
                ],
            ],
            'advantages' => [
                'cashback' => [
                    PlanEnum::PREMIUM->value => 7,
                ],
                'efficiency' => [
                    PlanEnum::PREMIUM->value => 2.8,
                ],
            ],
        ],
    ],
];
