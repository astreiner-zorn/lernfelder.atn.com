<form class="d-grid pt-2" method="POST" action="">
    <div class="mb-3">
        <label for="username" class="form-label">Benutzername</label>
        <input type="text" id="username" name="username" class="form-control">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Passwort</label>
        <input type="password" id="password" name="password" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="password_wdh" class="form-label">Passwort wiederholen</label>
        <input type="password" id="password_wdh" name="password_wdh" class="form-control" required>
    </div>
    <div class="row">
        <div class="col-auto">
            <button type="submit" class="btn btn-success">Registrieren</button>
        </div>
        <div class="col-auto">
            <a href="index.php?page=login" class="btn btn-warning">Zurück zur Anmeldung</a>
        </div>
    </div>
</form>