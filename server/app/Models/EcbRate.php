<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EcbRate extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Scope a query to only include actual ECB rates.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActual($query)
    {
        $maxDate = self::max('date');

        return $query->where('date', $maxDate);
    }

    /**
     * Scope a query to only include historical ECB rates.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeHistorical($query)
    {
        $maxDate = self::max('date');

        return $query->where('date', '!=', $maxDate);
    }
}
