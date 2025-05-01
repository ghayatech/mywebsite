<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AboutSectionTranslation extends Model
{
    protected $fillable = ['about_section_id', 'locale', 'title', 'paragraph1', 'paragraph2'];

    public function aboutSection()
    {
        return $this->belongsTo(AboutSection::class);
    }
}
