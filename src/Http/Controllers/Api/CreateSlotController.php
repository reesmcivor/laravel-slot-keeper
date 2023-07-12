<?php

namespace ReesMcIvor\SlotKeeper\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use ReesMcIvor\SlotKeeper\Http\Requests\Api\CreateSlotRequest;
use ReesMcIvor\SlotKeeper\Models\Slot;
use ReesMcIvor\SlotKeeper\Models\SlotKeeper;

class CreateSlotController extends Controller
{
    public function __invoke(CreateSlotRequest $request)
    {
        try {
            $modelClass = config('slot-keeper.models.' . $request->get('model') ?? 'default');
            $model = app($modelClass)->fill($request->get('query'));
            $model->save();
            $model->createSlotKeeper();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'Slot already taken'], 422);
        }

        return response()->json(['message' => 'Created slot']);
    }
}
