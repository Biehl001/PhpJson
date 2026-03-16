<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://jsonplaceholder.typicode.com/users");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$resposta = curl_exec($ch);

curl_close($ch);

$usuarios = json_decode($resposta,true);

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>

<body>

<h1>Usuários (cURL)</h1>

<?php

foreach($usuarios as $user){

echo "<div class='user'>";

echo "<h3>".$user['name']."</h3>";
echo "<p>".$user['email']."</p>";

echo "</div>";

}

?>

</body>
</html>