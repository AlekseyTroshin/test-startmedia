<?php

/**
 * @var int $countAttempts
 * @var null|int $attemptActive
 */

?>

<form action="/" method="post">
    <button type="submit" class="btn<?= $attemptActive === null ? ' active' : ''; ?>">Все</button>
    <?php for ($i = 0, $count = 1; $i < $countAttempts; $i++, $count++): ?>
        <button type="submit" name="<?= $i ?>" class="btn<?= $attemptActive === $i ? ' active' : ''; ?>">
            Попытка <?= $count ?>
        </button>
    <?php endfor; ?>
    <button type="submit" name="<?= $countAttempts ?>"
            class="btn<?= $attemptActive === $countAttempts ? ' active' : ''; ?>">Общее
    </button>
</form>

