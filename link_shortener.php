<?php

$db = new PDO("mysql:host=localhost;dbname=link_shortener;charset=utf8", "your_username", "your_password");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function generateShortUrl($length = 6) {
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$str = '';
for ($i = 0; $i < $length; $i++) {
$str .= $characters[random_int(0, strlen($characters) - 1)];
}
return $str;
}

if (array_key_exists('long_url', $_POST) && !empty($_POST['long_url'])) {
$longUrl = $_POST['long_url'];

$stmt = $db->prepare("SELECT * FROM links WHERE short_url = :short_url");
$stmt->bindParam(':short_url', $shortUrl);
$stmt->execute();

if ($stmt->rowCount() > 0) {
$error = "Custom short URL is not available. Please choose another.";
} else {
$shortUrl = generateShortUrl();
}
} else {
$shortUrl = generateShortUrl();
}

$stmt = $db->prepare("INSERT INTO links (long_url, short_url) VALUES (:long_url, :short_url)");
$stmt->bindParam(':long_url', $longUrl);
$stmt->bindParam(':short_url', $shortUrl);
$stmt->execute();

$shortenedURL = "http://localhost/link-shortener/" . $shortUrl;
echo $shortenedURL;
?>
