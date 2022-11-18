<?php

namespace App\Providers;

use App\Models\Configuration;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class ConfigurationProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //Cache::forget('configs');
        $configs = Cache::remember('configs', 33600, function (){
            return Configuration::first()->toArray();
        });

        unset($configs["id"]);
        unset($configs["created_at"]);
        unset($configs["updated_at"]);

        Config::set('configurations', $configs);

        $pusher = config('broadcasting.connections.pusher');
        $pusher["key"] = config('configurations.pusher_app_key');
        $pusher["secret"] = config('configurations.pusher_app_secret');
        $pusher["app_id"] = config('configurations.pusher_app_id');
        $pusher["options"]["host"] = "api-".config('configurations.pusher_cluster').".pusher.com";
        Config::set('broadcasting.connections.pusher', $pusher);
    }
}
