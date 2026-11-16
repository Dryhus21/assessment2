<?php

namespace Modules\Fasilitas\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Fasilitas\Models\Fasilitas;

class StoreFasilitasRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isAdmin() ?? false;
    }
    /**
     * @return array<string, array<int, mixed>
     */
    public function rules(): array
    {
        return [
            'nama_titik' => ['required', 'string', 'max:255'],
            'kecamatan' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string', 'max:1000'],
            'kedalaman_cm' => ['required', 'string', 'max:255'],
        ];
    }
    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nama_titik.required' => 'Nama titik wajib diisi.',
            'kecamatan.required' => 'Kecamatan wajib diisi.',
        ];
    }
}
