<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamSectionTranslation extends Model
{
    protected $guarded = [];

    public function teamSection()
    {
        return $this->belongsTo(TeamSection::class);
    }
}
