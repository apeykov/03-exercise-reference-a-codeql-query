<?php
// Intentionally vulnerable fixture for security scanning. Do not deploy.
$db = new PDO('sqlite::memory:');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->exec('CREATE TABLE users (id INTEGER PRIMARY KEY, name TEXT NOT NULL)');
$db->exec("INSERT INTO users (name) VALUES ('Alice'), ('Bob')");

$name = $_GET['name'] ?? '';
$query = "SELECT name FROM users WHERE name = '$name'";
$users = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>AI Scan test fixture</title>
  </head>
  <body>
    <h1>Search for: <?= $name ?></h1>
    <ul>
      <?php foreach ($users as $user): ?>
        <li><?= $user['name'] ?></li>
      <?php endforeach; ?>
    </ul>
  </body>
</html>
