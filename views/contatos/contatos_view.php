<?php



 ?>
<form name="frmcontatos" action="router.php?controller=contatos&modo=novo" method="post">
      <table class="tblcadastro_contatos">
        <tr>
          <td colspan="2" class="nomeFrm">Cadastro de Contatinhos</td>
        </tr>
        <tr>
          <td class="campoPreencheFrm">Nome:</td>
          <td><input type="text" name="txtnome"></td>
        </tr>
        <tr>
          <td class="campoPreencheFrm">Telefone:</td>
          <td><input type="text" name="txttelefone"></td>
        </tr>
        <tr>
          <td class="campoPreencheFrm">Celular:</td>
          <td><input type="text" name="txtcelular"></td>
        </tr>
        <tr>
          <td class="campoPreencheFrm">Email:</td>
          <td><input type="text" name="txtemail"></td>
        </tr>
        <tr>
          <td colspan="2"><input type="submit" class="btnFrm" name="btnsalvar" value="Salvar"></button></td>
        </tr>
      </table>
      <table class="tblcadastro_contatos">
        <tr>
          <td colspan="5" class="nomeFrm">Consulta de Contatinhos</td>
        </tr>
        <tr>
          <td class="tituloConsulta">Nome</td>
          <td class="tituloConsulta">Telefone</td>
          <td class="tituloConsulta">Celular</td>
          <td class="tituloConsulta">Email</td>
          <td class="tituloConsulta">Opção</td>
        </tr>

          <?php
              //Incluindo o arquivo da Controller para fazer um SELECT
              require_once('controllers/contatos_controller.php');

              //Instância do Objeto da Controller
              $controller_Contatos = new ControllerContato();

              //Chamada para o Método Listar, para listar os Registros do Banco
              // é criado uma variavel de retorno($rsContatos, pois este método retorna um resultado
              $rsContatos = $controller_Contatos->Listar();

              $cont=0;
              while($cont<count($rsContatos)){


          ?>
        <tr>
          <td class="resultadoConsulta"><?php echo($rsContatos[$cont]->nome)?></td>
          <td class="resultadoConsulta"><?php echo($rsContatos[$cont]->telefone)?></td>
          <td class="resultadoConsulta"><?php echo($rsContatos[$cont]->celular)?></td>
          <td class="resultadoConsulta"><?php echo($rsContatos[$cont]->email)?></td>
          <td class="resultadoConsulta">Editar | <a href="router.php?controller=contatos&modo=apagar&id_pessoa=<?php echo($rsContatos[$cont]->id_pessoa)?>">Excluir</a></td>
        </tr>
          <?php
                $cont+=1;
            }
           ?>
      </table>
</form>
