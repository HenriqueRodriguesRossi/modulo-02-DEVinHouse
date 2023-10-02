<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

$methods = $_SERVER["REQUEST_METHOD"];

function sanitizeInput($data, $property, $filterType) {
    return isset($data->$property) ? filter_var($data->$property, $filterType) : null;
}

if ($methods === "POST") {
    $body = file_get_contents("php://input");
    $data = json_decode($body);

    $nome = sanitizeInput($data, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $idade = sanitizeInput($data, 'idade', FILTER_SANITIZE_NUMBER_INT);
    $curso = sanitizeInput($data, 'curso', FILTER_SANITIZE_SPECIAL_CHARS);
    $valor = sanitizeInput($data, 'valor', FILTER_SANITIZE_NUMBER_FLOAT);
    $prazo = sanitizeInput($data, 'prazo', FILTER_SANITIZE_NUMBER_FLOAT);

    if($valor === null || $prazo === null) {
        http_response_code(400);
        echo json_encode(['message' => 'Erro ao efetuar o empréstimo!']);
    }else if($idade < 18){
        http_response_code(400);
        echo json_encode([
            'message'=>'Espere até ter 18 anos para fazer um empréstimo!'
        ]); 
    } else if($idade >=18 && $idade <= 25){
        $taxa = 1 / 100;
        $juros = $valor * $taxa * $prazo;
        $total = $valor + $juros;
        $parcela = $total / $prazo;

        if(file_exists("$nome.txt")){
            http_response_code(409);

            echo json_encode(['mensagem' => 'Empréstimo já efetuado para esse aluno!']);
        }else{
            file_put_contents("$nome.txt", "NOME: $nome, \n IDADE: $idade,\n CURSO: $curso, \n VALOR: $valor, \n PRAZO PARA PAGAR: $prazo.\n");

            echo json_encode([
                'juros' => number_format($juros, 2),
                'montante-total' => number_format($total, 2),
                'valor-parcela'=> number_format($parcela, 2)
            ]);
        }
    }else{
        $taxa = 1.5 / 100;
        $juros = $valor * $taxa * $prazo;
        $total = $valor + $juros;
        $parcela = $total / $prazo;

        if(file_exists("$nome.txt")){
            http_response_code(409);

            echo json_encode(['mensagem' => 'Empréstimo já efetuado para esse aluno!']);
        }else{
            file_put_contents("$nome.txt", "NOME: $nome, \n IDADE: $idade,\n CURSO: $curso, \n VALOR: $valor, \n PRAZO PARA PAGAR: $prazo.\n");

            echo json_encode([
                'juros' => number_format($juros, 2),
                'montante-total' => number_format($total, 2),
                'valor-parcela'=> number_format($parcela, 2)
            ]);
        }
        
    }
} else {
    http_response_code(400);
    echo json_encode(['mensagem' => 'Impréstimo negado!']);
}