<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $fillable = [
        'section_id',
        'icon',
        'title',
        'number',
        'locale',
    ];

    public function section()
    {
        return $this->belongsTo(StatisticSection::class, 'section_id');
    }

    public static function getByLocale($locale)
    {
        return self::where('locale', $locale)->get();
    }
}
