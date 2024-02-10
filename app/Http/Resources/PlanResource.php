<?php

namespace App\Http\Resources;

use App\Models\Plan;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Plan
 *
 * @property-read Attribute $typology
 */
final class PlanResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'level' => $this->level,
            'price' => $this->price,
            'type' => $this->type,
            'typology' => $this->typology,
        ];
    }
}
