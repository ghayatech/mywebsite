<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    protected $fillable = [
        'video_url',
        'main_text',
        'small_paragraph',
        'description',
        'services_button_text',
        'services_button_link',
        'contact_button_text',
        'contact_button_link',
        'locale',
    ];
}
