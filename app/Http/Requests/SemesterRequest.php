<?php

namespace App\Http\Requests;

use App\Helpers\DateString;
use Illuminate\Foundation\Http\FormRequest;

class SemesterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'dates' => 'required',
            'name' => 'required',
            'academic_year' => 'required',
        ];
    }

    public function processed()
    {
        return DateString::makeFrom($this->dates)
                     ->toArray('starts', 'ends')
                      +
            $this->only(['name', 'academic_year']);
    }
}
