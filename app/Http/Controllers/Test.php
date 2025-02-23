<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\predis;


class Test extends Controller
{
    public function astro(){
        // $res = $this->getExchangeRate("USD");
        $data = collect([1,2,3,4,5]);
        $new = $data->sum();
        // $users = User::all()->pluck("username");
        // pr($users); 
        // Cache::put('test', '10', now()->addMinutes(10));

        // pr(Cache::get('test'));
        // date_default_timezone_set("Asia/Kolkata");
        // pr(\now());
        
        // Redis::set('testval', '20');
        // pr(Redis::get("testval"));
    }

    public function getExchangeRate($currency) {
        $response = Http::get("https://api.exchangerate-api.com/v4/latest/USD");

        return $response->json()['rates'][$currency] ?? null;
    }
}
?>