<?php

namespace App\Http\Controllers\Integration;

use App\Http\Controllers\Controller;
use Spatie\Valuestore\Valuestore;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function show(){
        $settings = Valuestore::make(storage_path('app/settings.json'));
        $email_enabled = (int)$settings->get('email_enabled');
        $email = $settings->get('email');
        
        return view('admin.settings.email', [
            'email_enabled' => $email_enabled,
            'email' => $email
        ]);
    }

    public function update(Request $request){
        $settings = Valuestore::make(storage_path('app/settings.json'));
        $settings->put('email_enabled', $request->email_enabled);
        $this->validate($request, [
            'email' => 'required', 'string', 'email'
        ]);
        $settings->put('email', $request->email);

        return redirect(route('showEmailSetting'));
    }
}
