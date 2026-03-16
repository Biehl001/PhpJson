<?php

$json = file_get_contents("usuarios_api.json");

$usuarios = json_decode($json,true);

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>

<body>

<h1>Usuários Salvos</h1>

<?php

foreach($usuarios as $user){

echo "<div class='user'>";

echo "<h3>".$user['name']."</h3>";
echo "<p>".$user['email']."</p>";
echo "<p>".$user['phone']."</p>";
echo "<p>".$user['address']['city']."</p>";

echo "</div>";

}

?>

</body>
</html>