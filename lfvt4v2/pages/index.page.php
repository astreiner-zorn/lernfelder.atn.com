<?php
    $sql = "
    SELECT * FROM lfvt4v2_test
    ";
?>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/lfvt4v2/includes/middle.php"); ?>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Test #1</th>
            <th>Test #2</th>
            <th>Test #3</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['test1']) ?></td>
                <td><?= htmlspecialchars($row['test2']) ?></td>
                <td><?= htmlspecialchars($row['test3']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
