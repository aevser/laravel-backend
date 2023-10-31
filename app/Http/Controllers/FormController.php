<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TelegramMsg;
use Spatie\Valuestore\Valuestore;
use App\Models\FormModal;
use App\Mail\SendMail;

class FormController extends Controller
{
    public function submit(Request $request){

        $settings = Valuestore::make(storage_path('app/settings.json'));
        $email_enabled = $settings->get('email_enabled');
        $telegram_enabled = $settings->get('telegram_enabled');
        $crm_enabled = $settings->get('crm_enabled');

        $data = $user = FormModal::create([
            'name' => $request->name,
            'phone' => $request->phone
        ]);

        $request_data = [
            'api_token' => 'wY5UWA8MEYgajbBRRIDHmJELu7aKtdxt4TxVwFR8Qj2CtOE5IBDHw9FoDnJT',
            'host' => 'lcorplaravelbot.tbot',
            'name' => $request->name,
            'phone' => $request->phone,
        ];

        // Проверка отправки заявки на почту 

        if($email_enabled === '1'){
            Mail::to('llaravel@yandex.ru')->send(new SendMail($data));
        } else{
            Log::channel('leads_email_yandex')->error('Ошибка при отправке на почту');
        }

        // Проверка отправки завяки в Телеграм

        if($telegram_enabled === '1'){
            Notification::send($request, new TelegramMsg);

        } else{
            Log::channel('leads_telegram_bot')->error('Ошибка при отправке в Telegram');
        }

        // Проверка отправки заявки в CRM

        if($crm_enabled === '1'){
            $response = Http::post('https://in.leads-hunter.com/api/v1/lead.add', $request_data);
        } else{
            Log::channel('leads_hunter_crm')->error('Ошибка при выполнении запроса');
        }

        return redirect(route('home'));
    }
}
