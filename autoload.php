<?php

//A função "spl_autoload_register", é uma função que 
//faz parte da lista de funções SPL (Standard PHP Library)
//e serve para carregar "classes" no PHP
spl_autoload_register(function ($classe) {

    //Serve para identificar as classes que queremos carregar
    //Essa variável "prefixo" serve para adicionar o 
    //prefixo "App" nas classes que desejamos carregar
    // e não outras classes ou bibliotecas
    $prefixo = "App\\";

    //INFORMAR OS DIRETÓRIOS QUE FORAM CRIADOS
    //A constante mágica "__DIR__" indica o diretório atual em 
    //que se encontra o nosso projeto, que no caso é  
    //"www" seguido das constantes
    //"DIRECTORY_SEPARATOR" que servem para adicionar a barra 
    //oblícua do windows "\" no diretório "src"
    $diretorio = __DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR;

    //CARREGAR SOMENTES AS CLASSES COM O PREFIXO "APP"
    //Aqui nessa declaração condicional "if" é realizada uma 
    //comparação entre a variável "prefixo" e a variável "classe" 
    //para ver se ambas possuem o namespace "App" que é usada pela
    //função "strlen()" para fazer a comparação somente até "App"
    if (strncmp($prefixo, $classe, strlen($prefixo)) !== 0) {
        return;
    }

    //Aqui é apresentado somente o namespace depois de "App"
    //Aqui a função "substr()" pega tudo sobre a variável "classe"
    //para depois exibir somente "Alura\ e o nome da classe" 
    // ocultando "App" por conta da função "strlen()"
    //que possui a variável "prefixo" 
    $namespace = substr($classe, strlen($prefixo));

    //Aqui é onde a barra é invertida
    //Aqui a barra inclinado do windows "\" 
    //é trocada para a barra do linux "/"
    //A função "str_replace()" começa por atribuir a barra
    //do windows que precisa ser alterado, em seguida atribui 
    //a constante mágica "DIRECTORY_SEPARATOR" para adiciona 
    //a barra do linux na variável "namespace"
    //$namespace_arquivo = str_replace('\\', DIRECTORY_SEPARATOR, $namespace);

    //AQUI VAI O CAMINHO ONDE O AUTOLOAD VAI CARREGAR OS ORQUIVOS
    //A variável "diretório" carrega o diretório "www" e o
    //diretório "src", enquanto que a variável "namespace_arquivo"
    //carrega o "namespace_arquivo" e o nome da "classe" em questão
    $arquivo = $diretorio . $namespace . '.php';

    //Aqui é verificado se a variável "arquivo" existe 
    if (file_exists($arquivo)) {
        require $arquivo;
    }

});

?>