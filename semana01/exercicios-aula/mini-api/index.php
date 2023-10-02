<?php
//json_decode transforma em string
//json_encode transforma em json

//O header() olha para o header da 
//requisição
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");


//O comando json_ecode() transforma 
//o que está dentro dos parênteses 
//em json

$methods = $_SERVER['REQUEST_METHOD'];

if ($methods == "GET") {
    //Esse comando le um arquivo de texto
    $result = file_get_contents("database.txt");
    $data = json_encode($result);
    
    echo json_encode(['message' => $data]);
} else if ($methods == "POST") {
    $body = file_get_contents("php://input");
    $data = json_decode($body);


    //O empty verifica se um determinado campo
    //tem algum valor 
    if (isset($data->nome) === false || empty($data->nome)) {
        header('HTTP/1.1 400 Bad Request');

        echo json_encode(['message' => 'Erro ao cadastrar o produto!']);
    } else {
        //ler arquivo
        $text = file_get_contents("database.txt");
        $arrayItens = json_decode($text);

        $arrayItens[] = $data;

        file_put_contents('database.txt', json_encode($arrayItens));

        header('HTTP/1.1 201');
        echo json_encode(['message' => 'Salvo com sucesso!']);
    }
}
