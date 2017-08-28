<?php
/*
      ====================================================================
        Objetivo: Uma classe para executar a ações de Novo, Editar, Apagar
        e Buscar no Banco de Dados.
        Autor: Gabriel Lima dos Santos
        Data: 01/08/2017
        Última modificação: 01/08/2017
        Modificações:
        Arquivos relacionados:  models/contato_class.php
                                router.php
                                views/contato_view.php
      ====================================================================

*/
    class ControllerContato{


        //Método Inserir novo Registro
        public function Novo(){

          //Verificamos se realmente esse método foi acionado
          // pela requisição de um formulário, utilizando
          // o método POST
          if($_SERVER['REQUEST_METHOD']=='POST'){

            //Resgatando os dados do Formulário
            $nome=$_POST['txtnome'];
            $telefone=$_POST['txttelefone'];
            $celular=$_POST['txtcelular'];
            $email=$_POST['txtemail'];

            //Instancia da classe Contato
            $contato_class = new Contato();

            //Carregando os atributos da classe Contato com os
            // valores do formulário enviado via POST
            $contato_class->nome=$nome;
            $contato_class->telefone=$telefone;
            $contato_class->celular=$celular;
            $contato_class->email=$email;

            $contato_class->Insert($contato_class);

            //****REALIZAR OS TRATAMENTOS DOS DADOS*****//
          }

        }

        //Método Atualizar um Registro
        public function Atualizar(){


        }

        //Método Apagar um Registro
        public function Apagar(){

            if($_SERVER['REQUEST_METHOD']=='GET'){
                $id_pessoa=$_GET['id_pessoa'];

                require_once('models/contato_class.php');
                $deleteContato_Controller = new Contato();

                $deleteContato_Controller->id_pessoa=$id_pessoa;
                $deleteContato_Controller->Delete($deleteContato_Controller);
            }
        }

        //Método Listar todos os Registros
        public function Listar(){
            //Caso fosse necessário, aqui seriam os tratamentos de dados

            require_once('models/contato_class.php');

            //Cria a instância para a Model(Contato)
            $listContatos_Controller = new Contato();

            //Chamada para o método 'SelectAll' da classe Contato, que fará o select no Banco
            return $listContatos_Controller->SelectAll();
        }

        //Método Buscar um Registro pelo ID
        public function Buscar(){


        }
    }

?>
