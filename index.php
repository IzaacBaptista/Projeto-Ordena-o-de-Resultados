<?php

    try{
        $pdo = new PDO("mysql:dbname=projeto_ordenar;host=localhost", "root", "kodejifr");
    } catch(PDOException $e) {
        echo "ERRO: ".$e->getMessage();
        exit;
    }
?>

<form action="" method="GET">
    <select name="ordem" id="" onchange="this.form.submit()"> //onchange atualiza a página quando selecionado
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
        
        if(isset($_GET['ordem']) && empty($_GET['ordem']) == false){ //se existir o parâmetro ordem e não for vazio
            $ordem = addslashes($_GET['ordem']); //addslashes para evitar SQL Injection
            $sql = "SELECT * FROM usuarios ORDER BY ".$ordem; //ORDER BY nome
        } else { //se não existir o parâmetro ordem ou se for vazio
            $sql = "SELECT * FROM usuarios"; //se não existir o parâmetro ordem, listar todos os usuários
        }

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