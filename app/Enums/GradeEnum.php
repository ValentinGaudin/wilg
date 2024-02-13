<?php

namespace App\Enums;

enum GradeEnum: string
{
    case TITLE = 'title';

    case DESCRIPTION = 'smart';

    case ACCESS_CONDITION = 'access_condition';

    case ACCESS_CONDITION_PLAN = 'plan';

    case ACCESS_CONDITION_TOKEN = 'token_balance';

    case ADVANTAGES = 'advantages';

    case ADVANTAGES_CASHBACK = 'cashback';

    case ADVANTAGES_EFFICIENCY = 'efficiency';
}
