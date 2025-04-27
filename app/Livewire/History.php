<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\UserHotel;
use App\Models\UserTripRoute;
use App\Models\UserPackage;
use App\Models\RentCarJourney;
use Carbon\Carbon;

class History extends Component
{
    use WithPagination;

    public $start_date = '';
    public $end_date = '';
    public $user;
    public $perPage = 6; // Items per page

    public function mount()
    {
        $this->user = User::find(auth()->id());
    }

    public function applyDateRange()
    {
        $this->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $this->resetPage(); // Reset pagination
    }

    public function resetDateFilter()
    {
        $this->start_date = '';
        $this->end_date = '';
        $this->resetPage();
    }

    protected function loadBookings()
    {
        $hotelsQuery = $this->user->hotels()
            ->when($this->start_date, function ($query) {
                $query->where('start_date', '>=', Carbon::parse($this->start_date)->startOfDay());
            })
            ->when($this->end_date, function ($query) {
                $query->where('end_date', '<=', Carbon::parse($this->end_date)->endOfDay());
            })
            ->with('hotel');

        $packagesQuery = $this->user->packages()
            ->when($this->start_date, function ($query) {
                $query->where('created_at', '>=', Carbon::parse($this->start_date)->startOfDay());
            })
            ->when($this->end_date, function ($query) {
                $query->where('created_at', '<=', Carbon::parse($this->end_date)->endOfDay());
            })
            ->with('package');

        $tripRoutesQuery = $this->user->tripRoutes()
            ->when($this->start_date, function ($query) {
                $query->where('rent_date', '>=', Carbon::parse($this->start_date)->startOfDay());
            })
            ->when($this->end_date, function ($query) {
                $query->where('rent_date', '<=', Carbon::parse($this->end_date)->endOfDay());
            })
            ->with('tripRoute');

        $vehicleRentsQuery = $this->user->rentCarJourneys()
            ->when($this->start_date, function ($query) {
                $query->where('created_at', '>=', Carbon::parse($this->start_date)->startOfDay());
            })
            ->when($this->end_date, function ($query) {
                $query->where('created_at', '<=', Carbon::parse($this->end_date)->endOfDay());
            })
            ->with(['vehicleRent', 'journeyRouteRs']);

        return [
            'hotels' => $hotelsQuery->paginate($this->perPage, ['*'], 'hotelsPage'),
            'packages' => $packagesQuery->paginate($this->perPage, ['*'], 'packagesPage'),
            'trip_routes' => $tripRoutesQuery->paginate($this->perPage, ['*'], 'tripRoutesPage'),
            'vehicle_rents' => $vehicleRentsQuery->paginate($this->perPage, ['*'], 'vehicleRentsPage'),
        ];
    }

    public function render()
    {
        $data = $this->loadBookings();

        return view('livewire.history', $data)
            ->extends('layouts.master')
            ->section('content');
    }
}
