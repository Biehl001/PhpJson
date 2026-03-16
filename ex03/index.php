<?php

// lê o arquivo JSON
$json = file_get_contents("alunos.json");

// converte JSON para array PHP
$alunos = json_decode($json, true);

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Lista de Alunos</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<h1>Alunos Cadastrados</h1>

<table>

<tr>
<th>Nome</th>
<th>Idade</th>
<th>Curso</th>
</tr>

<?php

// percorre todos os alunos
foreach($alunos as $aluno){

echo "<tr>";
echo "<td>".htmlspecialchars($aluno['nome'])."</td>";
echo "<td>".htmlspecialchars($aluno['idade'])."</td>";
echo "<td>".htmlspecialchars($aluno['curso'])."</td>";
echo "</tr>";

}

?>

</table>

</body>
</html>