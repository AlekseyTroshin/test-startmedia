<?php

/**
 * @var array $data
 * @var array $countAttempts
 * @var null|int $attemptActive
 */

?>

<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>№</th>
        <th>ФИО</th>
        <th>Город</th>
        <th>Машина</th>
        <?php for ($i = 0, $count = 1; $i <= $countAttempts; $i++, $count++): ?>
            <th<?= $attemptActive === $i ? ' class="active"' : '' ?>> <?= $i !== $countAttempts ? 'Попытка ' . $count : 'Общее' ?></th>
        <?php endfor; ?>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $item):
        $attempts = $item['attempts'];
        $attemptsCount = count($attempts);
        ?>
        <tr>
            <td><?= $item['num'] ?></td>
            <td><?= $item['name'] ?></td>
            <td><?= $item['city'] ?></td>
            <td><?= $item['car'] ?></td>
            <?php foreach ($attempts as $key => $val): ?>
                <td<?= $attemptActive === $key ? ' class="active"' : '' ?>><?= $val ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
