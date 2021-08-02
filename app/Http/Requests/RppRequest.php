<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RppRequest extends FormRequest
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
            'mapel_id' => 'required|integer|exists:mapel,id',
            'alokasi_waktu' => 'required',
            'pendekatan' => 'required',
            'strategi' => 'required',
            'metode_rpp' => 'required',
            'teknik_materi' => 'required',
            'teknik_penilaian' => 'required',
            'alat' => 'required',
            'bentuk' => 'required'
        ];
    }
}
