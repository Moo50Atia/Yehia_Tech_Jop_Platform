<?php

namespace App;

trait DashboardTrait
{
    public static function monthlyStats()
    {
        $total = static::count();
        $new = static::where('created_at', '>=', now()->subMonth())
            ->whereNull('deleted_at')->count();
        $percent = round($total ? ($new / $total) * 100 : 0, 1);

        $latest = static::latest('created_at')->first();
        $lastAddedTime = $latest ? $latest->created_at->diffForHumans() : null;

        return (object) [
            'total' => $total,
            'new' => $new,
            'percent' => $percent,
            'latest' => $latest,
            'latesttime' => $lastAddedTime,
        ];
    }
}
