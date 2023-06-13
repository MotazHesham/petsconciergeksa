<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'suppliers';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'name',
        'name_ar',
        'address_ar',

        'email',
        'phone',
        'tax_number',
        'address',
        'building_num',
        'street_name',
        'street',
        'disincit',
        'city_id',
        'addidtional_address',
        'another_id',
        'zipCode',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    public function city()
    {
        return $this->belongsTo('App\Models\Cities','city_id');
    }
}
