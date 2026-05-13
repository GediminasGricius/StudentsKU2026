<?php

namespace App\Providers;

use App\Events\LecturersListed;
use App\Listeners\SendLecturerInformation;
use App\Models\Lecturer;
use App\Models\Subject;
use App\Policies\SubjectPolicy;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('deleteLecturer', function ($user, Lecturer $lecturer) {
            return ($lecturer->user_id==$user->id)||($user->type=='admin');

        });

        Gate::define('changeLanguage', function ($user) {

        });


        Gate::policy(Subject::class, SubjectPolicy::class);

    }
}
