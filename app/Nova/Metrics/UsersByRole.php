<?php

namespace App\Nova\Metrics;

use App\Models\User;
use DateTimeInterface;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Partition;
use Laravel\Nova\Metrics\PartitionResult;

class UsersByRole extends Partition
{
    /**
     * Calculate the value of the metric.
     */
    public function calculate(NovaRequest $request): PartitionResult
    {
        return $this->count($request, User::class, 'role')
            ->label(function ($value) {
                return ucfirst($value);
            });
    }

    /**
     * Determine the amount of time the results of the metric should be cached.
     */
    public function cacheFor(): DateTimeInterface|null
    {
        // return now()->addMinutes(5);

        return null;
    }

    /**
     * Get the URI key for the metric.
     */
    public function uriKey(): string
    {
        return 'users-by-role';
    }
}
