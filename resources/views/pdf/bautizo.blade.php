<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Constancia de Bautizo</title>
    <link rel="stylesheet" href="{{ public_path('assets/css/font.css') }}">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
            background-color: white;
            color: #000;
        }

        @page {
            size: A4;
            margin: 1cm;
        }

        .certificate {
            width: 16.59cm;
            height: 25cm;
            padding: 40px;
            margin: auto;
            border: 5px double #3d69a8;
            border-radius: 15px;
            box-sizing: border-box;
            position: relative;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        h2,
        .form-group label {
            color: #3d69a8;

        }

        h2 {
            font-family: 'Dexterous', Times, serif !important;
        }

        .form-group label {
            font-weight: 500;
            color: #3d69a8;
            font-size: 1.1rem;
        }

        .subtitle {
            font-family: 'Dexterous', Times, serif !important;
            color: #1e40af;
            font-size: 14px;
            margin: 0;
        }

        .title {
            color: #3d69a8;
            font-size: 28px;
            max-width: 300px;
            font-weight: bold;
            padding: 5px 15px;
            margin-top: 10px;
            border: 3px solid #3d69a8;
            border-radius: 7px;
            display: inline-block;
        }

        .form-content,
        .form-group span {
            font-size: 1.2rem;
            line-height: 1.6;
            /* Ajuste del interlineado */
        }

        .form-group {
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .form-group.date-group {
            justify-content: space-evenly;
        }

        .text-center {
            text-align: center;
        }

        img.logo {
            position: absolute;
            height: 50px;
            top: 10px;
        }

        img.logo.left {
            top: 120px;
            left: 80px;
            width: 80px;
            height: 110px;
        }

        img.logo.right {
            right: 10px;
            height: 220px;
        }

        img.logo.cruzz {
            right: 10px;
            left: 10px;
            height: 220px;
        }

        span {
            text-decoration: underline;
        }

        img.test-image {
            display: block;
            margin: 20px auto;
            width: 100%;
            height: auto;
        }

        .h2 {
            font-family: 'Dexterous', Times, serif !important;
            color: #3d69a8;
            font-size: 2.1rem;
            text-decoration: none !important;
        }


        .signature-line-l {
            position: absolute;
            right: 40px;
            width: 350px;
            margin-top: 60px !important;
            color: #3d69a8;
            text-align: right;
        }

        .signature-line-l hr {
            width: 100%;
            border-top: 1px solid #3d69a8;
        }

        .signature-line-l p {
            margin-top: 0px;
            margin-right: 150px;            
        }
    </style>
</head>

<body>
    <div class="certificate">
        <img src="{{ public_path('assets/img/logo_parroquia.png') }}" alt="Logo Parroquia" class="logo left">
        <img src="{{ public_path('assets/img/Mercedes.png') }}" alt="Mercedes" class="logo right">
        <img src="{{ public_path('assets/img/Cruz.png') }}" alt="Mercedes" class="logo  cruzz">

        <div class="header">
            <span class="h2">Parroquia Nuestra Señora de Las Mercedes</span>
            <p class="subtitle">Diócesis de Jalapa</p>
            <p class="subtitle">Calle al Calvario, Barrio el Centro, Sanarate, El Progreso</p>
            <div class="title">CONSTANCIA DE BAUTIZO</div>
        </div>

        <div class="form-content">
            <div class="form-group" style="width: 20cm;">
                <label for="parroco">El infrascrito, Párroco:</label>
                <span>{{ $bautizo->nombre_sacerdote }}</span>
            </div>

            <p class="text-center"
                style=" font-weight: 500;
            color: #3d6aa8de;
            font-size: 1.1rem;">Certifica que en
                el libro de Bautizos:</p>
            <div class="form-group">
                <label for="libro">No.:</label>
                <span>{{ $bautizo->NoPartida }}</span>
                <label for="folio" style="margin-left: 10px;">Folio:</label>
                <span>{{ $bautizo->folio }}</span>
                <label style="margin-left: 10px;">de esta Parroquia consta que:</label>
            </div>
            <div class="form-group">
                <span>{{ $bautizo->nombre_persona_bautizada }}</span>
            </div>
            <div class="form-group">
                <label for="dia">Nacid@ el</label>
                <span>{{ \Carbon\Carbon::parse($bautizo->fecha_nacimiento)->format('d') }}</span>
                <label for="mes" style="margin-left: 5px;">de</label>
                <span>{{ \Carbon\Carbon::parse($bautizo->fecha_nacimiento)->format('F') }}</span>
                <label for="ano" style="margin-left: 5px;">de</label>
                <span>{{ \Carbon\Carbon::parse($bautizo->fecha_nacimiento)->format('Y') }}</span>
            </div>
            <div class="form-group">
                <label for="dia">Fue bautizad@ el</label>
                <span>{{ \Carbon\Carbon::parse($bautizo->fecha_bautizo)->format('d') }}</span>
                <label for="mes" style="margin-left: 5px;">de</label>
                <span>{{ \Carbon\Carbon::parse($bautizo->fecha_bautizo)->format('F') }}</span>
                <label for="ano" style="margin-left: 5px;">de</label>
                <span>{{ \Carbon\Carbon::parse($bautizo->fecha_bautizo)->format('Y') }}</span>
            </div>

            <div class="form-group">
                <label>hijo de</label>
                <span>{{ $bautizo->nombre_padre }}</span>
            </div>
            <div class="form-group">
                <label>y de</label>
                <span>{{ $bautizo->nombre_madre }}</span>
            </div>

            <div class="form-group">
                <label>habiendo sido madrina y padrino</label>
                <span>{{ $bautizo->nombre_padrino }} y {{ $bautizo->nombre_madrina }}</span>
            </div>
            <div class="form-group">
                <label>Margen:</label>
                <span>{{ $bautizo->margen }}</span>
            </div>

            <div class="form-group date-group" style="width: 16.59cm !important; margin-top:45px;">
                <span class="day">{{ now()->format('d') }}</span>
                <label>. de </label>
                <span class="month">{{ now()->locale('es')->isoFormat('MMMM') }}</span>
                <label>. de </label>
                <span class="year">{{ now()->format('Y') }}</span>
            </div>
        </div>
        <div class="signature-line-l">
            <hr>
            <p><strong>Parroco</strong></p>
        </div>
    </div>
</body>

</html>