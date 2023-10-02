<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            background-color: rgb(28, 28, 28);
        }

        form{
            width: auto;
            height: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 200px;
            gap: 10px;
        }

        label{
            color: ghostwhite;
            font-size: 16px;
        }

        input{
            width: 300px;
            height: 35px;
            border-radius: 20px;
            outline: none;
        }

        button{
            width: 150px;
            height: 35px;
            border-radius: 20px;
            background-color: gold;
            color: ghostwhite;
            border: 2px solid ghostwhite;
            transition: all 0.5s;
            cursor: pointer;
        }

        button:hover{
            background-color: ghostwhite;
            color: gold;
            border: 2px solid gold;
        }
    </style>
    <title>Calcular Frete</title>
</head>
<body>
    <form action="./resultado.php" method="post">
        <label for="peso">
            Peso do produto: 
        </label>
        <input type="number" placeholder="Digite o peso do produto..." name="peso">

        <label for="peso">Peso do produto:        </label>
        <input type="number" placeholder="Digite a distância..." name="distancia">

        <button>Calcular</button>
    </form>
</body>
</html>