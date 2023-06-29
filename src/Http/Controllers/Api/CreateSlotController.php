<?php

namespace ReesMcIvor\Auth\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use ReesMcIvor\SlotKeeper\Http\Requests\Api\CreateSlotRequest;
use ReesMcIvor\SlotKeeper\Models\SlotKeeper;

class CreateSlotController extends Controller
{
    public function __invoke(CreateSlotRequest $request)
    {
        SlotKeeper::create([
            'model' => config('slot-keeper.model.' . $request->model),
            'query' => $request->slot,
            'released_at' => now()->addMinutes(15),
        ])

        return $status === Password::RESET_LINK_SENT
            ? response()->json(['message' => 'Password reset email sent'])
            : response()->json(['message' => 'Unable to send password reset email'], 500);
    }
}
