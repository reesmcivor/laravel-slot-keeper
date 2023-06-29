<?php

Route::middleware('api')->prefix('api')->group(function () {
    Route::get('slot-keeper/create', \ReesMcIvor\SlotKeeper\Http\Controllers\Api\CreateSlotKeeper::class);
});
