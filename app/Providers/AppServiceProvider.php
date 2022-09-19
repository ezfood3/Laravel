<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() // ServiceProvider의 register()를 오버라이드
    {
        // 일반적으로 여기에서 바인드 처리, 필수 구현
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 인스턴스 생성 시 다른 클래스를 이용해야 할 때는 여기에서 바인드 처리 , 선택 구현
    }
}
