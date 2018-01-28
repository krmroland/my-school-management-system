<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimetableLectureRequest extends FormRequest
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
            'venue' => 'required',
            'course_unit_id' => 'required',
            'hour' => 'required',
            'day' => 'required',
            'dayTime' => 'required',
        ];
    }
}
