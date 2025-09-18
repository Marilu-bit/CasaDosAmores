<?php
    class Banco{
        public static $usuarios = "root";
        public static $senha = "senha";
        public static $connect = null;
        private static function Conectar(){
            try {
                if(self::$connect == null){
                   self::$connect = new PDO 
                   ('mysql:host=localhost;
                     dbname=bddoceria;',
                    self::$usuarios,self::$senha 
                   );                  
                }
            } catch (Exception $ex) {
                echo 'Mensagem: ' . $ex->
                getMessage();
                die;
            }
            return self::$connect;
        }
        public function getConn(){
            return self::Conectar(); 
        }
    }
?>