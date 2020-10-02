<?php
    session_start();
    $arquivo = fopen('../../app_help_desk/arquivo.fn','a');
    $texto=$_SESSION['id'].'#';
    //montando o texto para salvar no arquivo
    foreach($_POST as $idx => $valor){
        if($idx!='descricao'){
            $texto .= str_replace('#','-',$valor).'#';
        }else{
            $texto .= str_replace('#','-',$valor).PHP_EOL;
        }

    }
    //escrevendo os dados no arquivo
    fwrite($arquivo,$texto);
    //fechando o arquivo
    fclose($arquivo);
    header('Location: abrir_chamado.php');
?>