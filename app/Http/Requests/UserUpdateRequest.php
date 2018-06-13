<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\Permission\Models\Role;

class UserUpdateRequest extends FormRequest
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

        $role = Role::where('name', '!=' , 'all-access')->pluck('id');
        $role_replace = str_replace('"', '', $role);
        $role_replace_corchete_left = str_replace("[", "", $role_replace);
        $role_replace_corchete_right = str_replace("]", "", $role_replace_corchete_left);
        $role_clean = $role_replace_corchete_right;

        return [
            'name' => 'required|string|max:128',
            'lastname' => 'required|string|max:128',
            'gender' => 'required|in:male,female,other',
            'email' => 'required|email|unique:users,email,'. $this->user,
            'role' => 'required|in:'.$role_clean,
            'status' => 'required|in:active,inactive',
        ];
    }
}
