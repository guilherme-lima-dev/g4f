<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SeriesTvInterval extends Model
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    protected $table = 'series_tv_intervals';

    protected $fillable = [
        'series_tv_id',
        'day_week',
        'time'
    ];

    private int $day_week;

    private DateTime $time;

    public function serie(): BelongsTo
    {
        return $this->belongsTo(SeriesTv::class);
    }

}
