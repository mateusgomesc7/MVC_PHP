<?php
/*
ANOTAÇÕES DE ESTUDO:
Nesta classe é preciso colocar o namespace. O namespace nesse caso será o Core.
Após configurar o .htaccess, iremos receber, pela a url, a requisição do usuário.
É preciso criar com o método GET, para ler. Com a url, através do GET, finalizado, 
é preciso carregar o controller. O qual vai gerenciar a View e a Model.
Cria-se o método carregar.
*/

namespace Core;

class ConfigController {

    private $Url;
    private $UrlConjunto;
    private $UrlControlle;
    private $UrlMetodo;

    public function __construct(){
        if(!empty(filter_input(INPUT_GET, "url", FILTER_DEFAULT))){
            //Atribui a url recebida
            $this->Url = filter_input(INPUT_GET, "url", FILTER_DEFAULT);
            //Separa a url, dividindo entre a classe e o método
            $this->UrlConjunto =  explode("/", $this->Url);

            if((isset($this->UrlConjunto[0])) AND (isset($this->UrlConjunto[0]))){
                //Como foi dividido, esta recebe o primeiro que é a classe
                $this->UrlControlle = $this->UrlConjunto[0];
                //Esta recebe o segundo, que é o método
                $this->UrlMetodo = $this->UrlConjunto[1];
            }else{
                $this->UrlControlle = 'home';
                $this->UrlMetodo = 'index';
            }
        }else{
            $this->UrlControlle = 'home';
            $this->UrlMetodo = 'index';
        }
        //echo "URL: {$this->Url}";
        //echo "Classe: {$this->UrlControlle} - Método: {$this->UrlMetodo} <br>";
    }

    public function carregar(){
        //Varável responsável em receber o caminho (a classe)
        $classe = "\\Sts\\Controllers\\".$this->UrlControlle;
        //Instanciando a classe recebida
        $classeCarregar = new $classe;
        //Com a classe instanciada, é possível utilizar o seu método
        $classeCarregar->index();
    }

}