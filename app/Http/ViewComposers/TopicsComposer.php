<?php

namespace App\Http\ViewComposers;

use App\Models\Topic;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;

class TopicsComposer
{
    public function compose(View $view)
    {
        $topics = Topic::all();
        $view->with('topics', $topics);
    }
}
