<?php

use App\Livewire\Auth\Login;
use App\Livewire\Dashboard;
use App\Livewire\HotelDetails;
use App\Livewire\HotelManagement;
use App\Livewire\PackageDetails;
use App\Livewire\PackageManagement;
use App\Livewire\TripRouteDetails;
use App\Livewire\TripRouteManagement;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

// admin

Route::get('/admin', Login::class)->name('login');
// Route::get('/admin', Login::class)->name('login');

Route::group(
    ['middleware' => 'auth'],
    function () {
        return
            [
                Route::get('/dashboard', Dashboard::class)->name('dashboard'),
                Route::get('/hotels', HotelManagement::class)->name('hotels'),
                Route::get('/hotel-details/{hotelId?}', HotelDetails::class)->name('hotel_details'),
                Route::get('/trips-routes', TripRouteManagement::class)->name('trips_routes'),
                Route::get('/trips-route-details/{trip_route_id?}', TripRouteDetails::class)->name('trips_route_details'),
                Route::get('/packages', PackageManagement::class)->name('packages'),
                Route::get('package-details/{packageId?}', PackageDetails::class)->name('package_details'),
            ];
    }
);
