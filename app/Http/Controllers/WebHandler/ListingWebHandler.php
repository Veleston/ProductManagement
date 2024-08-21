<?php

namespace App\Http\Controllers\WebHandler;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;

class ListingWebHandler extends Controller
{
    public function showListings(Request $request)
    {
        $data = $request->all();
        $listingObj = new ListingController();
        $listingData = $listingObj->showListings($data);
        return $listingData;
    }
}
