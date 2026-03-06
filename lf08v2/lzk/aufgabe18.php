<h2 class="section-title">L3: While mit break</h2>

<div class="aufgabe">
<h3 class="lession-title">Aufgabe #18</h3>
<p>Folgender Code Ausschnitt ist gegeben:</p>
<pre><code class="language-java">int count = 1;
while (count < 8) {
	System.out.print(count);
	count++;
	if (count >= 7) break;
	System.out.print(", ");
}</code></pre>
<p>Welche Ausgabe ist zu erwarten?</p>
<?php echo $section_beginn; ?>
<ol>
    <li>1, 2, 3, 4, 5, 6, 7, 8,</li>
    <li>1, 2, 3, 4, 5, 6, 7, 8</li>
    <li>1, 2, 3, 4, 5, 6</li>
    <li>1, 2, 3, 4, 5, 6, 7</li>
</ol>
<?php echo $section_ende; ?>
</div>

<div class="loesung">
<h3 class="lession-title">Lösung</h3>
<?php echo $section_beginn; ?>
<ul>
    <li>1, 2, 3, 4, 5, 6</li>
</ul>
<?php echo $section_ende; ?>
</div>