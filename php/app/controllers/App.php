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

        foreach ($this->cars as $key => &$car) {
            $carId = $car['id'];
            $car['num'] = $key;
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

    // получаем количество попыток
    protected function getCountAttempts(array $data): int
    {
        return count($data[1]['attempts']) - 1;
    }

    // сортируем массивив по результатам вложенного массива(attempts)
    protected function sortResult(array $data, int $attempt): array
    {
        usort($data, function ($a, $b) use ($attempt) {
            return $b['attempts'][$attempt] - $a['attempts'][$attempt];
        });
        return $data;
    }

    public function view()
    {
        $data = $this->merge();
        $countAttempts = $this->getCountAttempts($data);
        // проверяем что пришло из формы
        $attemptActive = array_keys($_POST)[0] ?? null;

        // если пришёл не null то сортируем массив
        if (isset($attemptActive)) {
            $data = $this->sortResult($data, $attemptActive);
        }

        // отображение страницы с переданными данными
        includeView('layouts/main', compact('data', 'countAttempts', 'attemptActive'));
    }

}