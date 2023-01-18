<?php

namespace App\Http\Controllers\User;

use App\Models\Banner;

class IndexController extends BasicController
{
    public function index()
    {
        $banners = $this->getBanners();

        return view('web.home', compact('banners'));
    }

    private function getBanners()
    {
        return Banner::get();
    }
}
