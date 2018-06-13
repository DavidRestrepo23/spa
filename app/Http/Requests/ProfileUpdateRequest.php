<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|unique:users,email,'.$this->user()->id,
            'biography' =>'string|max:128',
            'gender' => 'required|in:male,female,other',
            'nickname' => 'string|unique:users,nickname,'.$this->user()->id,
            'url_facebook' => 'nullable|url|regex:/http(?:s):\/\/(?:www\.)facebook\.com\/.+/i',
            'url_instagram' => 'nullable|url|regex:/http(?:s):\/\/(?:www\.)instagram\.com\/.+/i',
            
        ];

        if($this->get('avatar'))
            $rules = array_merge($rules, ['avatar' => 'mimes:jpg,jpeg,png,gif']); 
            return $rules;

    }
}



/*'url_facebook' => 'regex:(?:(?:http|https):\/\/)?(?:www.)?facebook.com\/(?:(?:\w)*#!\/)?(?:pages\/)?(?:[?\w\-]*\/)?(?:profile.php\?id=(?=\d.*))?([\w\-]*)?',*/