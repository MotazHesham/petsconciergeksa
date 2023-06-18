<?php

namespace App\Models;

use \DateTimeInterface; 
use Illuminate\Database\Eloquent\Model; 



class Slider extends Model
{ 

    public $table = 'sliders';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'photo',
        'title',
        'body',
        'link',
        'button_name',

    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    
}
