<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Tasks  extends Model
{
    use SoftDeletes;
    use HasFactory;
    public $table = 'tasks';
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable = [
        'project_id',
        'name',
        'details',
        'admin_id',
        'today_rate',
        'days',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    public function user(){
        return $this->belongsTo('App\Models\User' , 'admin_id');
    }
}
