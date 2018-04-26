<?php

namespace App\Telegram;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

/**
 * Class TestCommand.
 */
class TestCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'test';

    /**
     * @var string Command Description
     */
    protected $description = 'Test command, Get a list of commands';

    /**
     * {@inheritdoc}
     */
    public function handle($arguments)
    {
        $this->replyWithChatAction(['action' => Actions::TYPING]);

        $user = \App\User::find(1);

        $this->replyWithMessage(['text' => 'Почта пользователя в laravel:' . $user->email]);

        $telegram_user = \Telegram::getWebhookUpdates()['message'];
        $text = sprintf('%s: %s'.PHP_EOL, 'Ваш номер чата', $telegram_user['from']['id']);
        /*$text .= sprintf('%s: %s'.PHP_EOL, 'Ваше имя пользователя в телеграм', $telegram_user['from']['username']);*/

        $keyboard = [
            ['7', '8', '9'],
            ['4', '5', '6'],
            ['1', '2', '3'],
            ['0']
        ];

        $reply_markup = \Telegram::replyKeyboardMarkup([
            'keyboard' => $keyboard,
            'resize_keyboard' => true,
            'one_time_keyboard' => true
        ]);

        $response = \Telegram::sendMessage([
            'chat_id' => $telegram_user['from']['id'],
            'text' => 'Hello World',
            'reply_markup' => $reply_markup
        ]);

        $messageId = $response->getMessageId();

        $this->replyWithMessage(compact('text'));
    }
}
