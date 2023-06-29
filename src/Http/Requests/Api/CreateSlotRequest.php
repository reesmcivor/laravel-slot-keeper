<?php

namespace ReesMcIvor\SlotKeeper\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CreateSlotRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'model' => 'required|in:' . explode(",", config('slot-keeper.models')),
            'slot' => 'required',
        ];
    }
}
