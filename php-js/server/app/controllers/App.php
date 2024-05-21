<?php

namespace app\controllers;

use app\models\AttemptsModel;
use app\models\CarsModel;

class App
{
    protected CarsModel $carsModel;
    protected AttemptsModel $attemptsModel;
    protected array $cars;
    protected array $attempts;

    public function __construct()
    {
        // собираем данные из базы данных
        $this->carsModel = new CarsModel();
        $this->attemptsModel = new AttemptsModel();
        // отображаем нашу страницу
        $this->view();
    }

    // объединяем в один массив
    protected function merge(): array
    {
        $this->cars = $this->carsModel->getCars();
        $this->attempts = $this->attemptsModel->getAttempts();

        foreach ($this->cars as &$car) {
            $carId = $car['id'];
            $car['attempts'] = [];
            // общая сумма всех заездов
            $resultSum = 0;

            foreach ($this->attempts as $attempt) {
                if ($carId === $attempt['id']) {
                    $result = $attempt['result'];
                    $resultSum += $result;
                    $car['attempts'][] = $result;
                }
            }

            $car['attempts'][] = $resultSum;
        }

        return $this->cars;
    }

    public function view()
    {
        $data = $this->merge();

        // отображение страницы с переданными данными
        includeView('layouts/main', compact('data'));
    }

}