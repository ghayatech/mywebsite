<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AboutSection extends Model
{
    protected $fillable = ['image'];

    public function translations()
    {
        return $this->hasMany(AboutSectionTranslation::class);
    }
}
