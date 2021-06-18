<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class CountriesComposer
{
    public function compose(View $view)
    {
        $json = Storage::disk('local')->get('countries.json');
        $response = json_decode($json, true);
        $view->with('countries', $response);
    }
}
