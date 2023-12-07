<?php

namespace App\Http\Requests\Api;

use Illuminate\Database\Query\Builder;
use Illuminate\Validation\Rule;

class UpdateMasterRequest extends StoreMasterRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = parent::rules();
        $rules['key'] = [
            'required',
            'max:100',
            Rule::unique('master')->where(fn (Builder $query) => $query->where('id', '<>', $this->id)),
        ];

        return $rules;
    }
}
