<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Collective\Html\FormFacade as Form;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Form::component('bstext', 'components.form.text', ['name', 'value'=>null, 'attributes'=>[]]);
        Form::component('bsselect', 'components.form.select', ['label', 'name' , 'value' => [], 'selected'=> null]);
        Form::component('bscheckbox', 'components.form.checkbox', ['name', 'value' => null, 'attributes'=>[] ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
