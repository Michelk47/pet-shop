<?php 
include 'conexaopet.php';
//////// SELECT /////////////
               
                        
$produto = $_GET["filtro"];  

if (empty($produto)){
    echo "Seu carrinho está vazio";
}


//die($produto);


$sql = "select * from produto  AS p
inner join imagem AS i
on i.ID = p.Imagens
where p.id in ($produto)";
//die($sql);

$result = $PDO->query( $sql );
$produto = $result->fetchAll();

//echo'<pre>'.__FILE__.':'.__LINE__.'<br />';print_r($produto);echo'</pre>'die();

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

</script>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="carousel.css" rel="stylesheet">
    <title>Hello, world!</title>
</head>

<body background="bannerm.jpg">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link navbar-brand" href="index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Loja</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="servico.html">Serviço</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Meus Pedidos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cadastro.html">Cadastro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.html">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sobreroupa.html">Sobre Nós</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Produtos
                    </a>
                    <ul class="dropdown-menu row">

                        <li class="col-sm-4">
                            <h4>Gato</h4>
                            <a href="racao-gato.html">Rações</a>
                            <a href="bringato.html">Brinquedos</a>
                            <a href="roupa_gato.html">Roupas</a>
                        </li>

                        <li class="col-sm-4">
                            <h4>Cachorro</h4>
                            <a href="racao_dog.html">Rações</a>
                            <a href="brindog.html">Brinquedos</a>
                            <a href="roupa-dog.html">Roupas</a>
                        </li>

                        <li class="col-sm-4">
                            <h4>Aves</h4>
                            <a href="#">Rações</a>
                            <a href="#">Brinquedos</a>
                            <a href="#">Gaiolas</a>
                        </li>


                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <header>

        <div class="navbar navbar-dark bg-dark shadow-sm text-center">
            <div class="container d-flex justify-content-between text-center">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <img src="dog.png" width="50" height="50" />
                    <h4 class="text-center"><strong>Petshop </strong></h4>
                </a>
            </div>
        </div>
    </header>




    <h3 class="text-center text-warning">Lista de pedidos</h3>
   

    <table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">Codigo</th>
      <th scope="col">Imagem</th>
      <th scope="col">Produto</th>
      <th scope="col">Preço</th>
    </tr>
  </thead>
  <?php foreach($produto as $k => $v) { 
                
                ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo($v['id'])?>
      <td><img src= "<?php echo $v['Path']?>" class="img-fluid" alt="Imagem responsiva" width="80" height="80"></td>
      <td><?php echo utf8_encode($v['Nome'])?></td>
      <td>R$<?php echo str_replace('.',',',  number_format( $v['Preco'], 2))?></td>
      </th>
    </tr>
  </tbody>
  <?php } ?>
</table>
    <script type="text/javascript" src="assest/js/paulo/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="assest/js/paulo/jquery-popper.min.js"></script>
    <script type="text/javascript" src="assest/js/paulo/bootstrap.min.js"></script>

   