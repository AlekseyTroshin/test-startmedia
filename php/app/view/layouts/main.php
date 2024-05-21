<?php

/**
 * @var array $data
 * @var array $countAttempts
 * @var null|int $attemptActive
 */

?>

<?php includeView('parts/header'); ?>

    <div class="container mtb-20">
        <?php
        includeView('forms/races', compact('countAttempts', 'attemptActive'));
        includeView('tables/races', compact('data', 'countAttempts', 'attemptActive'));
        ?>
    </div>

<?php includeView('parts/footer'); ?>