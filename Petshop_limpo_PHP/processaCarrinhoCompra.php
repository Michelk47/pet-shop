<?php  
$produto = $_GET["id"];





?>

<script>
var contador=0;
var filtro='';

for(var i in localStorage) 
{
    if(i.startsWith('carrinho:')){
        console.log(i);
        filtro=filtro+localStorage[i]+',';
        contador++;
    }
     console.log(localStorage[i]);
     console.log(i);
}


localStorage.setItem(`carrinho:${contador}`, <?php echo $produto ?>);
filtro=filtro+<?php echo $produto ?>;
window.location.href ="meupedido.php?filtro="+filtro;
</script>