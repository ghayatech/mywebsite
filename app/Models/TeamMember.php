<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $guarded = [];

    public function translations()
    {
        return $this->hasMany(TeamMemberTranslation::class);
    }
}
