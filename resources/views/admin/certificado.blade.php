<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Certificado de Contrato</title>
    <style>
     body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    min-height: 100vh;
    background-color: #fff;
}

.certificado {
    width: 100%;
    max-width: 800px;
    position: relative;
    text-align: center;
}

.certificado img {
    width: 100%;
    height: auto;
    display: block;
}

.certificado-texto {
    position: absolute;
    top: 30%; /* Ajusta este valor según donde empieza el texto en la imagen */
    left: 50%;
    transform: translateX(-50%);
    width: 80%;
    font-size: 17px;
    text-align: justify;
    z-index: 10;
}

</style>
    </style>
</head>
<body>
    <div class="certificado">
        <img src="{{ 'imgs/certificado_blanco.png' }}" width="100%" alt="Certificado">
    </div>
    <div class="certificado-texto">
            Que el(la) señor(a) <strong>{{ $nombreCompleto }}</strong>,
            identificado(a) con cédula de ciudadanía número <strong>{{ $docUsuario }}</strong>, <strong>{{$estadoLaboral}}</strong>
            para esta empresa desde el {{$fecha}} desempeñando el cargo de <strong>{{ $cargo }}</strong>,
            Se vinculó por medio de un contrato <strong>{{$tipoContrato}}</strong> con una duración de <strong>{{ $tiempoContrato }}</strong>,devengando un salario básico mensual de $<strong>{{ $salario }}</strong> pesos colombianos.
            <br><br>
            Se expide esta certificación a solicitud del interesado en la ciudad de Ibagué
            a los <strong>{{ $dia }}</strong> días del mes de <strong>{{ $mes }}</strong> de <strong>{{ $año }}</strong>.
            <br><br>
            Para verificación de datos del presente documento comunicarse con la Dirección de Talento Humano
            al teléfono (8) 2739402 ext. 114, teléfono celular 3174355833 en la ciudad de Ibagué,
            en el horario de 8:00 am a 12:00 m y de 2:00 pm a 6:00 pm de lunes a viernes.
        </div>

</body>
</html>
