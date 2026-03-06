<form method="post" action="" id="reservationForm">
  <!-- Honeypot: Schutz gegen Bots -->
  <div style="position:absolute; left:-5000px;" aria-hidden="true">
    <label>Ihre Webseite <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
  </div>

  <div class="grid">
    <label>Vollständiger Name</label>
    <input type="text" name="full_name" required>
    
    <label>E‑Mail</label>
    <input type="email" name="email" required inputmode="email">

    <label>Telefon (Falls Rückfragen bestehen)</label>
    <input type="tel" name="phone" inputmode="tel">
   
    <label>Personen</label>
    <select name="guests" required>
      <?php for ($i=1; $i<=12; $i++): ?>
        <option value="<?= $i ?>" <?= (($_POST['guests'] ?? '') == $i ? 'selected':'') ?>><?= $i ?></option>
      <?php endfor; ?>
    </select>
    
    <label>Datum</label>
    <input type="date" name="res_date" required min="<?= date('Y-m-d') ?>">
    
    <!-- Dieser Teil soll dynamisch agieren - Uhrzeiten, in denen kein Tisch verfügbar ist, sollen nicht angezeigt werden - Dafür wäre eine Zusammenarbeit zwischen Datenbank, Formular und der Information, welche Reservierungen vorliegen notwendig --> 
    <label>Uhrzeit</label>
    
    <!-- Öffnungszeiten ggf. einschränken -->
    <select name="time" required>
      <?php for ($i=0; $i<=23; $i++): ?>
        <option value="<?= $i ?>" <?= (($_POST['time'] ?? '') == $i ? 'selected':'') ?>><?= $i ?>:00 Uhr</option>
      <?php endfor; ?>
    </select>
  </div>


  <label>
    Besondere Wünsche (optional)
    <textarea name="notes" rows="4"></textarea>
  </label>

  <button type="submit">Anfrage senden</button>
</form>