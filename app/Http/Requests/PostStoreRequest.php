    <?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'title' => 'required|string',
            'slug' => 'required|unique:posts,slug',
            'excerpt' => 'string|max:255',
            'body' => 'required|string',
            'status' => 'required|in:DRAFT,PUBLISHED',
            'category_id' => 'required|integer',
            'user_id' => 'required|integer',
            'description' => 'nullable|string|max:128',
            'keywords' => 'nullable|string',
        ];

        if($this->get('file'))
            $rules = array_merge($rules, ['file' => 'mimes:jpg,jpeg,png,gif']); 
            return $rules;
    }
}
