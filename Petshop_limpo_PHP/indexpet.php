<?php 
include 'Login-PHP/conexao.php';
//////// SELECT /////////////
               
  

$sql = "select * from produto AS p
inner join imagem AS i
on i.ID = p.Imagens";
$result = $PDO->query( $sql );
$produto = $result->fetchAll();
 
?>


<!DOCTYPE html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="pet.css" rel="stylesheet">
    <title>Hello, world!</title>
  </head>
  <body background="bannerm.jpg">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="#"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link navbar-brand" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" >Loja</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="servico.html" >Serviço</a>
              </li>
              <li class="nav-item">
                
                <a class="nav-link" href="sobreroupa.html">Sobre Nós</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cadastro.html" >Cadastro</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.html" >Login</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="meupedido.php" > Meus Pedidos <img src="carrinho2.png" width="25" height="25"/></a>
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
                <img src="dog.png" width="50" height="50"/>
                <h4 class="text-center"><strong>Petshop </strong></h4>
              </a>
            </div>
          </div>
        </header>


        <section class="header-site">

            <div class="container">
    
                <div class="row">
    
                    <div class="col-xs-12">
    
                        <h1 class="caption text-center" style="text-shadow: 4px 4px #808080" > Bem-vindo</h1>
    
                        <p class="lead text-center" style="text-shadow: 2px 2px #808080">Aqui você vai acha o melhor para o seu pet!!
                            </p>
                            <p class="text-center">
                                <a href="#" class="btn btn-danger">Confira nossos produtos</a>
                            </p>
                    </div>
                </div>
    
            </div>
    
        </section>

        <script>

     var vconf,vcort,vnome;
     function gravar(){
         vnome=document.getElementById("fnome").value;
         localStorage.corf=vcorf;
         localStorage.cort=vcorf;
         localStorage.nome=vnome;
     }
    function defineCor(op,cor){
        if(op==1){
            document.body.style.backgroundColor=cor;
            vcorf=cor
        }else{
            document.body.style.color=cor;
            vcort=cor;
        }
    }

        </script>

        

        <section class="content-site">

          <div class="album py-5 ">  
            <div class="container">
    
              <div class="row">
              <?php foreach($produto as $k => $v) { 
                
                ?>
                <div class="col-md-4 text-center">
                  <div class="card mb-4 shadow-sm">
                      <img src= "<?php echo $v['Path']?>" class="img-fluid" alt="Imagem responsiva">

                   
                    <div class="card-body" >
                      <h6  class="card-text"><strong><?php echo utf8_encode($v['Nome'])?></strong></h6>
                      <p>R$<?php echo str_replace('.',',',  number_format( $v['Preco'], 2))?></p>
                              
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="<?php echo '#'.str_replace('/','',str_replace('.','',$v['Path']))?>">
                          Ver Produto
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="<?php echo str_replace('/','',str_replace('.','',$v['Path']))?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"><?php echo utf8_encode($v['Nome'])?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                              <img src= "<?php echo $v['Path']?>" class="img-fluid" alt="Imagem responsiva">
                              <img src= "<?php echo $v['Path2']?>" class="img-fluid" alt="Imagem responsiva">
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                <button class="btn btn-primary text-dark"><a href="processaCarrinhoCompra.php?id=<?php echo $v['id']; ?>" class="text-white" style="text-decoration:none;">Gostei</a></button>
                              </div>
                            </div>
                          </div>
                        </div>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
                <?php } ?>
          </div>
    
        </main>
    </section>
     <section class="img-site">

        <div class="container">

            <div class="row">
                
                    <div class="col-xs-12">
                            <h1 id="contrate" class="text-center" style="text-shadow: 4px 4px #808080"> Contrate agora</h1>
                            <p id="contrate" class="lead text-center" style="text-shadow: 2px 2px #808080">Ficou com raiva das pessoas?
                                    Foi para perdoá-las um dia.</p>            
                </div>
            </div>
        </div>

    </section>


    <section class="footer-site">
        <footer class="text-muted">
          <div class="container">
            <p class="float-right">
              <a href="#"  class="text-white">Voltar para topo</a>
            </p>
         </div>
        </footer>
    </section>
    
    <script type="text/javascript" src="assest/js/paulo/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="assest/js/paulo/jquery-popper.min.js"></script>
    <script type="text/javascript" src="assest/js/paulo/bootstrap.min.js"></script>
    
    
</body>
</html>
