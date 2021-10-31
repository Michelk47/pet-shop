<?php 
include 'conexao.php';
//////// SELECT /////////////
               
                        
                





$sql = "SELECT * FROM Pessoa WHERE Cancelado IS NULL";
$result = $PDO->query( $sql );
$rows = $result->fetchAll();
 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta id= "viewport" name="viewport" content="width=device-width, initial-scale=1">
    <title>Tabela MySQL</title>
<body>
    <button type="button"><a href="inserir2.php">Inserir</a></button>   <a href="lixeira.php">Lixeira</a><br><br>


    <table border="1px">
        <tr>
            <th>Codigo</th>
            <th>Nome</th>
            <th>Data de nascimento</th>
            <th>Idade</th>
            <th>Ações</th>
        </tr>
        <?php foreach($rows as $k => $v) { ?>
        <tr>
            <td><?php echo $v['Codigo']?></td>
            <td><?php echo $v['Nome']?></td>
            <td><?php echo date('d/m/Y', strtotime($v['Nascimento']));?></td>

            <?php date('d/m/Y', strtotime($v['Nascimento']));?></td>
           
            <td>
                
            </td>
  

            <td>
                <input type="button" onclick="deletar(<?php echo $v ['Codigo'];?>)" name= "dele"  value="deletado"/>
                <button type="button" id="editar"><a href="editar2.php?Codigo=<?php echo $v['Codigo']; ?>&nome=<?php echo $v['Nome']; ?>">editar</a></button>
            </td>
        </tr>

        





        <?php } ?>

        <script>
            function deletar(Codigo){
                if(confirm("Realmente deseja excluir esse registro ?")){
                    window.location.href='deletar.php?Codigo=' +Codigo+'';
                    return true;
                }
               
            }

        </script>
    </body>
</html>

