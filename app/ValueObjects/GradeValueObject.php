<?php

namespace App\ValueObjects;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Number;
use JsonSerializable;
use Override;

final class GradeValueObject implements JsonSerializable
{
    /**
     * @param array<string, array<string, bool|float>> $accessCondition
     * @param array<string, array<string, string>>     $advantages
     */
    public function __construct(public string $description, public array $accessCondition, public array $advantages)
    {
        $this->advantages = $this->convertAdvantagesToPercentage($advantages);
    }

    /**
     * @param  array<string, array<string, string>> $advantages
     * @return array<string, array<string, string>>
     */
    private function convertAdvantagesToPercentage(array $advantages): array
    {
        $convertedAdvantages = [];

        foreach ($advantages as $key => $advantage) {
            $convertedValue = [];
            foreach ($advantage as $plan => $value) {
                $convertedValue[$plan] = $this->formatPercentageToString(floatval($value));
            }
            $convertedAdvantages[$key] = $convertedValue;
        }

        ray($convertedAdvantages);

        return $convertedAdvantages;
    }

    private function formatPercentageToString(float $value): string
    {
        return Number::percentage(
            number: $value,
            precision: 2,
            maxPrecision: 4,
            locale: App::getLocale()
        ) ?: '0%';
    }

    /**
     * @return array{description: string, access_condition: array<array<bool|float>>, advantages: array<array<string>>}
     */
    #[Override]
    public function jsonSerialize(): array
    {
        return [
            'description' => $this->getDescription(),
            'access_condition' => $this->getAccessCondition(),
            'advantages' => $this->getAdvantages(),
        ];
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return bool[][]|float[][]
     */
    public function getAccessCondition(): array
    {
        return $this->accessCondition;
    }

    /**
     * @return string[][]
     */
    public function getAdvantages(): array
    {
        return $this->advantages;
    }
}
