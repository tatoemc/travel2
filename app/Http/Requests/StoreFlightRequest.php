<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFlightRequest extends FormRequest
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
            'company_id' => 'required',
            'service_id' => 'required',
            
            'to' => 'required',
            'date' => 'required',
            'Attendance' => 'required',
            'take_off' => 'required',
            'number' => 'required',
            'cost' => 'required'
        ];
    }
    public function messages()
    {
        return [

            'company_id.required' =>'يرجي ادخال  اسم الشركة ',
            'service_id.required' =>'يرجي ادخال  نوع الخدمة ',
            
            'to.required' =>'يرجى ادخال الوجهة',
            'date.required' =>'يرجى ادخال تاريخ الرحلة',
            'Attendance.required' =>'يرجى ادخال زمن الحضور',
            'take_off.required' =>'يرجى ادخال زمن الاقلاع',
            'number.required' =>'يرجى ادخال عدد المقاعد',
            'cost.required' =>'يرجى ادخال  التكلفة'
        ];
    }


}
