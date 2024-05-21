<?php

namespace app\models;

use helpers\DataJsonToArray;

class CarsModel
{

    use DataJsonToArray;

    public function getCars(): array
    {
        return $this->dataJsonToArray(DATABASE . "/data_cars.json");
    }
}