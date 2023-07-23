<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class Appointment extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'appointment';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'date',
        'time',
        'price',
        'user_id',
        'emp_id',
        'pet_id',
        'addon_id',
        'comment',
        'package_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    public function client()
    {
        return $this->belongsTo('App\Models\Clients','user_id')->withTrashed();
    }

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee','emp_id');
    }

    public function pet()
    {
        return $this->belongsTo('App\Models\Pet','pet_id');
    }

    public function package()
    {
        return $this->belongsTo('App\Models\Packages','package_id');
    }

    public function addon()
    {
        return $this->belongsTo('App\Models\Addons','addon_id');
    }
    public function comment()
    {
        return $this->hasOne('App\Models\Comments','appointment_id','id');
    }


}
