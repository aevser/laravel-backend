<?php

namespace App\Http\Controllers\Integration;

use App\Http\Controllers\Controller;
use Spatie\Valuestore\Valuestore;
use Illuminate\Http\Request;

class TelegramController extends Controller
{
    public function show(){
        $settings = Valuestore::make(storage_path('app/settings.json'));
        $telegram_enabled = (int)$settings->get('telegram_enabled');
        $telegram = $settings->get('telegram');

        return view('admin.settings.telegram', [
            'telegram_enabled' => $telegram_enabled,
            'telegram' => $telegram
        ]);
    }

    public function update(Request $request){
        $settings = Valuestore::make(storage_path('app/settings.json'));
        $settings->put('telegram_enabled', $request->telegram_enabled);
        $settings->put('telegram', $request->telegram);

        return redirect(route('showTelegramSetting'));
    }
}
