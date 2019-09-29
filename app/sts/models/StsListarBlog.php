<?php
/*
ANOTAÇÕES DE ESTUDO:
Responsável em listar os artigos do blog.
É preciso colocar o namespace Sts\Models.
Criar a classe StsListarBlog e o médoto listar.
Para ter a lista é preciso fazer a conexão com o banco de dados.
Com isso cria-se o arquivo Conn.php.
Com o Conn.php criado precisamos instanciá-lo no StsListarBlog.
Feito toda a requisição dos dados no bando de dados,gora é preciso 
mandar de volta para o controller (return).
*/

namespace Sts\models;

use PDO;

class StsListarBlog {

    public $Resultado;

    public function listar(){
        //echo "Pesquisar artigos no BD <br>";
        // instanciado a classe de conexão Conn
        $listarArtigos = new \Sts\Models\Conn();
        //$listarArtigos->getConn();

        // Vaarável para "linkar" o o limite de busca
        $limit = 10;
        // Criando a Query e atribuindo em result_artigos
        $result_artigos = "SELECT * FROM artigos LIMIT :limit";
        // Utiliza o método de conexão do objeto instaciado, 
        // listarArtigo, da classe Conn
        // E prepara a query
        $resultado_artigos = $listarArtigos->getConn()->prepare($result_artigos);
        // Substituir o link com o bindParam, uma forma mais segura
        $resultado_artigos->bindParam(':limit', $limit, \PDO::PARAM_INT);
        // Para executar
        $resultado_artigos->execute();

        // O atributo Resultado é o que vai receber os dados
        // do banco de dados
        // E criando uma posição chamada 'artigos'
        $this->Resultado['artigos'] = $resultado_artigos->fetchAll();
        //Para retornar para o Controller
        return $this->Resultado;
        //var_dump($this->Resultado);
    }
}