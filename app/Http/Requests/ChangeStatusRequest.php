<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class ChangeStatusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        if (Gate::allows('change-order-status', $this->route('order'))) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'status' => 'in:init,submitted,delivered,canceled',
            'id' => 'numeric|required|exists:orders'
        ];
    }

    /**
     * Use route parameters for validation
     * @return array
     */
    protected function validationData()
    {
        $data = parent::all();
        $data['id'] = $this->route('order');

        return $data;
    }
}
