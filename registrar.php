<script>
	var RecaptchaOptions = {
		   theme: 'clean',
		   lang: 'pt',
		   custom_theme_widget: 'recaptcha_widget'
		};
</script>
<div id="content-title">Criar nova conta</div>
<div id="content-html">
	Complete os dados abaixo para criar uma conta.
	<form name="cadastrarUsuario" id="cadastrarUsuario" method="post" action="">
    	<table width="680" border="0">
          <tr>
            <td width="136">Email:</td>
            <td width="177"><input name="email" type="text" id="textInput" size="26" /></td>
            <td width="353" class="inputDesc">Digite um email.</td>
          </tr>
          <tr>
            <td>Senha:</td>
            <td><input name="senha" type="password" id="textInput" size="26" /></td>
            <td class="inputDesc">Digite uma senha.</td>
          </tr>
          <tr>
            <td>Confirmação de senha:</td>
            <td><input name="senha_confirme" type="password" id="textInput" size="26" title="Confirme sua senha" /></td>
            <td class="inputDesc">Confirme sua senha.</td>
          </tr>
        </table>
        <?php print(recaptcha_get_html($key) ) ?>
        <input name="botao-registrar" type="submit" value="Criar uma nova conta" class="clean-button" />
  </form>
</div>