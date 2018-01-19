<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class CourseUnitRequest extends FormRequest
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
            'name' => ['required'],
            'faculty_id' => 'required',
        ];
    }

    protected function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->nameExists()) {
                $validator
                ->errors()
                ->add('name', $this->nameErrorMessage());
            }
        });
    }

    public function nameExists()
    {
        return DB::table('course_units')
        ->where(['name' => title_case($this->name)])
        ->exists();
    }

    public function nameErrorMessage()
    {
        return "$this->name already exists, if you are retaking it, register it as a retake instead";
    }
}
