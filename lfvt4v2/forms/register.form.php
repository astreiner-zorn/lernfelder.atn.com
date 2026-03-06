<form class="d-grid pt-2" method="POST" action="">
    <div class="mb-3">
        <label for="benutzername" class="form-label">Benutzername</label>
        <input type="text" id="benutzername" name="benutzername" class="form-control">
    </div>
    <div class="mb-3">
        <label for="passwort" class="form-label">Passwort</label>
        <input type="password" id="passwort" name="passwort" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="passwort_wdh" class="form-label">Passwort wiederholen</label>
        <input type="password" id="passwort_wdh" name="passwort_wdh" class="form-control" required>
    </div>
    <div class="row">
        <div class="col-auto">
            <button type="submit" class="btn btn-success">Registrieren</button>
        </div>
        <div class="col-auto">
            <button type="reset" class="btn btn-danger">Zurücksetzen</button>
        </div>
        <div class="col-auto">
            <a href="index.php?page=login" class="btn btn-warning">Zurück zur Anmeldung</a>
        </div>
    </div>
</form>