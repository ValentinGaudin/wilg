<?php

namespace App\Services;

use App\Models\User;
use App\ValueObjects\GradeValueObject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

final readonly class AuthHelperService
{
    /**
     * @param array<string, array{
     *      title: string,
     *      description: string,
     *      access_condition: array{
     *          plan: array<string>,
     *          token_balance: array<string>,
     *      },
     *      advantages: array{
     *          cashback: array<string>,
     *          efficiency: array<string>,
     *      },
     *  }> $configuration
     */
    public function __construct(private array $configuration)
    {
    }

    public function grade(): string|GradeValueObject
    {
        return match (true) {
            $this->isFreeGrade() => GradeValueObject::make(...$this->configuration['free']),
            $this->isFirstGrade() => GradeValueObject::make(...$this->configuration['first']),
            $this->isSecondGrade() => GradeValueObject::make(...$this->configuration['second']),
            $this->isThirdGrade() => GradeValueObject::make(...$this->configuration['third']),
            default => 'No grade currently available',
        };
    }

    /**
     * @param array{
     *       title: string,
     *       description: string,
     *       access_condition: array{
     *           plan: array<string>,
     *           token_balance: array<string>,
     *       },
     *       advantages: array{
     *           cashback: array<string>,
     *           efficiency: array<string>,
     *       },
     *   } $grade
     */
    private function checkAccessCondition(array $grade): bool
    {
        $grade = GradeValueObject::make(...$grade);

        $accessPlanCondition = $grade->getPlan();
        $minTokenAccess = $grade->getMinToken();
        $maxTokenAccess = $grade->getMaxToken();

        $validator = Validator::make([
            'user_plan' => $this->user()->plan?->slug,
            'user_token' => $this->user()->token_balance,
        ], [
            'user_plan' => [
                'required',
                'plan_in_array:'.implode(',', $accessPlanCondition),
            ],
            'user_token' => [
                'required',
                'numeric',
                $maxTokenAccess
                    ? 'token_between_values:'.$minTokenAccess.','.$maxTokenAccess
                    : 'min:'.$minTokenAccess,
            ],
        ], [
            'token_between_values' => "The :attribute must be superior to $minTokenAccess and exactly less $maxTokenAccess.",
        ]);

        return ! $validator->fails();
    }

    public function user(): User
    {
        $user = Auth::guard('sanctum')->user();

        abort_if(boolean: ! $user, code: 401);

        abort_if(boolean: ! $user instanceof User, code: 401);

        return $user;
    }

    private function isFreeGrade(): bool
    {
        return $this->checkAccessCondition($this->configuration['free']);
    }

    private function isFirstGrade(): bool
    {
        return $this->checkAccessCondition($this->configuration['first']);
    }

    private function isSecondGrade(): bool
    {
        return $this->checkAccessCondition($this->configuration['second']);
    }

    private function isThirdGrade(): bool
    {
        return $this->checkAccessCondition($this->configuration['third']);
    }
}
