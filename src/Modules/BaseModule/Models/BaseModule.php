<?php

namespace App\Modules\BaseModule\Models;

use App\Foundation\Enums\ActivationType;
use App\Foundation\Models\BaseModel;
use App\Modules\BaseModule\Database\factories\BaseModuleFactory;
use App\Modules\BaseModule\Filters\BaseModuleFilters;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class BaseModule
 * @mixin Builder
 * @package App\Modules\BaseModule\Models
 */
class BaseModule extends BaseModel
{
    use HasFactory;

    protected $table = 'base_modules';

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return BaseModuleFactory::new();
    }

    /**
     * @var string[]
     */
    protected $fillable = [
        'name_ar', 'name_en', 'status'
    ];

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', ActivationType::ACTIVE->value);
    }

    /**
     * Apply all relevant Sizes filters
     *
     * @param Builder $query
     * @param BaseModuleFilters $filters
     * @return Builder
     */
    public function scopeFilter(Builder $query, BaseModuleFilters $filters): Builder
    {
        return $filters->apply($query);
    }

}
