<?php

namespace App\Http\Requests;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        if (Gate::allows('update-order', $this->route('order'))) {
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
            'restaurant_id' => 'numeric|required',
            'items' => 'array|required',
            'items.*.count' => 'numeric|min:1|required',
            'items.*.food_id' => 'numeric|required',
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
