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
            array("reportfile" => "ordenesPago_anuladas.xml", "title" => "Anulaciones Totales OP"),
          
        )
    ),
     
);
?>