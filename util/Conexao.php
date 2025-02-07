<?php 

class Conexao {

    private static $con;

    public static function getCon() {

        if(self::$con == null) {

            $opcoes = array(
                //Define o charset da conexão
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                //Define o tipo do erro como exceção
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
               //Define o tipo do retorno das consultas
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    
            $dadosCon = "mysql:host=localhost:3306;dbname=artistas"; //eu estava usando a porta 3000 mas não ta funcionando
            //Leticia - a minha porta era 3306, ai mudei
    
            self::$con = new PDO($dadosCon,"root" ,"bancodedados", $opcoes); //tirei minha senha ai precisa por!!
            //mudei para a senha do mysql do lab

        }
       
        return self::$con;

    }
}
