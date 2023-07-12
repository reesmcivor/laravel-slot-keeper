<?php

namespace ReesMcIvor\SlotKeeper;

use Illuminate\Support\ServiceProvider;
use ReesMcIvor\SlotKeeper\Console\Commands\ReleaseSlotKeepers;

class SlotKeeperPackageServiceProvider extends ServiceProvider
{
    protected $namespace = 'ReesMcIvor\SlotKeeper\Http\Controllers';

    public function boot()
    {
        if($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../publish/config' => base_path('config'),
                __DIR__ . '/../database/migrations' => database_path('migrations'),
                __DIR__ . '/../publish/tests' => base_path('tests/SlotKeeper'),
            ], 'laravel-slot-keeper');
        }


        $this->loadRoutesFrom(__DIR__.'/routes/api.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'slot-keeper');

        $this->commands([
            ReleaseSlotKeepers::class
        ]);
    }

    private function modulePath($path)
    {
        return __DIR__ . '/../../' . $path;
    }
}
