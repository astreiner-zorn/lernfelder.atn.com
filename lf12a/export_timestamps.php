<?php

declare(strict_types=1);

// --- Robust gegen Header-/Output-Probleme ---
while (ob_get_level()) {
  ob_end_clean();
}
ob_start();
ini_set('display_errors', '0');     // keine Ausgaben vor PDF-Header
ini_set('log_errors', '1');

// --- Session & Zugriff ---
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
if (!isset($_SESSION['user_id'])) {
  header('Location: index.php?page=login');
  exit;
}

// --- Abhängigkeiten ---
require_once($_SERVER['DOCUMENT_ROOT'] . "/lf12a/includes/database.php");
require_once $_SERVER['DOCUMENT_ROOT'] . '/lf12a/includes/tcpdf/tcpdf.php';

// ---- Branding / Header/Footer ---------------------------------------------
class PDF extends TCPDF
{
  public string $brandTitle   = 'Stempelzeiten';
  public string $brandSubline = '';
  public string $logoPath     = '';         // optional: Pfad zu Logo
  public array  $brandRgb     = [45, 106, 79]; // #2d6a4f – Grün aus deiner Seite

  public function Header(): void
  {
    // Logo (optional)
    if ($this->logoPath && @is_readable($this->logoPath)) {
      $this->Image($this->logoPath, 15, 10, 18); // x,y,w
    }
    $this->SetY(12);
    $this->SetFont('dejavusans', 'B', 16);
    $this->SetTextColor($this->brandRgb[0], $this->brandRgb[1], $this->brandRgb[2]);
    $this->Cell(0, 8, $this->brandTitle, 0, 1, 'L', 0, '', 0);

    if ($this->brandSubline) {
      $this->SetFont('dejavusans', '', 9);
      $this->SetTextColor(60, 60, 60);
      $this->Cell(0, 6, $this->brandSubline, 0, 1, 'L');
    }
    // Linie unter Header
    $this->SetDrawColor($this->brandRgb[0], $this->brandRgb[1], $this->brandRgb[2]);
    $this->Line(15, $this->GetY() + 2, $this->getPageWidth() - 15, $this->GetY() + 2);
    $this->Ln(6);
  }
  public function Footer(): void
  {
    $this->SetY(-15);
    $this->SetFont('dejavusans', '', 8);
    $this->SetTextColor(120, 120, 120);
    $this->Cell(0, 10, 'Seite ' . $this->getAliasNumPage() . ' / ' . $this->getAliasNbPages(), 0, 0, 'C');
  }
}

// --- Filter einlesen (optional) ---
$userId = (int) $_SESSION['user_id'];
$start  = isset($_GET['start']) && $_GET['start'] !== '' ? $_GET['start'] : null; // Y-m-d
$end    = isset($_GET['end'])   && $_GET['end']   !== '' ? $_GET['end']   : null;

$validDate = function ($v) {
  $dt = DateTime::createFromFormat('Y-m-d', (string)$v);
  return $dt && $dt->format('Y-m-d') === $v;
};
if ($start && !$validDate($start)) $start = null;
if ($end   && !$validDate($end))   $end   = null;
if ($start && $end && $start > $end) {
  [$start, $end] = [$end, $start];
}

// --- Daten laden ---
$where = "WHERE user_id = :uid";
if ($start) {
  $where .= " AND login_date >= :start";
}
if ($end) {
  $where .= " AND login_date <= :end";
}

$sql = "
  SELECT id, login_date, login_time, logout_date, logout_time
  FROM lf12a_timestamps
  $where
  ORDER BY login_date DESC, login_time DESC
";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':uid', $userId, PDO::PARAM_INT);
if ($start) {
  $stmt->bindValue(':start', $start);
}
if ($end) {
  $stmt->bindValue(':end',   $end);
}
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// --- Format-Helfer ---
$fmtDate = fn($v) => $v ? (new DateTime($v))->format('d.m.Y') : '—';
$fmtTime = fn($v) => $v ? (new DateTime($v))->format('H:i:s') : '—';

$username = $_SESSION['user'] ?? ('User-ID ' . $userId);
$period   = ($start || $end)
  ? 'Zeitraum: ' . ($start ? (new DateTime($start))->format('d.m.Y') : '—') . ' bis ' . ($end ? (new DateTime($end))->format('d.m.Y') : '—')
  : 'Zeitraum: alle Einträge';

// --- Farben & Styles ---
$brandHex     = '#2d6a4f';
$theadBg      = $brandHex;
$theadText    = '#ffffff';
$rowOddBg     = '#ffffff';
$rowEvenBg    = '#f6fbf8';
$borderColor  = '#c9d4cd';

// --- Tabelle rendern ---
$html = '
<style>
  body { font-family: DejaVu Sans; font-size: 10pt; color: #222; }
  table.tbl { width: 100%; border-collapse: collapse; }
  .tbl th, .tbl td { border: 1px solid ' . $borderColor . '; padding: 6px 8px; vertical-align: middle; }
  .tbl thead th { background: ' . $theadBg . '; color: ' . $theadText . '; font-weight: bold; font-size: 10pt; }
  .right { text-align: right; }
  .center { text-align: center; }
  .muted { color: #666; }
</style>

<table class="tbl">
  <thead>
    <tr>
      <th style="width:20%">Login-Datum</th>
      <th style="width:18%">Login-Zeit</th>
      <th style="width:20%">Logout-Datum</th>
      <th style="width:18%">Logout-Zeit</th>
      <th style="width:24%">Dauer</th>
    </tr>
  </thead>
  <tbody>
';

$rowsHtml = '';
$i = 0;
$totalSeconds = 0;

if ($rows) {
  foreach ($rows as $r) {
    $i++;
    $bg = ($i % 2 === 0) ? $rowEvenBg : $rowOddBg;

    // Dauer berechnen
    $durStr = '—';
    if (!empty($r['login_date']) && !empty($r['login_time']) && !empty($r['logout_date']) && !empty($r['logout_time'])) {
      $startDT = new DateTime($r['login_date'] . ' ' . $r['login_time']);
      $endDT   = new DateTime($r['logout_date'] . ' ' . $r['logout_time']);
      if ($endDT >= $startDT) {
        $diff = $endDT->getTimestamp() - $startDT->getTimestamp();
        $totalSeconds += $diff;
        $hours = floor($diff / 3600);
        $mins  = floor(($diff % 3600) / 60);
        $secs  = $diff % 60;
        $durStr = sprintf('%02d:%02d:%02d', $hours, $mins, $secs);
      }
    }

    $rowsHtml .= '
    <tr style="background: ' . $bg . ';">
      <td>' . $fmtDate($r['login_date']) . '</td>
      <td>' . $fmtTime($r['login_time']) . '</td>
      <td>' . $fmtDate($r['logout_date']) . '</td>
      <td>' . $fmtTime($r['logout_time']) . '</td>
      <td class="center">' . $durStr . '</td>
    </tr>';
  }

  $th = floor($totalSeconds / 3600);
  $tm = floor(($totalSeconds % 3600) / 60);
  $ts = $totalSeconds % 60;
  $sumStr = sprintf('%02d:%02d:%02d', $th, $tm, $ts);
  $rowsHtml .= '
  <tr>
    <td colspan="4" class="right"><strong>Summe</strong></td>
    <td class="center"><strong>' . $sumStr . '</strong></td>
  </tr>';
} else {
  $rowsHtml .= '<tr><td colspan="5" class="center muted">Keine Einträge gefunden.</td></tr>';
}

$html .= $rowsHtml . '</tbody></table>';

// --- PDF erzeugen ---
$pdf = new PDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->brandSubline = 'Benutzer: ' . ($username) . '  |  ' . $period . '  |  Erstellt: ' . (new DateTime())->format('d.m.Y H:i:s');
$pdf->setPrintHeader(true);
$pdf->setPrintFooter(true);
$pdf->SetMargins(15, 35, 15);       // Platz für Header lassen
$pdf->SetAutoPageBreak(true, 20);
$pdf->AddPage('P');
$pdf->SetFont('dejavusans', '', 10);
$pdf->writeHTML($html, true, false, true, false, '');

// Dateiname mit Zeitraum
$filename = 'stempelzeiten';
if ($start || $end) {
  $filename .= '_' . ($start ? (new DateTime($start))->format('Ymd') : 'open')
    . '-' . ($end   ? (new DateTime($end))->format('Ymd')   : 'open');
}
$filename .= '.pdf';

// --- WICHTIG: Output-Buffer leeren, dann senden ---
ob_end_clean();
$pdf->Output($filename, 'D');  // 'D' = Download, 'I' = inline
exit;
