<?php 
session_start();
?>

<?php 
include 'conexao.php';

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$nasc = filter_input(INPUT_POST, 'nasc', FILTER_SANITIZE_STRING);
$AnoAtual= date('Y');
$AnoNasc= date('Y', strtotime($nasc));
$Idade = $AnoAtual - $AnoNasc;


$MesNasc  = date('m', strtotime($nasc));
$MesAtual = date('m');
$DiaNasc = date('d', strtotime($nasc));
$DiaAtual = date('d');

// if($MesAtual < $MesNasc != $DiaAtual < $DiaNasc){
//     $Idade = $Idade - 1;
// }$MesAtual > $MesNasc

if (($DiaAtual < $DiaNasc || $DiaAtual > $DiaNasc) && ($MesAtual < $MesNasc || $MesAtual > $MesNasc)){
     $Idade = $Idade - 1; 
}

echo'<pre>'.__FILE__.':'.__LINE__.'<br />';print_r($Idade);echo'</pre>';die();

 
    $result  = "INSERT INTO pessoa  (Nome, Nascimento)  VALUES ('$nome', '$nasc')"; 



        $insert = $PDO ->prepare($result);
        $insert->bindParam(':nome',$nome);
        $insert->bindParam(':data',$nasc);


   if($insert->execute()){


    $_SESSION['msg'] = "<p style='color:green;'>Registro enviado com sucesso</p>"; 
    header("location: index.php"); 
   }
else{
    $_SESSION['msg'] = "<p style='color:red;'>Seu registro não foi enviado com sucesso</p>"; 
    header("location: index.php"); 
}

 ?>

