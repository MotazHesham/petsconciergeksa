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
        'phone',
        'email',
        'address',
        'twitter',
        'facebook',
        'instagram',
        'googleplus',
        'descripton',
        'mission',
        'vision',
        'logo',
        'image_login', 
        'image_about_us', 
        'image_our_service',
        'image_easy_quick',
        'image_client_reviews',
        'image_packages',
        'image_contact',
    ];


}
