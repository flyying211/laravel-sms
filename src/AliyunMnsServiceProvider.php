<?php

namespace Skychf\AliyunMNS;

use Illuminate\Support\ServiceProvider;

class AliyunMnsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/aliyunmns.php' => config_path('aliyunmns.php'),
        ]);
    }

    public function register()
    {
        $this->app->bind('Skychf\AliyunMns\Sms');
        $this->app->singleton('aliyunmns', function ($app) {
            return $app->make('Skychf\AliyunMns\Sms');
        });
    }

    public function provides()
    {
        return ['aliyunmns'];
    }
}