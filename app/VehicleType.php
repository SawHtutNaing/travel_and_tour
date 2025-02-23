<?php

namespace App;

enum VehicleType: string
{
    case CAR = 'car';
    case FLIGHT = 'flight';
    case BUS = 'bus';
    case TRAIN = 'train';

    public function label(): string
    {
        return match ($this) {
            self::CAR => 'Car',
            self::FLIGHT => 'Flight',
            self::BUS => 'Bus',
            self::TRAIN => 'Train',
        };
    }

    public static function getCaseByValue(string $value): ?self
    {
        return self::tryFrom(strtolower($value));  // Try to get the enum case from string
    }
}
