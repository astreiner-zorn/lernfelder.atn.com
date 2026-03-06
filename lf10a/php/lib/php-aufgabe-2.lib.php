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
    <div class="content-content">
        <div class="code-section">
            <?php if($_POST['zahl'] % 2 == 0): ?>
                <p>Die Zahl <?php echo $_POST['zahl']; ?> ist <span style="font-weight: 700; color: green;">gerade</span>.</p>
            <?php else: ?>
                <p>Die Zahl <?php echo $_POST['zahl']; ?> ist <span style="font-weight: 700; color: red;">ungerade</span>.</p>
            <?php endif; ?>
        
        </div>
    </div>
<?php endif; ?>