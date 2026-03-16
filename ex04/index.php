<?php
$endereco = null;
$erro = "";

if(isset($_POST['buscar'])){
    $cep = trim($_POST['cep']);

    if($cep == ""){
        $erro = "Digite um CEP.";
    }else{

        $url = "https://viacep.com.br/ws/$cep/json/";
        $resposta = file_get_contents($url);
        $dados = json_decode($resposta, true);

        if(isset($dados['erro'])){
            $erro = "CEP não encontrado.";
        }else{
            $endereco = $dados;
        }

    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>

<body>

<h1>Buscar Endereço por CEP</h1>

<form method="POST">
<input type="text" name="cep" placeholder="Digite o CEP">
<button name="buscar">Buscar</button>
</form>

<p><?=htmlspecialchars($erro)?></p>

<?php if($endereco){ ?>

<div class="box">
<p><b>Rua:</b> <?=htmlspecialchars($endereco['logradouro'])?></p>
<p><b>Bairro:</b> <?=htmlspecialchars($endereco['bairro'])?></p>
<p><b>Cidade:</b> <?=htmlspecialchars($endereco['localidade'])?></p>
<p><b>Estado:</b> <?=htmlspecialchars($endereco['uf'])?></p>
</div>

<?php } ?>

</body>
</html>