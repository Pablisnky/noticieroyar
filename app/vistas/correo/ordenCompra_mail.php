<!-- Invocado desde RecibePedidoMayorista_C.php -->
<?php
    $email_subject = $DatosCorreo['informacion_tienda'][0]['nombre_Tien'] .", nuevo pedido para despachar";
    $email_to = $DatosCorreo['informacion_tienda'][0]['correo_AfiCom'] ;

    // Para enviar un correo HTML, debe establecerse la cabecera Content-type
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: PedidoRemoto <despachos@pedidoremoto.com>" . "\r\n";
    $headers .= "Bcc: pcabeza7@gmail.com";

    $email_message =
        '<!DOCTYPE html PUBLIC"-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                <meta name="viewport" content="width=device-width, initial-scale=1"/>
                <title>Este es un mensaje</title>
                <style type="text/css">
                    body{margin: 0; padding: 0; min-width: 100% !important;}
                    h1{color: #8bc34a;}
                    p{font-size: 1rem;}
                    img{width: 10rem; height: 10rem; margin-top: 5%}
                    tr{height: 15px}
                    .hr_1{margin-bottom: 1%;}
                    .td_1{text-align: left; width: 180px;}
                    .tr_1{height: 30px;}
                    @media(max-width: 800px){/*medio con dimensiones menores a lo indicado*/
                        img{width: 6rem; height: 6rem; margin-top: 10%}
                        h1{font-size: 1.6em}
                        .img__capture{width: 8rem; height: 8rem}
                    }
                </style>
            </head>
            <body>
                <h1>Orden de compra</h1>     
                <p>Antes de realizar el despacho verifique en su cuenta bancaria <br>el numero de referencia de pago o el capture suministrado en la orden de compra</p>
                <h2>Datos de la compra</h2>      
                <table>';
                    foreach($DatosCorreo['informacion_pedido'] as $DatosCompra) :
                        $Capture =  $DatosCompra['capture'];
                        $email_message .= "<tr>";
                        $email_message .= "<td class='td_1'>Nro. Orden</td>";
                        $email_message .= "<td>" . $DatosCompra["numeroorden"] ."</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr>";
                        $email_message .= "<td class='td_1'>FECHA</td>";
                        $email_message .= "<td>" . $DatosCompra['fecha'] . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr>";
                        $email_message .= "<td class='td_1'>HORA</td>";
                        $email_message .= "<td>" . $DatosCompra["hora"] . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr>";
                        $email_message .= "<td class='td_1'>DESPACHO</td>";
                        $email_message .= "<td>" . $DatosCompra["despacho"] . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr>";
                        $email_message .= "<td class='td_1'>FORMA DE PAGO</td>";
                        $email_message .= "<td>" . $DatosCompra["formaPago"] . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr>";
                        $email_message .= "<td class='td_1'>REFERENCIA BANCARIA</td>";
                        $email_message .= "<td>" . $DatosCompra["codigoPago"] . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr>";
                        $email_message .= "<td class='td_1'>MONTO EN TIENDA</td>";
                        $email_message .= "<td>" . $DatosCompra["montoTienda"] . ' Bs.' . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr>";
                        $email_message .= "<td class='td_1'>MONTO ENVIO</td>";
                        $email_message .= "<td>" . $DatosCompra["montoDelivery"]  . ' Bs.' . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr>";
                        $email_message .= "<td class='td_1'>TOTAL PAGADO</td>";
                        $email_message .= "<td>" . $DatosCompra["montoTotal"] . ' Bs.' . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<td class='td_1'>CAPTURE</td>";
                        $email_message .= "<td><img class='img__capture' src='https://pedidoremoto.com/public/images/capture/" . $Capture ."'></td>";
                        break;
                    endforeach;
                $email_message .= '</table>
                <hr class="hr_1">
                <h2>Datos del pedido</h2>
                <table>';
                    foreach($DatosCorreo['informacion_pedido'] as $DatosPedido) :
                        $email_message .= "<tr>";
                        $email_message .= "<td>PRODUCTO</td>";
                        $email_message .= "<td class='td_1'>" . $DatosPedido["producto"] . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr>";
                        $email_message .= "<td class='td_1'>ESPECIFICACIONES</td>";
                        $email_message .= "<td>" . $DatosPedido["opcion"] . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr>";
                        $email_message .= "<td class='td_1'>PRECIO UNITARIO</td>";
                        $email_message .= "<td>" . $DatosPedido["precio"] . " Bs." . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr>";
                        $email_message .= "<td class='td_1'>CANTIDAD</td>";
                        $email_message .= "<td>" . $DatosPedido["cantidad"] . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr>";
                        $email_message .= "<td class='td_1'>SUB-TOTAL</td>";
                        $email_message .= "<td>" . $DatosPedido["total"] . " Bs." . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr  class='tr_1'>";
                        $email_message .= "</tr>";
                    endforeach;
                $email_message .= '</table>

                <hr class="hr_1">  
                <h2>Código de despacho</h2> 
                <h2>' . $DatosCorreo["Codigo_despacho"] . '</h2>                
                <hr class="hr_1">
                <h2>Datos del comprador</h2>

                <table>';
                    foreach($DatosCorreo['informacion_usuario'] as $DatosUsuarios)  :
                        $email_message .= "<tr>";
                        $email_message .= "<td class='td_1'>NOMBRE</td>";
                        $email_message .= "<td>" . $DatosUsuarios["nombre_usu"] . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr>";
                        $email_message .= "<td>APELLIDO</td>";
                        $email_message .= "<td>" . $DatosUsuarios["apellido_usu"] . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr>";
                        $email_message .= "<td>CEDULA</td>";
                        $email_message .= "<td>" . $DatosUsuarios["cedula_usu"] . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr>";
                        $email_message .= "<td>TELEFONO</td>";
                        $email_message .= "<td>" . $DatosUsuarios["telefono_usu"] . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr>";
                        $email_message .= "<td>DIRECCIÓN</td>";
                        $email_message .= "<td>" . $DatosUsuarios["direccion_usu"] . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr>";
                        $email_message .= "<td>CIUDAD</td>";
                        $email_message .= "<td>" . $DatosUsuarios["Ciudad_usu"] . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr>";
                        $email_message .= "<td>ESTADO</td>";
                        $email_message .= "<td>" . $DatosUsuarios["Estado_usu"] . "</td>";
                        $email_message .= "</tr>";
                    endforeach;
                $email_message .= '</table>

                <p>Gracias por confiar en nuestro servicio</p>
                
                <img src="https://pedidoremoto.com/public/images/logo.png">
                <a href="https://www.pedidoremoto.com">www.pedidoremoto.com</a>
                
            </body>
        </html>';

        // $email_message = wordwrap($email_message, 70, "\r\n");
        $success = @mail($email_to, $email_subject, $email_message, $headers);

        //Se captura un error si el correo no pudo ser enviado
        if(!$success) {
            $errorMessage = error_get_last()['message'];
        }
?>