<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'user_type' => 'required',
            'phone' => 'required|unique:users,phone|min:10|regex:/^([0-9\s\-\+\(\)]*)$/',
            'add' => 'required',
            'gender' => 'required',
            'password' => 'same:password_confirmation',
            'passport' => 'required|unique:users,passport',
        ];

    }

    public function messages()
    {
        return [

            'name.required' =>'يرجي ادخال  اسم المستخدم ',
            'email.required' =>'يرجى ادخال البريد الالكتروني',
            'email.unique' =>'  البريد الالكتروني مستخدم بالفعل',
            'phone.required' =>'يرجى ادخال رقم الهاتف ',
            'phone.unique' =>'  رقم الهاتف مستخدم بالفعل',
            'phone.min' =>' رقم الهاتف يجب ان يكون 10 ارقام',
            'phone.regex' =>' رقم الهاتف يجب ان يكون ارقام',
            'user_type.required' =>'يرجي ادخال  نوع المستخدم ',
            'add.required' =>'يرجي ادخال  العنوان ',
            'password.required' =>'يرجي ادخال  كلمة المرور ',
            'password.same' =>'كلمة المرور  غير متطابقة ',
            'passport.required' =>'يرجي ادخال  رقم الجواز ',
            'passport.unique' =>'رقم الجواز  مستخدم بالفعل ',
        ];
    }


}
