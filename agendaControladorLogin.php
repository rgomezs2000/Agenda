<?php
	session_start();
	require_once '../Agenda/constantes.php';
	if(isset($_POST['username'])){
		$username=$_POST['username'];
	}else{
		$username='';
	}
	if{
	}(isset($_POST['password'])){
		$password=$_POST['password'];
	}else{
		$password='';
	}
	$dbc=mysql_connect($cServidor, $cUsuario, $cPassword);
	if(!$dbc){
		header('Location agebdaVistaLogin.php?msgError=Error en la Base de Datos');
		exit();
		//die('No se conecta: '.mysql_error())
	}
	$db_selected=mysql_select_db('agenda',$dbc);
	if(!$db_selected){
		header('Location: agendaVistaLogin.php?msgError=Error en la Base de Datos');
		exit();
	}
	$strQuery="SELECT count(*) as cantidad FROM usuario where Login = '".$username."' and Password = '".$password."' ";
	$result=mysql_query($strQuery);
	$results=mysql_fetch_array($result,MYSQL_ASSOC);
	if($result['cantidad']==0){
		header('Location: agendaVistaLogin.php?username='.$username.'&msgError=Login y/o Password ninv&aacute;lido');
		exit();
	}
	mysql_free_result($result);
	$strQuery="SELECT * FROM usuario where Login= '".$username."' and Password ='".$password."' ";
	$result=mysql_query($strQuery);
	$results=mysql_fetch_array($result,MYSQL_ASSOC);
	$_SESSION['Usuario']['Nombre']=$results['Nombre'];
	$_SESSION['Usuario']['Apellido']=$results['Apellido'];
	mysql_free_result($result);
	header('Location: agendaVistaMenu.php');
	exit();
?>