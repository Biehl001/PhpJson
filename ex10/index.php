<?php

$historico = json_decode(file_get_contents("consultas.json"),true);

$endereco = null;

if(isset($_POST['buscar'])){

$cep = $_POST['cep'];

$url = "https://viacep.com.br/ws/$cep/json/";

$resposta = file_get_contents($url);

$dados = json_decode($resposta,true);

if(!isset($dados['erro'])){

$endereco = $dados;

$consulta = [
"cep"=>$cep,
"logradouro"=>$dados['logradouro'],
"bairro"=>$dados['bairro'],
"cidade"=>$dados['localidade'],
"estado"=>$dados['uf'],
"data"=>date("d/m/Y H:i")
];

$historico[] = $consulta;

file_put_contents("consultas.json", json_encode($historico,JSON_PRETTY_PRINT));

}

}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>

<body>

<h1>Consulta CEP</h1>

<form method="POST">

<input type="text" name="cep" placeholder="Digite o CEP">
<button name="buscar">Buscar</button>

</form>

<?php if($endereco){ ?>

<div class="box">

<p><?=$endereco['logradouro']?></p>
<p><?=$endereco['bairro']?></p>
<p><?=$endereco['localidade']?></p>
<p><?=$endereco['uf']?></p>

</div>

<?php } ?>

<h2>Histórico</h2>

<?php

foreach($historico as $h){

echo "<p>".$h['cep']." - ".$h['cidade']." - ".$h['data']."</p>";

}

?>

</body>
</html>