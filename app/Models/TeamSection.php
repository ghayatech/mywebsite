<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamSection extends Model
{
    protected $guarded = [];

    public function translations()
    {
        return $this->hasMany(TeamSectionTranslation::class);
    }
}
