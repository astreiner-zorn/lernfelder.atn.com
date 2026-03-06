<?php if ($sql): ?>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/lfvt4v2/includes/sql-query.php"); ?>
    <h4 class="pb-2 border-bottom">Datenbankabfrage</h4>
    <pre class="mt-3"><code class="language-sql"><?php echo $sql; ?></code></pre>
    <h4 class="pb-2 border-bottom">Ergebnisse</h4>
<?php else: ?>
    <h4 class="pb-2 border-bottom"><?php echo $pageTitle; ?></h4>
<?php endif; ?>

</div>