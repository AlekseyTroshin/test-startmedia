<?php

namespace helpers;

trait DataJsonToArray
{
    public function dataJsonToArray(string $path) : array
    {
        $file = file_get_contents($path);
        return json_decode($file, true);
    }
}