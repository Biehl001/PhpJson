<?php

$url="https://jsonplaceholder.typicode.com/users";

$resposta=file_get_contents($url);

$usuarios=json_decode($resposta,true);

?>

<html>
<head>
<link rel="stylesheet" href="style.css">
</head>

<body>

<h1>Usuários</h1>

<?php
foreach($usuarios as $user){

echo "<div class='user'>";

echo "<h3>".$user['name']."</h3>";
echo "<p>Email: ".$user['email']."</p>";
echo "<p>Telefone: ".$user['phone']."</p>";
echo "<p>Cidade: ".$user['address']['city']."</p>";

echo "</div>";

}
?>

</body>
</html>