<?php

$pais = null;
$erro = "";

if(isset($_POST['buscar'])){

$nome = trim($_POST['pais']);

$url = "https://restcountries.com/v3.1/name/$nome";

$resposta = @file_get_contents($url);

if($resposta){
$dados = json_decode($resposta,true);
$pais = $dados[0];
}else{
$erro = "País não encontrado";
}

}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>

<body>

<h1>Buscar País</h1>

<form method="POST">

<input type="text" name="pais" placeholder="Digite o país">
<button name="buscar">Buscar</button>

</form>

<p><?=htmlspecialchars($erro)?></p>

<?php if($pais){ ?>

<div class="box">

<h2><?=$pais['name']['official']?></h2>

<p><b>Capital:</b> <?=$pais['capital'][0]?></p>

<p><b>Região:</b> <?=$pais['region']?></p>

<p><b>População:</b> <?=$pais['population']?></p>

<img src="<?=$pais['flags']['png']?>" width="120">

</div>

<?php } ?>

</body>
</html>