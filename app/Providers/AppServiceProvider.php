<?php

namespace App\Providers;

use App\Models\Order;
use App\Services\Order\OrderFactory;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Gate::define('change-order-status', function ($user) {
            return $user->role()->first()->id == config('constants.user_roles.admin');
        });

        Gate::define('update-order', function ($user, $orderId) {
            $order = Order::findOrFail($orderId);
            return $order->status == config('constants.order_status.init') &&
                ($order->user_id == $user->id || $user->role()->first()->id == config('constants.user_roles.admin'));
        });
    }
}
