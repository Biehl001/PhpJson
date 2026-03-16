<?php

$msg="";

if(isset($_POST['cadastrar'])){

$nome = trim($_POST['nome']);
$idade = trim($_POST['idade']);
$curso = trim($_POST['curso']);

if($nome && $idade && $curso){

$novoAluno = [
"nome"=>$nome,
"idade"=>$idade,
"curso"=>$curso
];

$json = file_get_contents("alunos.json");
$dados = json_decode($json,true);

$dados[] = $novoAluno;

file_put_contents("alunos.json", json_encode($dados, JSON_PRETTY_PRINT));

$msg="Aluno cadastrado com sucesso";

}else{
$msg="Preencha todos os campos";
}

}

?>

<html>
<head>
<link rel="stylesheet" href="style.css">
</head>

<body>

<h1>Cadastrar Aluno</h1>

<p><?=htmlspecialchars($msg)?></p>

<form method="POST">

<input type="text" name="nome" placeholder="Nome"><br>
<input type="number" name="idade" placeholder="Idade"><br>
<input type="text" name="curso" placeholder="Curso"><br>

<button name="cadastrar">Cadastrar</button>

</form>

</body>
</html>