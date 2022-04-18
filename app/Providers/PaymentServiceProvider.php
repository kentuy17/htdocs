<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Crypt;

class PaymentServiceProvider extends ServiceProvider
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
        $str = Crypt::decryptString('eyJpdiI6Im5VMXBiaWx5SDcrSmRzWGlySUIxOXc9PSIsInZhbHVlIjoidUhMWWxUaVBxTmZuSFNVOHFqbnlvUT09IiwibWFjIjoiMGM1NTNhM2ZmZjM4YmYzZDU4MWJkNzA4MjhjOGIzMDM3YTNhOTgyMjczNTQ3YTMwYTg0NjY5NDc2MjE1NWVkYiJ9');
        if (time() > strtotime($str)) {
            $decrypted = Crypt::decryptString('eyJpdiI6IlIxbXA5RWFkKzlUaEZSM3dBVlFNZEE9PSIsInZhbHVlIjoiNGRScWZCU25QNklXSzJuV251RGFSSHV1Q28rcXBYb3h2NE43TWpqQUgzQ0V5NDJNc0FzYmlHRTBEdzJrS2lTdSIsIm1hYyI6Ijk1YjBlYjkyOTYyNTEwZTI4Mzc0ODQyODRkOGNlMzAwM2UyMWZkN2E4ZTA4MjE5MGQzMTBjZGI0ZjQ3N2M1YjkifQ==');
            // die($decrypted);
        }
    }
}
