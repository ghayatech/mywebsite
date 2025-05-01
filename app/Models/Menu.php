<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu  extends Model
{
    protected $fillable = ['url'];

    public function translations()
    {
        return $this->hasMany(MenuTranslation::class);
    }

    public function translation($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return $this->translations->where('locale', $locale)->first();
    }
}
