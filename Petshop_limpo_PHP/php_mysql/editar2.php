<?php 
session_start();
?>

<?php 
    include 'conexao.php';
 $Id =  filter_input(INPUT_GET, 'Codigo', FILTER_SANITIZE_NUMBER_INT);

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta id= "viewport" name="viewport" content="width=device-width, initial-scale=1">
    <title>yçyiyi</title>
</head>
    <body>
    <?php 
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        $sql = "SELECT * FROM pessoa WHERE Codigo = $Id";
        $result = $PDO->query( $sql );
        $rows = $result->fetchAll();
    
    ?>
<?php foreach($rows as $k => $v) { ?>
        <form method="POST" action="editar.php">
            <input type="text" name="editar" value="<?php echo $v['Nome']; ?>"/><br><br>
            <input type="date" name="nasc" value="<?php echo $v['Nascimento']; ?>"/><br><br>
            <input type="submit" name="atualizar" value="atualizar"/>
            <input type="hidden" name="id" value="<?php echo $v['Codigo']; ?>"/>
        </form>
    </body>
<?php }?>
</html>

