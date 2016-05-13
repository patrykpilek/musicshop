<?php

namespace Musicshop\Http\Requests;

use Musicshop\Http\Requests\Request;

class AlbumUpdateAdminRequest extends Request
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
            'album' => 'required',
            'artist' => 'required',
            'price' => 'required|numeric|between:0,999.99',
            'format' => 'required',
            'category' => 'required',
        ];
    }
}
