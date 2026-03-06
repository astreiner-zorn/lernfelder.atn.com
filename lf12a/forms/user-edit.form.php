<form class="d-grid pt-2" method="POST" action="">
    <div class="mb-3">
        <label for="username" class="form-label">Benutzername</label>
        <input type="text" class="form-control" id="username" name="username" value="<?= htmlspecialchars($user['username']); ?>" required>
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