<?php
$json = file_get_contents("produtos.json");
$produtos = json_decode($json, true);
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Lista de Produtos</h1>

<?php
foreach($produtos as $produto){
    echo "<div class='produto'>";
    echo "<h3>".$produto['nome']."</h3>";
    echo "<p>Preço: R$ ".$produto['preco']."</p>";
    echo "<p>Categoria: ".$produto['categoria']."</p>";
    echo "</div>";
}
?>

</body>
</html>