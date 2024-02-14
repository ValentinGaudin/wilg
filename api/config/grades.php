<?php

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
    'list' => [
        'free' => [
            'title' => env('FREE_GRADE_TITLE', 'Free'),
            'description' => env('FREE_GRADE_DESCRIPTION', 'Free Grade'),
            'access_condition' => [
                'plan' => array_map('trim', array_filter(explode(',', env('ACCESS_PLAN_FREE_GRADE')))),
                'token_balance' => array_map('trim', array_filter(explode(',', env('TOKEN_BALANCE_FREE_GRADE')))),
            ],
            'advantages' => [
                'cashback' => array_map(fn ($value) => floatval(trim($value)), array_filter(explode(',', env('CASHBACK_FREE_GRADE')))),
                'efficiency' => array_map(fn ($value) => floatval(trim($value)), array_filter(explode(',', env('EFFICIENCY_FREE_GRADE')))),
            ],
        ],
        'first' => [
            'title' => env('FIRST_GRADE_TITLE', 'Grade 1'),
            'description' => env('FIRST_GRADE_DESCRIPTION', 'First Grade'),
            'access_condition' => [
                'plan' => array_map('trim', array_filter(explode(',', env('ACCESS_PLAN_FIRST_GRADE')))),
                'token_balance' => array_map('trim', array_filter(explode(',', env('TOKEN_BALANCE_FIRST_GRADE')))),
            ],
            'advantages' => [
                'cashback' => array_map(fn ($value) => floatval(trim($value)), array_filter(explode(',', env('CASHBACK_FIRST_GRADE')))),
                'efficiency' => array_map(fn ($value) => floatval(trim($value)), array_filter(explode(',', env('EFFICIENCY_FIRST_GRADE')))),
            ],
        ],
        'second' => [
            'title' => env('SECOND_GRADE_TITLE', 'Grade 2'),
            'description' => env('SECOND_GRADE_DESCRIPTION', 'Second Grade'),
            'access_condition' => [
                'plan' => array_map('trim', array_filter(explode(',', env('ACCESS_PLAN_SECOND_GRADE')))),
                'token_balance' => array_map('trim', array_filter(explode(',', env('TOKEN_BALANCE_SECOND_GRADE')))),
            ],
            'advantages' => [
                'cashback' => array_map(fn ($value) => floatval(trim($value)), array_filter(explode(',', env('CASHBACK_SECOND_GRADE')))),
                'efficiency' => array_map(fn ($value) => floatval(trim($value)), array_filter(explode(',', env('EFFICIENCY_SECOND_GRADE')))),
            ],
        ],
        'third' => [
            'title' => env('THIRD_GRADE_TITLE', 'Grade 3'),
            'description' => env('THIRD_GRADE_DESCRIPTION', 'Third Grade'),
            'access_condition' => [
                'plan' => array_map('trim', array_filter(explode(',', env('ACCESS_PLAN_THIRD_GRADE')))),
                'token_balance' => array_map('trim', array_filter(explode(',', env('TOKEN_BALANCE_THIRD_GRADE')))),
            ],
            'advantages' => [
                'cashback' => array_map(fn ($value) => floatval(trim($value)), array_filter(explode(',', env('CASHBACK_THIRD_GRADE')))),
                'efficiency' => array_map(fn ($value) => floatval(trim($value)), array_filter(explode(',', env('EFFICIENCY_THIRD_GRADE')))),
            ],
        ],
    ],
];
