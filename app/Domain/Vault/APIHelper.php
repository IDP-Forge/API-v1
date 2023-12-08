<?php

namespace App\Domain\Vault;

class APIHelper
{
    public static function getKvV2Path(string $input): string
    {
        $string = ltrim($input, '/');

        $segments = explode('/', $string);

        array_splice($segments, 1, 0, 'data');
        array_splice($segments, 0, 0, 'v1');

        return implode('/', $segments);
    }

    public static function pathToParams(string $path, string $contents): array
    {
        $segments = explode('/', $path);

        $key = array_pop($segments);

        $filepath = implode('/', $segments);

        $data = [$key => $contents];

        return [$filepath, $data];
    }
}
