<?php

namespace App\Http\Requests;
use App\Rules\Uppercase;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'f_name'=>'required|min:10|max:50',
            // 'f_name'=>['required','min:10','max:50', new Uppercase],
            'email'=>'required|email',
            'password'=>'required',
            'password_confirmation'=>'same:password'
        ];
    }
    protected $stopOnFirstFailure = true;
    public function attributes()
    {
        return [
            'f_name' => 'Full Name',
            'email' => 'Email',
            'password' => 'Password',
            'password_confirmation' => 'Password Confirmation'
        ];
    }
    public function messages()
    {
        return [
            // 'f_name.required' => "Full Name Field Must be Required."
        ];
    }
    protected function prepareForValidation(): void
    {
        $this->merge([
            // 'f_name' => strtoupper($this->f_name),
            // 'email' => strtoupper($this->email)
        ]);
    }
}
