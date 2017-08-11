<?php

if (!isset($GLOBALS ["autorizado"])) {
    include ("../index.php");
    exit();
}

class consulta {

    var $miConfigurador;
    var $lenguaje;
    var $miFormulario;
    var $miSql;
   
    function __construct($lenguaje, $formulario, $sql) {
        $this->miConfigurador = \Configurador::singleton();

        $this->miConfigurador->fabricaConexiones->setRecursoDB('principal');

        $this->lenguaje = $lenguaje;

        $this->miFormulario = $formulario;

        $this->miSql = $sql;
        }

    function miForm() {
        // Rescatar los datos de este bloque
        $esteBloque = $this->miConfigurador->getVariableConfiguracion("esteBloque");
        // ---------------- SECCION: Controles del Formulario -----------------------------------------------
			
        $esteCampo = "marcospagobi";
        $atributos ['id'] = $esteCampo;
        $atributos ["estilo"] = "jqueryui";
        $atributos ['tipoEtiqueta'] = 'inicio';
        $atributos ["leyenda"] =  $this->lenguaje->getCadena ( $esteCampo )." - Reporte : ".$_REQUEST['nombrerep'];
        echo $this->miFormulario->marcoAgrupacion ( 'inicio', $atributos );
        {?><br>
            
        <script type="text/javascript">
 
		Sbi.sdk.services.setBaseUrl({
	        protocol: '<?php echo $_REQUEST['protocol'] ?>'     
	        , host: '<?php echo $_REQUEST['ruta'] ?>'
	        , port: '<?php echo $_REQUEST['pto'] ?>'
	        , contextPath: 'SpagoBI'
	        , controllerPath: 'servlet/AdapterHTTP'

	    });
		
 	var cb = function(result, args, success) {
        
		if(success === true) {
		 this.execTest1();
        
		} else {
			alert('ERROR: Wrong username or password');
		}
    	};
		execTest1 = function() {
		    var url = Sbi.sdk.api.getDocumentUrl({
				documentLabel: '<?php echo $_REQUEST['reporte'] ?>'
				, executionRole: '/spagobi/user'
				, displayToolbar: true
				, displaySliders: true
				, iframe: {
					style: 'border: 0px;'
				}
			});
		    document.getElementById('execiframe').src = url;
		};
	Sbi.sdk.api.authenticate({ 
		params: {
			user: '<?php echo $_REQUEST['usu'] ?>'
			, password: '<?php echo $_REQUEST['acceso'] ?>'
		}
		
		, callback: {
			fn: cb
			, scope: this
			//, args: {arg1: 'A', arg2: 'B', ...}
		}
	});
	</script>      	
            <div style='width:100%; height: 500px'>
                <iframe id="execiframe" src='' height="100%" width="100%"></iframe>
             </div>
            <?php
        }
    }
}

$miSeleccionador = new consulta($this->lenguaje, $this->miFormulario, $this->sql);

$miSeleccionador->miForm();
?>
