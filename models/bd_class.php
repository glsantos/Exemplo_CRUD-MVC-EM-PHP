<?php
/*
      ====================================================================
        Objetivo: Estabelecer uma conexão com o Banco de Dados(Mysql)
        Autor: Gabriel Lima dos Santos
        Data: 01/08/2017
        Última modificação: 01/08/2017
        Modificações:
        Arquivos relacionados:  Qualquer arquivo da model
      ====================================================================

*/

    class Mysql_db{

        //Atributos para estabelecer a conexão com o Banco de Dados
        public $server;
        public $user;
        public $password;

        //O Construtor ou Método Mágico é criado utilizando
        //2(dois) __construct(Underline's)
        public function __construct(){

            $this->server="localhost";
            $this->user="root";
            $this->password="bcd127";
        }

        //Método para conectar no Banco de Dados
        public function conectar(){

            //Estabelece a conexão com o Banco de Dados,
            // caso a conexão seja realizada com sucesso seleciona o DataBase,
            // caso contrário mostra uma mensagem de erro e mata a conexão
            if($conexao=mysql_connect($this->server,$this->user,$this->password)){

                mysql_select_db("dbmvcphp");
            }else{

                echo("Erro na conexão com o Banco de Dados. Favor entrar em Contato com o administrador.");
                die();
            }
        }

        //Método para fechar a conexão com o Banco de Dados
        public function desconectar(){

            mysql_close($conexao);
        }
    }

 ?>
