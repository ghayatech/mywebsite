<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMemberTranslation extends Model
{
    protected $guarded = [];

    public function teamMember()
    {
        return $this->belongsTo(TeamMember::class);
    }
}
