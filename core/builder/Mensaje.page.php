<?php
/**
 * Página para mostrar mensajes de error fatales dentro de la aplicación. Se ejecuta completa pues se espera que solo se
 * muestre en casos extremos.
 *
 * @author      Paulo Cesar Coronado
 * @version     0.0.0.2, 25/03/2012
 * @package     framework:BCK:instalacion
 * @copyright   Universidad Distrital F.J.C
 * @license    GPL Version 3.0 o posterior
 *
 */


define('ESTILO','estilo');
define('IDIOMA','idioma');
define('RAIZDOCUMENTO','raizDocumento');
define('REQUEST_URI','REQUEST_URI');
if (! $this->miConfigurador->getVariableConfiguracion ( ESTILO )) {
    
    $this->miConfigurador->setVariableConfiguracion ( ESTILO, "basico" );
}

if (! $this->miConfigurador->getVariableConfiguracion ( IDIOMA )) {
    $this->miConfigurador->setVariableConfiguracion ( IDIOMA, "es_es" );
}

/**
 * I18n
 */

$miIdioma = $this->miConfigurador->getVariableConfiguracion ( RAIZDOCUMENTO ) . "/core/locale/";
$miIdioma .= $this->miConfigurador->getVariableConfiguracion ( IDIOMA ) . "/LC_MESSAGES/Mensaje.page.php";
include $miIdioma;

$indice = strpos ( $_SERVER [REQUEST_URI], "/index.php" );

if (! $indice) {
    $indice = strpos ( $_SERVER [REQUEST_URI], "/", 1 );
}
$sitio = substr ( $_SERVER [REQUEST_URI], 0, $indice );

$_REQUEST ["jquery"] = true;
?>
<html>
<head>
<title></title>
<?php include_once $this->miConfigurador->getVariableConfiguracion(RAIZDOCUMENTO)."/plugin/scripts/Script.php"?>
<script>
$(window).load(function() {
    $("#mensaje").fadeIn(1000);
    
});

<?php
if (isset ( $url )) {
    ?>
      window.setTimeout(function(){
        window.location.href ="<?php echo $url?>";
    }, 3000);
    
    <?php
}
?>
</script>
<?php include_once $this->miConfigurador->getVariableConfiguracion(RAIZDOCUMENTO)."/theme/".$this->miConfigurador->getVariableConfiguracion(ESTILO)."/Estilo.php"?>

<meta content="text/html;" http-equiv="content-type" charset="utf-8">
</head>
<body>
<div id="mensaje" class="<?php echo $tipoMensaje ?> shadow ocultar"><?php
echo $this->idioma [$mensaje];

?></div>
</body>
</html>
