<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ginásio Local - Página de Inscrição</title>
</head>
<body>
  <h1>
    Bem vindo à nossa página de Inscrição!
  </h1>
<form method="post" action="processar_formulario.php">
    <label for="nome">Nome Completo:</label>
    <input type="text" id="nome" name="nome">

    <br>

    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email">

    <br>

    <label for="email">Telemóvel:</label>
    <input type="tel" id="telemovel" name="telemovel">

    <br>

    <label for="data">Data de nascimento:</label>
    <input type="date" id="data" name="data">

    <br>

    <label for="sexo">Sexo:</label>
		<select id="sexo" name="sexo" required>
			<option value="">Selecione uma opção</option>
			<option value="F">Feminino</option>
			<option value="M">Masculino</option>
			<option value="O">Outro</option>
		</select><br>

    <label for="objetivo">Objetivo:</label>
    <input type="text" id="objetivo" name="objetivo">

    <br>

    <label for="frequencia_treino">Frequência semanal de treino:</label>
		<select name="frequencia_treino" required>
            <option value="1x">1 vezes por semana</option>
			<option value="2x">2 vezes por semana</option>
			<option value="3x">3 vezes por semana</option>
			<option value="4x">4 vezes por semana</option>
			<option value="5x">5 vezes por semana</option>
            <option value="6x">6 vezes por semana</option>
            <option value="7x">7 vezes por semana</option>
		</select><br>

    <input type="submit" value="Enviar">
</form>


<p style="color: red"><?php echo $_SESSION["newsession"]?></p>

</body>
</html>
