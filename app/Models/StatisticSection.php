<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatisticSection extends Model
{
    protected $fillable = ['main_text', 'locale'];

    public function statistics()
    {
        return $this->hasMany(Statistic::class, 'section_id');
    }
}
