<?php

namespace src;

use Symfony\Component\Yaml\Yaml;

class FileLoader
{
    public function load(string $file)
    {
        //Todo sanitize file path


        return Yaml::parseFile($file);
    }
}