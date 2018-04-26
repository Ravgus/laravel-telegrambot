<?php

namespace App\Telegram;

use Illuminate\Http\Response;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

/**
 * Class StopCommand.
 */
class StopCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'stop';

    /**
     * @var string Command Description
     */
    protected $description = 'Stop command, Get a list of commands';

    /**
     * {@inheritdoc}
     */
    public function handle($arguments)
    {

    }
}
