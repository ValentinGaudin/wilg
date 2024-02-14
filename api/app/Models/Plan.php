<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'level',
        'price',
        'type',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'level' => 'integer',
        'type' => 'boolean',
    ];

    /**
     * @var array<int, string>
     */
    protected $appends = [
        'typology',
    ];

    /**
     * @return HasMany<User>
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * @return Attribute<string, never>
     */
    public function typology(): Attribute
    {
        return Attribute::get(fn () => $this->type ? 'ANNUAL' : 'MONTHLY');
    }
}
