<?php
/*
      ====================================================================
        Objetivo: Criar a modelagem para manipulação dos dados com o
                  Banco de Dados
        Autor: Gabriel Lima dos Santos
        Data: 01/08/2017
        Última modificação: 01/08/2017
        Modificações:
        Arquivos relacionados:  models/bd_class.php
                                controller/contatos_controller.php
      ====================================================================

*/


    class Contato{

        //Devemos criar os atributos exatamente iguais aos campos criados
        // no Banco de Dados, se possível com a mesma nomenclatura
        public $id_pessoa;
        public $nome;
        public $telefone;
        public $celular;
        public $email;

        //Construtor da classe
        public function __construct(){

            //Inclui o arquivo de conexão com o Banco de Dados
            require_once('models/bd_class.php');

            //Instancia a Classe Mysql_db
            $conexao_bd = new Mysql_db();

            //Chama o método conectar para estabelecer a conexão com o Banco de Dados
            $conexao_bd->conectar();
        }

        //Método para Inserir um novo Registro
        public function Insert($contato){

            $sql="insert into tblpessoa (nome, telefone, celular, email) values('".$contato->nome."',
                                                                                '".$contato->telefone."',
                                                                                '".$contato->celular."',
                                                                                '".$contato->email."'
                                                                                );";
            if(mysql_query($sql)){

                ?><script>alert('Inserido'); window.location="index.php";</script><?php
            }else{
                echo("Erro no Script de insert do banco de dados");
            }

        }

        //Método para Atualizar um Registro
        public function Update(){


        }

        //Método para Apagar um Registro
        public function Delete($deleteContatos){

            $sql="delete from tblpessoa where id_pessoa = ".$deleteContatos->id_pessoa.";";

            if(mysql_query($sql)){

                ?><script>alert('APAGOOOOOOU'); window.location="index.php";</script><?php
            }else{
                echo('deu7 ruim');
            }
        }

        //Método para Selecionar todos os Registros
        public function SelectAll(){

            //Script de select no banco de dados
            $sql="select * from tblpessoa order by id_pessoa desc";
            $select = mysql_query($sql);

            $cont=0;

            //Repetição para guardar os registros em um Array de Objetos
            while($rs=mysql_fetch_array($select)){

                //Instância da classe Contato, criando uma coleção de Objetos
                $listContatos[] = new Contato();

                //Guardando em cada Objeto um Registro diferente do BD
                $listContatos[$cont]->id_pessoa=$rs['id_pessoa'];
                $listContatos[$cont]->nome=$rs['nome'];
                $listContatos[$cont]->telefone=$rs['telefone'];
                $listContatos[$cont]->celular=$rs['celular'];
                $listContatos[$cont]->email=$rs['email'];

                $cont+=1;
            }

            return $listContatos;
        }

        //Método para Selecionar Registro pelo ID
        public function SelectById(){


        }
    }
 ?>
