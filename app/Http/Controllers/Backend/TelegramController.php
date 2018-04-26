<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Telegram;
use App\TelegramUser;

class TelegramController extends Controller
{
    //
    public function webHook()
    {
        $telegram = Telegram::getWebhookUpdates()['message'];

        if (!TelegramUser::find($telegram['from']['id'])) {
            TelegramUser::create(json_decode($telegram['from'], true));
        }

        Telegram::commandsHandler(true);
    }
}
