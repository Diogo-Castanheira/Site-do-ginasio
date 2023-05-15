<?php
$_SESSION["newsession"]="";

  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $telefone = $_POST["telemovel"];
  $data_nascimento = $_POST["data"];
  $sexo = $_POST["sexo"];
  $objetivo = $_POST["objetivo"];
  $frequencia_treino = $_POST["frequencia_treino"];
  $today = date("Y-m-d");
  $diff = date_diff(date_create($data_nascimento), date_create($today));
  $idade = $diff->format('%y');

if(empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['telemovel']) || empty($_POST['data']) || empty($_POST['sexo']) || empty($_POST['objetivo']) || empty($_POST['frequencia_treino'])) {
    // exibe mensagem de erro caso algum campo esteja vazio
    // echo "Por favor, preencha todos os campos obrigatórios";
    // echo '<a href="ginasio.html">VOlta a inscrever-te</a>';
    // exit;
 


/*session is started if you don't write this line can't use $_Session  global variable*/

$_SESSION["newsession"]="Por favor preencha os dados";

header("Location: ginasio.php");

}
else{
    $list = array ($nome,$email,$telefone,$data_nascimento,$sexo,$objetivo,$frequencia_treino);
        
        $file = fopen("contacts.csv","a");

        fputcsv($file,$list);
        
        fclose($file);
}

$con = mysqli_connect("localhost","diogo1","Password!","ginasio");

            if (mysqli_connect_errno()) {
                echo "Falha a ligar à BD";
                exit();
            }

            $sql = "INSERT INTO utilizadores (nome, email, telemovel, data_de_nascimento, genero, objetivo, frequencia_treino, idade)
            VALUES ('$nome', '$email', '$telefone', '$data_nascimento', '$sexo', '$objetivo', '$frequencia_treino', $idade)";
            echo $sql;

            if (mysqli_query($con,$sql)){
              echo "Registo efetuado";
            
            }else{
              echo "Erro no registo" .$sql." ". mysqli_error($con); 
            }
            mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Confirmação de Inscrição</title>
</head>
<body>
	<h1>Obrigado por se inscrever no nosso ginásio!</h1>
	<p>Os seguintes dados foram registados com sucesso:</p>
	<ul>
		<li><strong>Nome completo:</strong> <?php echo $_POST['nome']; ?></li>
		<li><strong>Endereço de e-mail:</strong> <?php echo $_POST['email']; ?></li>
		<li><strong>Número de telefone:</strong> <?php echo $_POST['telemovel']; ?></li>
		<li><strong>Data de nascimento:</strong> <?php echo $_POST['data']; ?></li>
		<li><strong>Género:</strong> <?php echo $_POST['sexo']; ?></li>
		<li><strong>Objetivo:</strong> <?php echo $_POST['objetivo']; ?></li>
		<li><strong>Frequência semanal de treino:</strong> <?php echo $_POST['frequencia_treino']; ?></li>
    <li><strong>Idade:</strong> <?php echo $idade; ?></li>
	</ul>
</body>
</html>
