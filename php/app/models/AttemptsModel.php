<?php

namespace app\models;

use helpers\DataJsonToArray;

class AttemptsModel
{

    use DataJsonToArray;

    public function getAttempts(): array
    {
        return $this->dataJsonToArray(DATABASE . "/data_attempts.json");
    }

}