<?php

namespace App\ValueObjects;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Number;
use JsonSerializable;
use Override;

final class GradeValueObject implements JsonSerializable
{
    /**
     * @param array<string, array<int, string>>    $accessCondition
     * @param array<string, array<string, string>> $advantages
     */
    public function __construct(public string $title, public string $description, public array $accessCondition, public array $advantages)
    {
        $this->advantages = $this->convertAdvantagesToPercentage($advantages);
    }

    /**
     * @param array<string, array<int, string>>    $access_condition
     * @param array<string, array<string, string>> $advantages
     */
    public static function make(string $title, string $description, array $access_condition, array $advantages): self
    {
        return new self(
            $title,
            $description,
            $access_condition,
            $advantages
        );
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
     * @return array{title: string, description: string, access_condition: array<array<string|float>>, advantages: array<array<string>>}
     */
    #[Override]
    public function jsonSerialize(): array
    {
        return [
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
            'access_condition' => $this->getAccessCondition(),
            'advantages' => $this->getAdvantages(),
        ];
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return array<string, array<int, string>>
     */
    public function getAccessCondition(): array
    {
        return $this->accessCondition;
    }

    /**
     * @return string[]
     */
    public function getPlan(): array
    {
        return $this->accessCondition['plan'];
    }

    /**
     * @return ?int
     */
    public function getMinToken(): ?int
    {
        $minString = $this->getMinMaxString('min');

        return $this->extractNumericValue($minString);
    }

    /**
     * @return ?int
     */
    public function getMaxToken(): ?int
    {
        $maxString = $this->getMinMaxString('max');

        return $this->extractNumericValue($maxString);
    }

    /**
     * @return ?string
     */
    private function getMinMaxString(string $minMax): ?string
    {
        foreach ($this->accessCondition['token_balance'] as $condition) {
            if (str_contains($condition, $minMax)) {
                return $condition;
            }
        }

        return null;
    }

    /**
     * @param  ?string $string
     * @return ?int
     */
    private function extractNumericValue(?string $string): ?int
    {
        if (! $string) {
            return null;
        }
        preg_match('/\d+/', $string, $matches);

        return isset($matches[0]) ? (int) $matches[0] : null;
    }

    /**
     * @return string[][]
     */
    public function getAdvantages(): array
    {
        return $this->advantages;
    }
}
