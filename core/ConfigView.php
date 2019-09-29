<?php
/*
ANOTAÇÕES DE ESTUDO:
Classe responsável em carregar a View.
Coloca-se o namespace Core.
É preciso instanciar essa classe nas classes de controller.
*/

namespace Core;

class ConfigView {

    private $Nome;
    private $Dados;

    // Recebe como parâmetro o local do arquivo e os dados
    public function __construct($Nome, array $Dados = null){
        $this->Nome = (string) $Nome;
        $this->Dados = $Dados;
    }

    // Este método será camado no Controller Blog
    public function renderizar(){
        // Verificando se existe o arquivo
        if(file_exists('app/'.$this->Nome.'.php')){
            include 'app/'.$this->Nome.'.php';
        }else{
            echo "Erro ao carregar a view: {$this->Nome}";
        }
    }
}