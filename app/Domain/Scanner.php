<?php


namespace App\Domain;


abstract class Scanner
{
 abstract public function scan(string $url);
}
