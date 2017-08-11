<?php
/*
$menu_title = SW_PROJECT_TITLE;
$menu = array (
	array ( "language" => "en_gb", "report" => "informe_ingresos.xml", "title" => "Ingresos" )
	);
*/

$menu_title = 'Reportes';
$menu = array();

$dropdown_menu = array(
    array(
        "project" => "presupuesto",
        "title" => "Presupuesto",
        "items" => array(
        	array("reportfile" => "consecutivoDisponibilidades.xml", "title" => "Consecutivos Disponibilidades"),        		
            array("reportfile" => "ordenesPago_anuladas.xml", "title" => "Anulaciones Totales OP"),
            array("reportfile" => "giro_consecutivo.xml", "title" => "Autorización Giro - Consecutivo"),
            array("reportfile" => "registrosPresupuestales.xml", "title" => "Registro Presupuestal Consecutivo"),
            array("reportfile" => "movimientoRubros.xml", "title" => "Movimientos de Rubros"),
            array("reportfile" => "contratacion.xml", "title" => "Reporte Contratación"),
        )
    ),
     
);
?>
