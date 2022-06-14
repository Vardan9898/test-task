<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMessageRequest;
use Illuminate\Support\Arr;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramBotController extends Controller
{
    public function updatedActivity()
    {
        $activity = Telegram::getUpdates();

        $text = "Welcome to our TestBot\n";

        if (Arr::last($activity)->message->text == '/start') {
            Telegram::sendMessage([
                'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
                'parse_mode' => 'HTML',
                'text' => "<b>Welcome to TestBot</b>",
            ]);
        }

        return $activity;
    }

    public function sendMessage()
    {
        return view('message');
    }

    public function storeMessage(SendMessageRequest $request)
    {
        $text = "A new Contact Us query\n"
            . "<b>Email Address: </b>\n"
            . "$request->email\n"
            . "<b>Message: </b>\n"
            . $request->message;

        Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
            'parse_mode' => 'HTML',
            'text' => $text
        ]);

        return redirect()->back();
    }
}
