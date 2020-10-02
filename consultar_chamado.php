<?require_once('validador_acesso.php');?>
<?php
  //abrir o arquivo
  $chamados = array();
  $arquivo = fopen('../../app_help_desk/arquivo.fn','r');
  //enquanto houver registros
  while(!feof($arquivo)){
    //linhas
    $registro = explode('#',fgets($arquivo));
      if(count($registro) <3 || $registro[0]!=$_SESSION['id'] && $_SESSION['perfil_id']!=1){
        continue;
      }
      $chamados[] = $registro;
  }
  //fechar o arquivo
  fclose($arquivo);
?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

  <?require_once('menu.php')?>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              <?foreach($chamados as $chamado){?>
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?= $chamado[1]?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $chamado[2]?></h6>
                  <p class="card-text"><?= $chamado[3]?></p>

                </div>
              </div>
              <?}?>

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>