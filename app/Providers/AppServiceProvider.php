<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;
use Spatie\Menu\Laravel\Menu;
use Spatie\Menu\Laravel\Link;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Paginator::useBootstrapFive();

        /**
         * 向 header 中传递二级下拉列表，要满足在每一个路由中都传递数据
         * https://laravel.com/docs/11.x/views#sharing-data-with-all-views
         */
        $headerMenu = Menu::new()
          ->add(Link::to('/', '首页')
                  ->addClass('btn btn-outline mr-2'))
          ->submenu(
            Link::to('#', '杂志类别')
                ->addClass('btn btn-outline dropdown-toggle mr-2')
                // 下拉框单机无反应：https://learnku.com/laravel/t/63527
                ->setAttributes(['data-bs-toggle' => 'dropdown', 'role' => 'button']),
                Menu::new()
                    ->addClass('dropdown-menu')
                    ->url('#', '商业金融理财')
                    ->url('#', '时政新闻综合')
                    ->wrap('div', ['class' => 'dropdown'])
                    ->setActiveClassOnLink()
                    ->setActiveFromRequest()
                    ->each(function (Link $link) {
                        $link->addClass('dropdown-item');
                    }))
          ->submenu(
            Link::to('#', '国家地区')
                ->addClass('btn btn-outline dropdown-toggle mr-2')
                ->setAttributes(['data-bs-toggle' => 'dropdown', 'role' => 'button']),
                Menu::new()
                    ->addClass('dropdown-menu')
                    ->url('#', '美国')
                    ->url('#', '英国')
                    ->url('#', '加拿大')
                    ->wrap('div', ['class' => 'dropdown'])
                    ->setActiveClassOnLink()
                    ->setActiveFromRequest()
                    ->each(function (Link $link) {
                        $link->addClass('dropdown-item');
                    }))
          ->submenu(
            Link::to('#', '年度合集')
                ->addClass('btn btn-outline dropdown-toggle mr-2')
                ->setAttributes(['data-bs-toggle' => 'dropdown', 'role' => 'button']),
                Menu::new()
                    ->addClass('dropdown-menu')
                    ->url('#', '2025')
                    ->url('#', '2024')
                    ->url('#', '2023')
                    ->url('#', '2022')
                    ->wrap('div', ['class' => 'dropdown'])
                    ->setActiveClassOnLink()
                    ->setActiveFromRequest()
                    ->each(function (Link $link) {
                        $link->addClass('dropdown-item');
                    }))
          ->add(Link::to('/', '英文书籍')
                  ->addClass('btn btn-outline mr-2'))
          ->add(Link::to('/', '海外剧集')
                  ->addClass('btn btn-outline mr-2'));

        View::share('headerMenu', $headerMenu);
    }
}
