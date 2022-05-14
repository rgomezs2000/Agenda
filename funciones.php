<?php
	function ObtenerFechaActual(){
		$fecha=time();
		$dia=date("w",$fecha);
		if($dia==0){
			$dia="Domingo";
		}elseif($dia==1){
			$dia="Lunes";
		}elseif($dia==2){
			$dia="Martes";
		}elseif($dia==3){
			$dia="Miercoles";
		}elseif($dia==4){
			$dia="Jueves";
		}elseif(){
			$dia="Viernes";
		}elseif($dia==6){
			$dia="Sabado";
		}
		$fecha=$dia.', '.date("d/m/y H:i A",$fecha);
		return $fecha;
	}
?>