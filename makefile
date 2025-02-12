#!/usr/bin/env php
<?php

require_once './vendor/autoload.php';

array_shift($argv);

$makeFile = new \MakeFile\MakeFile($argv);
$makeFile->basePath = \MakeFile\Config::get('base_config')['basePath'];

try {
    echo $makeFile->execute();
} catch(Exception $exception) {
    echo $exception->getMessage();
}