<?php

    try{
        $pdo = new PDO("mysql:dbname=projeto_ordenar;host=localhost", "root", "kodejifr");
    } catch(PDOException $e) {
        echo "ERRO: ".$e->getMessage();
        exit;
    }
?>

<form action="" method="GET">
    <select name="ordem" id="">
        <option></option>
        <option value="nome">Por nome</option>
        <option value="idade">Por idade</option>
    </select>
</form>

<table border="1" width="400">
    <tr>
        <th>Nome</th>
        <th>Idade</th>
    </tr>
    <?php
        $sql = "SELECT * FROM usuarios"; //consulta a tabela usuarios
        $sql = $pdo->query($sql); //executa a consulta
        if($sql->rowCount() > 0) { //se tiver mais de uma linha

            foreach($sql->fetchAll() as $usuario): //faz um loop nas linhas
                ?>
                <tr>
                    <td><?php echo $usuario['nome']; ?></td>
                    <td><?php echo $usuario['idade']; ?></td>
                <?php
            endforeach;
        }
    ?>
</table>