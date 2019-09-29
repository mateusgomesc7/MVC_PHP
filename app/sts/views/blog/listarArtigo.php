<?php
/*
ANOTAÇÕES DE ESTUDO:
Responsável em listar para a visão do usuário
*/
echo "<h1>Listar artigos</h1>";
//var_dump($this->Dados);

foreach ($this->Dados['artigos'] as $artigo) {
    // Para extrair o array e imprimir através do nome
    extract($artigo);
    echo "ID: {$id} <br>";
    echo "Título: {$titulo} <br>";
    echo "Conteúdo: {$conteudo} <br><hr>";
}