<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabuada</title>
</head>
<body>
    <?php 
        $number = $_REQUEST["number"];

        if(!$number || $number > 10 || $number < 1){
            echo "<p>Digite um número válido!</p>";
        }else{
            for($contador = 1; $contador <= 10; $contador ++){
                $resultado = $contador * $number;

                echo "<p>$contador x $number =  $resultado</p> <br/>";
            }
        }
    ?>
</body>
</html>