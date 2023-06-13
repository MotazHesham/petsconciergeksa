<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class Comments extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'comments';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'comment',
        'client_id',
        'appointment_id',
        'flag',
    ];

    public function client()
    {
        return $this->belongsTo('App\Models\Clients','client_id');
    }

    public function appointment()
    {
        return $this->belongsTo('App\Models\Appointment','appointment_id');
    }

}
