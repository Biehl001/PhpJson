<?php

// URL da API
$url = "https://jsonplaceholder.typicode.com/posts";

// busca os dados da API
$resposta = file_get_contents($url);

// converte o JSON para array
$posts = json_decode($resposta, true);

// contador para limitar os posts
$contador = 0;

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Lista de Posts</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<h1>Posts da API</h1>

<?php

// percorre todos os posts
foreach($posts as $post){

// desafio extra: mostrar apenas userId = 1
if($post['userId'] == 1){

// limitar a 10 posts
if($contador >= 10){
break;
}

?>

<div class="post">

<h3>ID do Post: <?php echo $post['id']; ?></h3>

<h2><?php echo $post['title']; ?></h2>

<p><?php echo $post['body']; ?></p>

</div>

<?php

$contador++;

}

}

?>

</body>
</html>