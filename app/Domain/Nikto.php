<?php


namespace App\Domain;


class Nikto extends Scanner
{

    public function scan(string $url)
    {
        return shell_exec(sprintf('nikto -h %s', gethostbyname(parse_url($url, PHP_URL_HOST))));
    }
}
