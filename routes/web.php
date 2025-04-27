<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckRole;
use App\Livewire\Auth\Login;
use App\Livewire\Dashboard;
use App\Livewire\HotelBooking;
use App\Livewire\HotelDetails;
use App\Livewire\HotelManagement;
use App\Livewire\Index;
use App\Livewire\JourneyRouteDetail;
use App\Livewire\JourneyRoutesManagement;
use App\Livewire\PackageDetails;
use App\Livewire\PackageManagement;
use App\Livewire\Register;
use App\Livewire\TripRouteDetails;
use App\Livewire\TripRouteManagement;
use App\Livewire\User\Packages;
use App\Livewire\VehicleRentDetails;
use App\Livewire\VehicleRentManagement;
use App\Livewire\PackageRegister;
use App\Livewire\Profile;
use App\Livewire\History;
use App\Livewire\AllHotels;
use App\Livewire\AllPackage;
use App\Livewire\AllTripRoutes;
use App\Livewire\RentCarJourney;
use App\Livewire\RentCarJourneyAll;
use App\Livewire\RentCarJourneyForm;
use App\Livewire\TripRouteRent;







use Illuminate\Support\Facades\Route;

// Route::get('/', function () {

//     return view('index');
// });
Route::get('/',Index::class)->name('index');

// admin

Route::get('/admin', Login::class)->name('login');
// Route::get('/admin', Login::class)->name('login');

Route::middleware(['auth', 'check_role'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/hotels', HotelManagement::class)->name('hotels');
    Route::get('/hotel-details/{hotelId?}', HotelDetails::class)->name('hotel_details');
    Route::get('/trips-routes', TripRouteManagement::class)->name('trips_routes');
    Route::get('/trips-route-details/{trip_route_id?}', TripRouteDetails::class)->name('trips_route_details');
    Route::get('/packages-management', PackageManagement::class)->name('admin.packages');
    Route::get('package-details/{packageId?}', PackageDetails::class)->name('package_details');

    Route::get('/vehicle-rent', VehicleRentManagement::class)->name('admin.vehicle-rent');
    Route::get('/vehicle-rent-details/{id?}', VehicleRentDetails::class)->name('admin.vechicle-details');
    Route::get('/journey-routes-management', JourneyRoutesManagement::class)->name('admin.journey_routes');
    Route::get('/journey-route-details/{id?}', JourneyRouteDetail::class)->name('admin.journey_route_details');
});


Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');

//users route
Route::middleware(['user_auth'])->group(function () {


                Route::get('/packages' , Packages::class)->name('user.packages');
                Route::get('/hotel/booking/{hotel}' , HotelBooking::class)->name('user.hotel_booking');
                Route::get('/packge/register/{package}' , PackageRegister::class)->name('user.package_register');
                Route::get('/profile' , Profile::class)->name('user.profile');
                Route::get('/history',History::class)->name('user.history');
                Route::get('/all-hotels', AllHotels::class)->name('user.all_hotels' );
                Route::get('/all-packages', AllPackage::class)->name('user.all_packages');
                Route::get('/trip-routes', AllTripRoutes::class)->name('user.trip_rotues');
                Route::get('/trip_route/rent/{trip_route?}' , TripRouteRent::class)->name('user.trip_rotue_rent');


                Route::get('/rent-car-journey' ,RentCarJourneyAll::class)->name('user.trip_route_all');
        Route::get('/rent-car-journey-form/{rent_car_journey_id?}' , RentCarJourneyForm::class)->name('user.rent_car_journey_form');

                // Route::get('/rent-car-journey/{trip_route}' , RentCarJourney::class)->name('user.rent_car_journey');


    }
);

Route::get('/login' , Login::class )->name('user.login');
Route::get('/register' , Register::class )->name('user.register');





