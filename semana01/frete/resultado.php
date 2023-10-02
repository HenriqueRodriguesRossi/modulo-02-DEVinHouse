<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    <?php 
        $peso = filter_input(INPUT_POST, "peso", FILTER_VALIDATE_FLOAT);


        $distancia = filter_input(INPUT_POST, "distancia", FILTER_VALIDATE_FLOAT);

        if(!$peso || !$distancia){
            header("Location: calculoFrete.php");
        }else{
            $resultado = ($peso * 0.80) + ($distancia * 0.20);

            echo "O valor do frete ficou em R$ $resultado";
        }
    ?>
</body>
</html>