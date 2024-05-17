<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Livewire::component('live-earch', function () {
            $query = request('query', '');
            $patients = DB::table('patients')
                ->where('name', 'like', '%' . $query . '%')
                ->get();

            return view('livewire.live-search', [
                'query' => $query,
                'patients' => $patients
            ]);
        });
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
}
