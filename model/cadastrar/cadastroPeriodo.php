<?php
require_once '../conexao.php';
if(isset($_POST['codigoPeriodo'])){
$codigoPeriodo = $_POST['codigoPeriodo'];
$tipoEnsino = $_POST['tipoEnsino'];
$sql = ("INSERT INTO periodo (codigoPeriodo, tipoEnsino) VALUES('$codigoPeriodo','$tipoEnsino')");
$query = mysqli_query($conn,$sql) or die("Não foi possível cadastrar o tipo de ensino " . mysqli_error($conn));
echo "<script type='text/javascript'>alert('Cadastro realizado com sucesso!');location.href='../../view/listarPeriodo.php'</script>";
mysqli_close($conn);
}
?>
