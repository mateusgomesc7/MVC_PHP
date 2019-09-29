<?php
/*
ANOTAÇÕES DE ESTUDO:
Responsável em fazer a conexão com o banco de dados.
É preciso colocar o namespace Sts\models.
Como está utilizando o PDO é preciso colocar o "use PDO".
*/

namespace Sts\models;

use PDO;

class Conn {
    
    //Credenciais para acessar o banco de dados
    public static $Host = "localhost";
    public static $User = "root";
    public static $Pass = "";
    public static $Dbname = "celke";
    private static $Connect = null;
    
    private static function Conectar() {
        try {
            if(self::$Connect == null):
                self::$Connect = new PDO('mysql:host=' . self::$Host .';dbname='.self::$Dbname, self::$User, self::$Pass);
            endif;            
        } catch (Exception $ex) {
            echo 'Mensagem: ' . $ex->getMessage();
            die;
        }       
        return self::$Connect;
    }
    
    public function getConn() {
        return self::Conectar();
    }
    
}
