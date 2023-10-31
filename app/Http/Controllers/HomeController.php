<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Valuestore\Valuestore;

class HomeController extends Controller
{
    public function index(){
        $data = Valuestore::make(storage_path('app/settings.json'));
        $a = $data->get('Name:');
        
        return view('home.index', [
            'a' => $a
        ]);
    }

}
