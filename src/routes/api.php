<?php

Route::middleware('api')->prefix('api')->group(function () {
    Route::post('slot-keeper/create', \ReesMcIvor\SlotKeeper\Http\Controllers\Api\CreateSlotController::class);
});
