<?php

namespace App\Http\Controllers;

use  Illuminate\Support\Facades\Artisan;

class CacheController extends Controller
{
    public function clearViewCache()
    {
        Artisan::call('view:clear');
        return redirect('/clear-cache')->with('status', "View cache cleared!");
    }

    public function clearRouteCache()
    {
        Artisan::call('route:clear');
        return redirect('/clear-cache')->with('status', "Route cache cleared!");
    }

    public function clearConfigCache()
    {
        Artisan::call('config:clear');
        return redirect('/clear-cache')->with('status',"Config cache cleared!");
    }

    public function clearAllCache()
    {
        Artisan::call('cache:clear');
        return redirect('/clear-cache')->with('status', "All caches cleared!");
    }
}