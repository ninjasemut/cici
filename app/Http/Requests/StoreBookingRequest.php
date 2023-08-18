<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
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
      'tanggal' => 'required|date',
      'nama' => 'required|string',
      'ruangan_id' => 'required',
      'jam_mulai' => 'required',
      'jam_selesai' => 'required',
      'jumlah' => 'required|integer',
      'agenda' => 'required|string',
    ];
  }
}
