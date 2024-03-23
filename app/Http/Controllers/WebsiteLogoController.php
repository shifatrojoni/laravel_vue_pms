<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteLogoController extends Controller
{
    public function website_logo(Request $request){
        return view('admin.website_logo.update');
        
    }
}
