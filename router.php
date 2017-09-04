<?php
    //Identificamos qual View esta enviando os dados do formulario
    // pela variavel 'controller', esssa variavel é enviada no
    // action de cada frm dentro da pasta 'views'.
    //A variavel 'modo' serve para identificarmos qual método
    //devemos executar nas controllers.

    $controller = $_GET['controller'];
    $modo = $_GET['modo'];


    //Vai verificar qual Controller devemos instanciar, baseado
    // no que a View requisitou pelo action form
    switch ($controller) {
      case 'contatos':
          //Incluimos os arquivos da controller e da classe do Banco de Dados
          require_once('controllers/contatos_controller.php');
          require_once('models/contato_class.php');

          //Verifica qual ação iremos executar na Controller
          //(Novo, Atualizar, Apagar, Listar ou Buscar)
          switch ($modo) {
              case 'novo':
                  $controller_contato = new ControllerContato();
                  $controller_contato->Novo();
              break;

              case 'apagar':
                  $controller_contato = new ControllerContato();
                  $controller_contato->Apagar($id_pessoa);
              break;

              case 'alterar':
                  $controller_contato = new ControllerContato();
                  //Chamada para o método de buscar um registro no Banco
                  $controller_contato->Buscar();
              break;

              case 'editar':
                  $controller_contato = new ControllerContato();
                  $controller_contato->Atualizar();
              break;
          }
    }
 ?>
