<?php

declare(strict_types=1);

namespace Changelog\Messenger\Pushover;

use Changelog\Messenger\Messenger as Contract;
use Illuminate\Support\Facades\Http;

final class Messenger implements Contract
{
    public function message(string $from, string $to, string $text, ?array $options = []): void
    {
        Http::post('https://api.pushover.net/1/messages.json', [
            'token'   => $from,
            'user'    => $to,
            'message' => $text,
            ...$options,
        ]);
    }
}
