<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    return;
}

if (!isset($_POST['email'])) {
    return;
}
$to = $_POST['email'];
$subject = 'Newsletter';
$message = "Liebe Buchliebhaber,

wir freuen uns, Ihnen mitteilen zu können, dass unser Online-Buchladen jetzt einen brandneuen E-Mail-Abonnement-Service anbietet! Wenn Sie sich anmelden, erhalten Sie regelmäßig Informationen über unsere neuesten Buchveröffentlichungen, exklusive Angebote und spannende Veranstaltungen.
Als Dankeschön für Ihr Abonnement möchten wir Ihnen einen Rabatt von 10 % auf Ihren nächsten Einkauf gewähren. Verwenden Sie einfach den Code \"SUBSCRIBE10\" an der Kasse, um Ihren Rabatt einzulösen.

Wir sind stolz darauf, eine große Auswahl an qualitativ hochwertigen Büchern aus verschiedenen Genres anbieten zu können, von Bestseller-Romanen bis hin zu wissenschaftlichen Lehrbüchern. Wenn Sie sich in unsere E-Mail-Liste eintragen, erfahren Sie als Erste/r von unseren Neuerscheinungen sowie von anstehenden Verkäufen und Sonderangeboten.

Warum also warten? Melden Sie sich noch heute an und werden Sie Teil unserer Gemeinschaft von Buchliebhabern! Geben Sie einfach Ihre E-Mail-Adresse auf unserer Website ein, und schon sind Sie dabei. Vergessen Sie nicht, Ihren Posteingang auf eine Bestätigungs-E-Mail zu überprüfen, und wenn Sie Fragen haben, können Sie sich gerne an unser freundliches Kundendienstteam wenden.
Vielen Dank für Ihre Unterstützung und viel Spaß beim Lesen!

Mit freundlichen Grüßen,
Das Book Store-Team";
$headers = 'From: bookstore@bookstore.com' . "\r\n" .
    'Reply-To: bookstore@bookstore.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

header("Location: /~grp1.4f/");
die();