<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Homestay extends FormRequest
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
            'hname'          => 'required',
            // 'bname'          =>'required',
            // 'anumber'        =>'required',
            'email'          =>'required|unique:homestayhotels',
            // 'images.*'         => 'required',
            // 'images.*'       =>  'mimes:jpeg, png, bmp, gif,jpg,svg|max:1000',
            'rating'         =>'required',
            'type'           =>'required',
            'description'    =>'required',
            'area'           =>'required',
            'city'           =>'required',
            'country'        =>'required',
            'cperson'        =>'required',
            'phone'          =>'required',
        ];
    }
    
    public function messages()
    {
        return [
            'hname.required' =>'Hotel Name is required',
            'bname.required' =>'Bank Name is required',
            // 'anumber.required' =>'Account Number is required',
            // 'email.required' =>'Email is required',
            'email.unique'   =>'Email should be unique',
            // 'images.*.mimes'    => 'Image format may be jpeg,bmp,png,jpg,gif or svg',
            // 'images.*.size'     =>'Image size not exceed to be 1000kb', 
            'rating.required' =>'Rating is required',
            'type.required' => 'Hotel type is required',
            'description.required' => 'Description is required',
            'area.required' => 'Area Name is required',
            'city.required' => 'City Name is required',
            'country.required'  =>'Country Name is required',
            'cperson.required' => 'Contact Person Name is required',
            'phone.required' => 'Phone is required',
        ];
    }

}
