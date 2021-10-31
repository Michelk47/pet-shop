<?php 
session_start();
?>
<?php 
include 'conexao.php';

$sql = "SELECT * FROM Pessoa WHERE Cancelado IS NOT NULL";
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
    <table border="1px">
         <tr>
            <th>Codigo</th>
            <th>Nome</th>
            <th>Data de nascimento</th>
            <th>Excluido</th>
            <th>Ações</th>
        </tr>
        <?php foreach($rows as $k => $v) { ?>
        <tr>
            <td><?php echo $v['Codigo']?></td>
            <td><?php echo $v['Nome']?></td>
            <td><?php echo $v['Nascimento']?></td>
            <td><?php echo $v['Cancelado']?></td>
            <td>
                
            </td>
                
        </tr>
            <?php } ?>
        </table>
    </body>
</html>
