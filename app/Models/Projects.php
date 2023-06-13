<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projects extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'projects';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',

    ];

    protected $fillable = [
        'name','name_ar',
        'client_id',
        'supplier_id',

        'start_date',
        'end_date',
        'city_id',
        'type_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function clients()
    {
        return $this->belongsTo('App\Models\Clients','client_id');
    }
    public function suppliers()
    {
        return $this->belongsTo('App\Models\Supplier','supplier_id');
    }
    public function tasks()
    {
        return $this->hasMany('App\Models\Tasks','task_id');
    }
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
