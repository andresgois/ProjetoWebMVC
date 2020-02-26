<?php
// arquivos de diretorios raizes

$PastaInterna = "ProjetoWebMVC/";

// caminho absoluto de nossas paginas
define("DIRPAGE","http://{$_SERVER['HTTP_HOST']}/$PastaInterna");
define("DIRCSS", DIRPAGE."public/css/");
define("DIRJS", DIRPAGE."public/js/");
define("DIRFONT", DIRPAGE."public/fontes/");
define("DIRIMG", DIRPAGE."public/img/");
define("DIRADMIN", DIRPAGE."public/admin/");

// caminho físico do nosso servidor
if(substr($_SERVER['DOCUMENT_ROOT'],-1) == '/'){
    define("DIRREQ", "{$_SERVER['DOCUMENT_ROOT']}{$PastaInterna}");
}else{
    define("DIRREQ", "{$_SERVER['DOCUMENT_ROOT']}/{$PastaInterna}");
}

// Acesso ao banco de dados
define("HOST","localhost");
define("DB","sistema");
define("PASS","12345");
define("USER","developer");

?>