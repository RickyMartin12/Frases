<html>
<head>
<title>Listagem de Letras</title>
<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" />
<link href="css/bootstrap-theme.css" type="text/css" rel="stylesheet" />
<link href="css/bootstrap-theme.min.css" type="text/css" rel="stylesheet" />
<link href="css/blink.css" type="text/css" rel="stylesheet" />

</head>
<body>
<h2 class="text-center">Ortografia - Conjunto de Letras</h2>
<br>
<form action="index.php" method="post" class="form-inline">
<div class="form-group">
	<label for="exampleInputName2">Nome da Frase:</label>
	<input type="text" class="form-control" id="exampleInputName1" placeholder="Escreva a sua ortografia" name="palavra">
</div>
<input type="submit" class="btn btn-default" name="submit" value="Submeter">
<input type="reset" class="btn btn-default" name="submit" value="Limpar">

</form>
<?php
// Check if form was submitted
   if(isset($_POST['submit']))
   {
      if (!empty($_POST['palavra']))
      {
      	// conexão da base de dados através da ortografia
      	// Através da conexão do servidor local ou do servdior IIS
      	// mysqli_connect 
      		// localhost - servidor local (endereço IP do servidor)
      		// root - Utilizador da base de dados do mysql instalado
      		// "" - Password da base de dados do mysql instalado
      		// letras - Nome atribuido a base de dados do mysql atribuido que foi instalado
      	$conexao = mysqli_connect("localhost", "root", "", "letras");
      	if (!$conexao)
      	{
      		die ("Nao se conecta a base de dados: " . mysql_error());
      	}

      	//mysqli_select_db($conexao, "letras");
      	$e = "$_POST[palavra]";
      	$sql = "SELECT NomeOrtografia from palavra, ortografia where NomeOrtografia = '$e' AND Nome = '$e'";
      	$sql1 = "SELECT NomeOrtografia from palavra, ortografia where palavra.ortografiaID = ortografia.ID AND Nome = '$e'";
      	if ($exe = mysqli_query($conexao, $sql))
      	{
      		// Return the number of rows in result set
  			$rowcount=mysqli_num_rows($exe);
  			if ($rowcount > 0)
  			{
  				$row = mysqli_fetch_assoc($exe);
        		
  				$letra = "Nome da Ortográfia";
  				echo "<font color='Green'>Palavra Correcta</font><br>";
  				echo "<br>";
  				echo '<div class="table-responsive">';
  				echo '<table class="table table-bordered">';
  				echo "<tr>";
  				echo "<th>";
  				echo utf8_decode($letra);
  				echo "</th>";
  				echo "</tr>";
  				echo "<tr>";
  				echo "<td>";
  				echo $e;
  				echo "</td>";
  				echo "</tr>";
  				echo '</table>';
  				echo '</div>';
  				echo "<br>";
  				echo "<a href='index.php'>Voltar</a>";
  			}
  			else if ($exe1 = mysqli_query($conexao, $sql1))
  			{
  				// Return the number of rows in result set
	  			$rowcount1=mysqli_num_rows($exe1);
	  			if ($rowcount1 > 0)
	  			{
	  				$i = 0;
	  				$row1 = mysqli_fetch_row($exe1);
	  				$letra1 = "A Palavra Correcta é: ";
	        		echo utf8_decode($letra1);
	        		foreach($row1 as $cell)
	  				{
	  					echo "<strong>$cell</strong>";
	  				}
	        		mysqli_free_result($exe1);
	        		echo "<br>";
	        		echo "<br>";
	  				echo "<a href='index.php'>Voltar</a>";
	  			}
	  			else
  				{
	  				echo "<font color='Red'>Palavra Errada</font><br>";
	  				echo "<br>";
	  				echo "<span class='blink_text'>Tenta de Novo</span><br>";
	  				echo "<br>";
	  				echo "<a href='index.php'>Voltar</a>";
  				}
  			}
  			else
  			{
	  				echo "<font color='Red'>Palavra Errada</font><br>";
	  				echo "<br>";
	  				echo "<span class='blink_text'>Tenta de Novo</span><br>";
	  				echo "<br>";
	  				echo "<a href='index.php'>Voltar</a>";
  			}
      	}
		
		mysqli_close($conexao);
      	
      	
      }
      else
      {
      	echo "<br>";
      }
  }
  else
  {
  	echo "<br>";
  }
?>
</body>
</html>