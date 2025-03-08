<?php

use App\Http\Controllers\AuthController;
use App\Livewire\Auth\Login;
use App\Livewire\Dashboard;
use App\Livewire\HotelDetails;
use App\Livewire\HotelManagement;
use App\Livewire\JourneyRouteDetail;
use App\Livewire\JourneyRoutesManagement;
use App\Livewire\PackageDetails;
use App\Livewire\PackageManagement;
use App\Livewire\TripRouteDetails;
use App\Livewire\TripRouteManagement;
use App\Livewire\User\Packages;
use App\Livewire\VehicleRentDetails;
use App\Livewire\VehicleRentManagement;


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
                Route::get('/packages-management', PackageManagement::class)->name('admin.packages'),
                Route::get('package-details/{packageId?}', PackageDetails::class)->name('package_details'),
                Route::post('logout' , [AuthController::class, 'logout'])->name('admin.logout'),
                Route::get('/vehicle-rent', VehicleRentManagement::class)->name('admin.vehicle-rent'),
                Route::get('/vehicle-rent-details/{id?}' , VehicleRentDetails::class)->name('admin.vechicle-details'),
                Route::get('/journey-routes-management' , JourneyRoutesManagement::class)->name('admin.journey_routes'),
                Route::get('/journey-route-details/{id?}' , JourneyRouteDetail::class)->name('admin.journey_route_details')
            ];
    }
);




//users route
Route::group(
    ['middleware' => 'auth'],
    function () {
        return
            [

                Route::get('/packages' , Packages::class)->name('user.packages'),
            ];
    }
);


