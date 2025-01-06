<?php

use Illuminate\Support\Facades\Route;
use Statamic\Facades\Search;
use Statamic\Facades\Site;

Route::get('/{site}', function ($site) {
     Site::setCurrent($site);

    return Search::index('posts')
        ->ensureExists()
        ->search('')
        ->where('status', 'published')
        ->where('site', Site::current())
        ->orderBy('order_number')
        ->orderBy('title')
        ->get()
        ->select('title', 'order_number', 'locale');
 });
