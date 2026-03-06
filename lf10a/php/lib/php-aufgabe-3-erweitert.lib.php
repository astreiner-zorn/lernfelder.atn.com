<div class="header-picture">
    <img src="images/php.png" alt="PHP">
</div>

<div class="content-content">
    <div class="code-section">
        <?php
            $tag = date("l");
            $tage = [
                "Monday" => "Montag",
                "Tuesday" => "Dienstag",
                "Wednesday" => "Mittwoch",
                "Thursday" => "Donnerstag",
                "Friday" => "Freitag",
                "Saturday" => "Samstag",
                "Sunday" => "Sonntag"
            ];

            if ($tage[$tag] == "Samstag" || $tage[$tag] == "Sonntag") {
                echo "<strong>Ein schönes Wochenende</strong> - Heute ist " . $tage[$tag] . ".";
            } else {
                echo "<strong>Einen schönen Wochentag</strong> - Heute ist " . $tage[$tag] . ".";
            }
        ?>
    </div>
</div>