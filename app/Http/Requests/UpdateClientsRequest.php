<?php

namespace App\Http\Requests;

use App\Models\Permission;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateClientsRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('clients_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'string',
                'unique:clients,email,' . request()->route('clients')->id,
            ],
            'phone' => [
                'number',
                'required',
            ],
        ];
    }
}
