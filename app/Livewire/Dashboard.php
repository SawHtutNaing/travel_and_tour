<?php

namespace App\Livewire;

use App\Models\UserHotel;
use App\Models\UserTripRoutes;
use App\Models\UserPackage;
use App\Models\RentCarJourney;
use Livewire\Component;
use Carbon\Carbon;

class Dashboard extends Component
{
    public $booking;
    public $trip_route;
    public $packages;
    public $vehiclesRent;
    public $start_date = '';
    public $end_date = '';

    public function mount()
    {
        $this->loadData();
    }

    public function applyDateRange()
    {
        // Manually triggered by the Apply button
        $this->loadData();
    }

    private function loadData()
    {
        $query = UserHotel::query();
        $tripRouteQuery = UserTripRoutes::query();
        $packageQuery = UserPackage::query();
        $vehicleRentQuery = RentCarJourney::query();

        if ($this->start_date && $this->end_date) {
            try {
                $startDate = Carbon::parse($this->start_date)->startOfDay();
                $endDate = Carbon::parse($this->end_date)->endOfDay();

                $query->whereBetween('start_date', [$startDate, $endDate]);
                $tripRouteQuery->whereBetween('rent_date', [$startDate, $endDate]);
                $packageQuery->whereBetween('created_at', [$startDate, $endDate]);
                $vehicleRentQuery->whereBetween('created_at', [$startDate, $endDate]);
            } catch (\Exception $e) {
                \Log::error('Invalid date range: ' . $e->getMessage());
            }
        }

        $this->booking = $query->get();
        $this->trip_route = $tripRouteQuery->get();
        $this->packages = $packageQuery->get();
        $this->vehiclesRent = $vehicleRentQuery->get();
    }

    public function render()
    {
        $hotelData = $this->booking->groupBy(function ($item) {
            return Carbon::parse($item->start_date)->format('Y-m-d');
        })->map(function ($group) {
            return [
                'count' => $group->count(),
                'amount' => $group->sum('total_amount'),
            ];
        });

        $tripRouteData = $this->trip_route->groupBy(function ($item) {
            return Carbon::parse($item->rent_date)->format('Y-m-d');
        })->map->count();

        $packageData = $this->packages->groupBy(function ($item) {
            return Carbon::parse($item->created_at)->format('Y-m-d');
        })->map(function ($group) {
            return [
                'count' => $group->count(),
                'amount' => $group->sum('total_amount'),
            ];
        });

        $vehicleRentData = $this->vehiclesRent->groupBy(function ($item) {
            return Carbon::parse($item->created_at)->format('Y-m-d');
        })->map(function ($group) {
            return [
                'count' => $group->count(),
                'amount' => $group->sum('total_amount'),
            ];
        });

        return view('livewire.dashboard', [
            'hotelChartData' => [
                'labels' => $hotelData->keys()->toArray(),
                'counts' => $hotelData->pluck('count')->toArray(),
                'amounts' => $hotelData->pluck('amount')->toArray(),
            ],
            'tripRouteChartData' => [
                'labels' => $tripRouteData->keys()->toArray(),
                'counts' => $tripRouteData->values()->toArray(),
            ],
            'packageChartData' => [
                'labels' => $packageData->keys()->toArray(),
                'counts' => $packageData->pluck('count')->toArray(),
                'amounts' => $packageData->pluck('amount')->toArray(),
            ],
            'vehicleRentChartData' => [
                'labels' => $vehicleRentData->keys()->toArray(),
                'counts' => $vehicleRentData->pluck('count')->toArray(),
                'amounts' => $vehicleRentData->pluck('amount')->toArray(),
            ],
        ]);
    }
}
