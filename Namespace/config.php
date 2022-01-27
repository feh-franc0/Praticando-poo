<?php

spl_autoload_register(function($nameClasse){//*Quando for executado o autoload nos vamos receber no nosso dessa classe o 'nome do namespace'/'nome da classe'.Então uma vez que a pasta ja esta esse padrao vai continuar funcionando o require dessa classe,ja trazendo com o caminho dinamico

    var_dump($nameClasse);//*Para ver o caminho que nossa função esta fazendo
    $dirClass = "class";
    $filename = $dirClass . DIRECTORY_SEPARATOR . $nameClasse . ".php";
    if(file_exists($filename)){
        require_once($filename);
    }
});