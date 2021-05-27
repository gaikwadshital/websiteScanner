<?php


namespace App\Domain;


class Namp extends Scanner
{

    public function scan(string $url)
    {
       return shell_exec(sprintf('nmap %s', parse_url($url, PHP_URL_HOST)));
    }
}
