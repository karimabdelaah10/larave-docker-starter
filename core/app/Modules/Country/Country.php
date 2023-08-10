<?php

namespace App\Modules\Country;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    use Translatable;

    protected $table = 'countries';
    protected $fillable = [
        'country_code',
        'flag',
        'is_active',
    ];
    public $translatedAttributes = [
        'name',
        'currency_code'
    ];
    protected $casts = [
        'is_active' => 'boolean',
    ];

}
