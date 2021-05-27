<?php


namespace App\Domain;


class Zap extends Scanner
{

    public function scan(string $url)
    {
        $output = shell_exec(sprintf('sudo docker run -t owasp/zap2docker-stable zap-baseline.py -t %s', 'http://'.parse_url($url, PHP_URL_HOST)));

        return $output;
    }
}
