<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Ejercicio 1</title>
</head>
<body>
    <div class="container">
        <h1>Ejercicio 1</h1>
        <form method="post"> 
            <input type="submit" name="export" value="Exportar JSON"/>       
        </form> 
    </div>
</body>
</html>

<?php

if(isset($_POST['export'])) { 
    getAPI();
}


function getAPI(){
    $url = "https://my-json-server.typicode.com/dp-danielortiz/dptest_jsonplaceholder/items";

    $res = json_decode(file_get_contents($url), true);

    $r = array_filter($res, function($var){
        return ($var['color'] == "green");
    });

    $json = json_encode($r);
    
    print_r($json);
    exportFile($json);
}

function exportFile($data){
    $fp = fopen('Respuesta1.json', 'w');
    fwrite($fp, $data);
    fclose($fp);
}

?>