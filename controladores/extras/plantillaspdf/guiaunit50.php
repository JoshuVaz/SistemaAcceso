<!DOCTYPE html>
<html>

<head>

    <style>
        * {
            font-size: 10px;
            font-family: 'DejaVu Sans', serif;
        }

        h1 {
            font-size: 18px;
        }

        .ticket {
            margin: 2px;
        }

        td,
        th,
        tr,
        table {
            border-top: 1px solid black;
            border-collapse: collapse;
            margin: 0 auto;
        }

        th {
            text-align: center;
        }


        .centrado {
            text-align: center;
            align-content: center;
        }

        img {
            max-width: inherit;
            width: inherit;
        }

        * {
            margin: 0;
            padding: 0;
        }

        .ticket {
            margin: 0;
            padding: 0;
        }

        body {
            text-align: center;
        }

        .direc{
            font-size: 15px;
        }
    </style>
</head>

<?php 
$nombreImagen = "https://sys.unitelectronics.com.mx/controladores/extras/plantillaspdf/logo2.png";
$imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagen));
 ?>
<body>
    <div class="ticket centrado">
        <h1>UNIT ELECTRONICS</h1>
        <div class="container">
            <img src="<?php echo $imagenBase64 ?>" width="100"; height="100"; />
        </div>        
        <h1>Pedido: <?php echo $orden ?></h1>
        <h2>Tipo de envio: <?php echo $envio ?></h2>
        <h3><?php echo $fecha ?></h3>
        <br>
        <hr>
        <p class="direc">Nombre: <?php echo $cliente ?></p>
        <p class="direc">Telefono:<?php echo $telefono ?></p>
        <p class="direc">Direccion:<?php echo $direccion ?></p>
        <p class="direc">Alcadia/Municipio: <?php echo $alcaldia ?></p>
        <p class="direc">CP: <?php echo $cp ?></p>
        <hr>
        <br>
        <div class="container">
            <img src="<?php echo $qrpngBase64 ?>" />
        </div>
        <br>
        <hr>
        <p class="centrado">¡GRACIAS POR SU COMPRA!
            <br>uelectronics.com</p>
    </div>
</body>

</html>