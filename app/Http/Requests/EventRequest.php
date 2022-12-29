<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
        $id = (int) $this->get('id');
        $price = 'numeric';

        if ($this->method() == 'PUT') {
            $event_name = 'required|unique:events,event_name,' . $id;
            $slug = 'unique:events,slug,' . $id;
            $price .= '|required';
        } else {
            $event_name = 'required|unique:events,event_name';
            $slug = 'unique:events,slug';
        }

        return [
            'event_name' => $event_name,
            'slug' => $slug,
            'price' => $price,
        ];
    }
}
