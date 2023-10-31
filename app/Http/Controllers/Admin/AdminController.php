<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Valuestore\Valuestore;
use Illuminate\Http\Request;
use App\Models\FormModal;

class AdminController extends Controller
{
    public function index(){

        $posts = FormModal::all();

        return view('admin.index', [
            'posts' => $posts
        ]);
    }
}
