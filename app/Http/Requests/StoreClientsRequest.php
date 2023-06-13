<?php

namespace App\Http\Requests;

use App\Models\Permission;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreClientsRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('clients_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:clients',
            ],
            'phone' => [
                'number',
                'required',
            ],
        ];
    }
}
