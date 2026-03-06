<div class="header-picture">
    <img src="images/php.png" alt="PHP">
</div>

<div class="content-content">
    <div class="code-section">
        <?php
            $tag = date("n");
            if ($tag == "6" || $tag == "7") {
                echo "<strong>Ein schönes Wochenende</strong>.";
            } else {
                echo "<strong>Einen schönen Wochentag</strong>.";
            }
        ?>
    </div>
</div>