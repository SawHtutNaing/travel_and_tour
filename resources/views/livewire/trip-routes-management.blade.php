<div>



    <x-table details="trips_route_details" :columns="['name', 'vehicle_type', 'image', 'amount', 'start_location', 'end_location']" :values='$trip_routes' :selecteArrs="[['values' => $vehicleTypes, 'key' => 'SearchselectedVehicleType']]" :containSelect="true" />


</div>
