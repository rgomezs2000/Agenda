<?php
session_start();
require_once 'constantes.php';
$_SESSION['Usuario']['Nombre']="";
$_SESSION['Usuario']['Apellido']="";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>...:::ACCESO AL SISTEMA:::...</title>
<script language="javascript">
function fIrA(pagina){
	document.form1.action=pagina;
	document.form1.submit();
}
function fCerarr(){
	event.returnValue=false;
	window.close();
}
</script>
</head>

<body>
<form action="" method="post" name="form1" id="form1">
<div>
<div>
  <h1 align="center"><marquee align="middle">ACCESO AL SISTEMA</marquee></h1>
  </div>
  <div align="center">
  <table width="200" border="0">
    <tr>
      <td align="right">Login:</td>
      <td><label>
        <input type="text" name="username" id="username" />
      </label></td>
    </tr>
    <tr>
      <td align="right">Password:</td>
      <td><label>
        <input type="password" name="password" id="password" />
      </label></td>
    </tr>
    <tr>
      <td align="center"><input type="image" src="imagenes/ingresar.png" width="150" height="48" alt="ingresar" onclick="fIrA(agendaControladorLogin.php);" /></td>
      <td align="center"><input type="image" src="imagenes/salida.png" width="150" height="48" alt="SALIR" onclick="fCerrar();" /></td>
    </tr>
  </table>
  </div>
</div>
<?php
	if(isset($_GET['username'])){
		$username=$_GET['username'];
	}else{
		$username='';
	}
	if(isset($_GET['msgError'])){
		$msgError=$_GET['msgError'];
	}else{
		$msgError='';
	}
	if($msgError!=''){
		$dbc=mysql_connect($cServidor, $cUsuario, $cPassword);
		if(!$dbc){
			?>
            <div>
            	<hr  />
            	<h3 align="center"> Error en Base de Datos</h3>
            </div>
            <?php
		}
		else{
			$db_selected=mysql_select_db('agenda',$dbc);
			if(!$db_selected){
				?>
                <div>
                	<hr />
                    <h3 align="center">Error en la Base de Datos</h3>
                </div>
                <?php
			}
			else{
				$strQuery="SELECT * FROM usuario where Login = '".$username." '";
				$results=mysql_query($strQuery);
				if(mysql_num_rows($result)>0){
					$result=mysql_fetch_array($result);
					?>
                    <div>
                    	<hr />
                        <h3 align="center">
						<?php
						echo "Palabra de referencia: ".$results['PalabraReferencia']
						?>
                        </h3>
                    </div>
                    <?php
					mysql_free_result($result);
				}else{
					?>
                    <div>
                    	<hr />
                        <h3 align="center">Login y/o Password inv&aacute;lido</h3>
                    </div>
                    <?php
				}
			}
		}
	}
?>
</form>
</body>
</html>
