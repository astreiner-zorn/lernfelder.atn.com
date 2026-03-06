


<div class="header-picture">
    <img src="images/php.png" alt="PHP">
</div>

<div class="content-content">
    <div class="section">
        <form method="POST" action="">
            <label for="zahl">Zahl</label>
            <input type="number" name="zahl">
    
            <button type="submit">Absenden</button>
            <button type="reset">Zurücksetzen</button>
        </form>
    </div>
</div>

<?php if (isset($_POST['zahl'])): ?>
    <?php
        $zahl = $_POST['zahl'];
        $verdoppeln = $zahl * 2;
    ?>

    <div class="content-content">
        <div class="section">
            <table class="code-table">
                <thead>
                    <tr>
                        <th>Zahl</th>
                        <th>Ausgabe</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Zahl:</td>
                        <td><?php echo $zahl; ?></td>
                    </tr>
                    <tr>
                        <td>Verdoppelt:</td>
                        <td><?php echo $verdoppeln; ?></td>
                    </tr>
            </table>
        </div>
    </div>
<?php endif; ?>