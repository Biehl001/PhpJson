<?php

$url = "https://jsonplaceholder.typicode.com/users";

$resposta = file_get_contents($url);

$usuarios = json_decode($resposta,true);

file_put_contents("usuarios_api.json", json_encode($usuarios, JSON_PRETTY_PRINT));

echo "Usuários salvos no arquivo JSON";
echo "<br><a href='listar.php'>Ver usuários</a>";

?>