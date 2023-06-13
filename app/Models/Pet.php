<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Pet extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'pets';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'category_id',
        'client_id',
        'image',
        'name',
        'age',
        'gender',

    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }
}
