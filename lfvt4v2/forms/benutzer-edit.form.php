<form class="d-grid pt-2" method="POST" action="">
    <div class="mb-3">
        <label for="benutzername" class="form-label">Benutzername</label>
        <input type="text" class="form-control" id="benutzername" name="benutzername" value="<?= htmlspecialchars($user['benutzername']); ?>" required>
    </div>
    <div class="mb-3">
        <label for="vorname" class="form-label">Vorname</label>
        <input type="text" class="form-control" id="vorname" name="vorname" value="<?= htmlspecialchars($user['vorname']); ?>" required>
    </div>
    <div class="mb-3">
        <label for="nachname" class="form-label">Nachname</label>
        <input type="text" class="form-control" id="nachname" name="nachname" value="<?= htmlspecialchars($user['nachname']); ?>" required>
    </div>
    <div class="row">
        <div class="col-auto">
            <button type="submit" class="btn btn-success">Speichern</button>
        </div>
        <div class="col-auto">
            <button type="reset" class="btn btn-danger">Zurücksetzen</button>
        </div>
    </div>
</form>