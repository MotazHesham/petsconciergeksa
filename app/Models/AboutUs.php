<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{

    public $table = 'about_us';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'descripton',
        'mission',
        'vision',
        'image_about_us',

    ];


}
