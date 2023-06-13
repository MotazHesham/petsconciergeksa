<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractTerms extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'contract_terms';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',

    ];

    protected $fillable = [
        'name',
        'name_ar',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
