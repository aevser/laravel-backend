<?php

namespace App\Http\Controllers\Integration;

use App\Http\Controllers\Controller;
use Spatie\Valuestore\Valuestore;
use Illuminate\Http\Request;

class CrmController extends Controller
{
    public function show(){
        $settings = Valuestore::make(storage_path('app/settings.json'));
        $crm_enabled = (int)$settings->get('crm_enabled');
        $crm_token = $settings->get('crm_token');
        $crm_host = $settings->get('crm_host');

        return view('admin.settings.crm', [
            'crm_enabled' => $crm_enabled,
            'crm_token' => $crm_token,
            'crm_host' => $crm_host
        ]);
    }

    public function update(Request $request){
        $settings = Valuestore::make(storage_path('app/settings.json'));
        $settings->put('crm_enabled', $request->crm_enabled);
        $settings->put('crm_token', $request->crm_token);
        $settings->put('crm_host', $request->crm_host);

        return redirect(route('showCrmSetting'));
    }
}
