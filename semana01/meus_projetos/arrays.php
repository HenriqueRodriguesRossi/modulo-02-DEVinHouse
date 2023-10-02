<?php 
    //exemplo 01
    $contacts = [
        (object)[
            'Linkedin' => 'Henrique Rossi',
            'GitHub' => 'HenriqueRodiguesRossi',
            'Phone' => '(11) 94372-4480',
        ]
    ];

    echo $contacts[0]->GitHub . "<br> <br>";

    //exemplo 2
    $testes = ["Teste 01", "Teste 02", "Teste 03", "Teste 04", ];

    foreach($testes as $teste){
        echo "<li>$teste</li>";
    }

    echo "<br>";

    //O unset() "destroi" a variável,
    //nesse casso seria bom para não
    //deixar a variável teste vazar 
    //do escopo do foreach (o PHP deixa usar
    //variáveis fora do seu escopo 
    unset($teste);

    // exemplo 3
    //O (object) transforma um array em 
    //objeto

    //Exemplo de um array multidimensional
    $object = [
        (object)[
            'nome'=> "Henrique",
            'sobrenome' => "Rossi"
        ],
        [
            'nome'=> "Maria",
            'sobrenome'=> "Rodrigues"
        ]
    ];

    echo $object[0]->sobrenome . " <br> ";

    $contador = 0;
    do{
        echo "Olá, Mundo! <br>";

        $contador ++;
    }while($contador < 7)
?>