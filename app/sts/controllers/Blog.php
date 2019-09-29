<?php
/*
ANOTAÇÕES DE ESTUDO:
Um exemplo a mais, além do Home. Responsável em controlar o  Blog
É preciso colocar o namespace Sts\controllers.
Criar a classe Blog e o método index().
No Models com uma classe que tenha a ver com o blog,
é preciso instanciar essa classe no controller do Blog,
e utilizar seus métodos.
Quando a Controller recebe os dados do model,
é a hora de enviar para a view
*/

namespace Sts\Controllers;

class Blog{

    public $Dados;

    public function index(){
        //echo "Controller da página blog<br>";

        // Instanciar a classe criada no Model
        $listarArtigo = new \Sts\Models\StsListarBlog();
        // Chamando o método listar da classe StsListarBlog
        // Os dados retornados e aribuídos no atributo Dados
        $this->Dados = $listarArtigo->listar();
        //var_dump($this->Dados);

        // Instanciando classe responsável no controle da View
        // Passando como parâmetro o endereço da view e os dados
        $carregarView = new \Core\ConfigView("sts/views/blog/listarArtigo", $this->Dados);
        // Chamando o método responsável renderizar
        $carregarView->renderizar();
    }

}