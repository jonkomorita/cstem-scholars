<?php

$title = 'Applications';
$layout = 'admin/_layout.php';

helper('message_flash');
helper('application_status_label');
?>

<h1>Applications for Period: <?= Period::get($period)->beginDate ?></h1>

<?= messageFlash() ?>

<label for="periodID">Choose a period:</label>
<form id="periods" method="get">
<select id="periodID">
    <option value="1">Period 1</option>
    <option value="2">Period 2</option>
</select>
</form>

<table>
    <thead>
    <th>Student Name</th>
    <th>Title</th>
    <th>Status</th>
    </thead>

    <?php
    foreach ($applications as $a) {
        if ($a->periodID == $period) { ?>
            <tr>
                <td><?= e($a->name) ?></td>
                <td><?= HTML::link("../admin/applications.php?id={$a->id}", e($a->title)) ?></td>
                <td><?= applicationStatus($a) ?></td>
            </tr>
            <?php
        }
    } ?>
</table>
