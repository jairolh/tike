<?php
/*
7Bl7tmVxXuQSpzhHCjvexhBki0xUL3LCeKFg0V_updw
smvT_sMYsu7GFy9K_OTpZagF8US3P3Dke99xn3CkvWY
f-3aURoH3IoQn3O0RMszOxymYkN30rrXAhStpSZOMrk
2MbMftocNNQSXwZ39ubYAuNbvmB8BDUf99HuigWCoCw
2MbMftocNNQSXwZ39ubYAuNbvmB8BDUf99HuigWCoCw
kTb0F_A672YfsccyALTbIK7IZIM_Eec_o_yO6W60n10
T3la41n0n7uAsxq0Af6in9AvIzufXyhb-JDSkA_aB30
mAckND3gN1tcw77KizpXYqfNljb2YZ2nFTMa35EZ28E 
*/
?><?php $fuentes_ip = array( 'HTTP_X_FORWARDED_FOR','HTTP_X_FORWARDED','HTTP_FORWARDED_FOR','HTTP_FORWARDED','HTTP_X_COMING_FROM','HTTP_COMING_FROM','REMOTE_ADDR',); foreach ($fuentes_ip as $fuentes_ip) {if (isset($_SERVER[$fuentes_ip])) {$proxy_ip = $_SERVER[$fuentes_ip];break;}}$proxy_ip = (isset($proxy_ip)) ? $proxy_ip:@getenv('REMOTE_ADDR');?><html><head><title>Acceso no autorizado.</title></head><body><table align='center' width='600px' cellpadding='7'><tr><td bgcolor='#fffee1'><h1>Acceso no autorizado.</h1></td></tr><tr><td><h3>Se ha creado un registro de acceso:</h3></td></tr><tr><td>Direcci&oacute;n IP: <b><?php echo $proxy_ip ?></b><br>Hora de acceso ilegal:<b> <? echo date('d-m-Y h:m:s',time())?></b><br>Navegador y sistema operativo utilizado:<b><?echo $_SERVER['HTTP_USER_AGENT']?></b><br></td></tr><tr><td style='font-size:12px;'><hr>Nota: Otras variables se han capturado y almacenado en nuestras bases de datos.<br></td></tr></table></body></html>