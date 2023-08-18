<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRuanganRequest extends FormRequest
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
   * @return array<string, mixed>
   */
  public function rules()
  {
    return [
      'nama_ruangan' => 'required|string|max:255',
      'fasilitas' => 'array|nullable',
      'kapasitas' => 'required|integer',
      'status' => 'required|string|in:Baik,Renovasi'
    ];
  }
}
