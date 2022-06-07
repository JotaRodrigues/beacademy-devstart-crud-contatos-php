    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<?php

    $url = explode('?',$_SERVER['REQUEST_URI']);

    include 'pages/menu.html';
    include 'acoes.php';
    
    echo match($url[0]){
        '/' => home(),
        '/login' => login(),
        '/cadastro' => cadastro(),
        '/lista' => lista(),
        '/excluir' => excluir(),
        '/editar' => editar(),
        default => erro404(),
    }
    
?>