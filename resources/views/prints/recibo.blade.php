<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WEB PAES</title>
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

</head>
<body class="bg-gray-200">
    <center>
        <table width="800" border="0" bgcolor="green" id="element-to-print">
            <tr>
                <td bgcolor="white">
                    <table border="0" width="100%">
                        <tr>
                            <td width="40%" align="center">
                                <img src="https://apeprev.com.br/img/logo.png" width="100">
                                <br>
                            </td>
                            <td width="60%">
                                <table width="100%" border="0">
                                    <tr>
                                        <td width="50%">
                                            <font face="Arial" size="2" color="green">
                                                AV CANDIDO DE ABREU, 660 <br>
                                                EDIFICIO PALLADIUM - SALA 407 <br>
                                                CENTRO CÍVICO - 80.530-000 <br>
                                                Curitiba/PR <br>
                                                <font face="Arial" size="2" color="green">Fone: (41) 98791-4672
                                        </td>
                                        <td width="50%">
                                            <font face="Arial" size="6" color="green">
                                                <b>RECIBO</b>
                                                <br>
                                                <font face="Arial" size=4 color="green">
                                                    <b>R$ {{ form_read($model->instituicao_vigente->valor) }}
                                        </td>
                                    </tr>
                                </table>
                            </td>

                        </tr>
                    </table>
                </td>
            </tr>
            <tr height="25" style="background-color: darkgreen">
                <td bgcolor="green" align="center">
                    <font color="white" face="Arial" size="2">
                        CNPJ: 05.763.089/0001-61
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; www.apeprev.com.br
                </td>
            </tr>
            <tr>
                <td bgcolor="white" align="center">
                    <br>
                    <table width="100%" cellpadding="20" cellspacing="0">
                        <tr>
                            <td>
                                <font face="Arial" size="2" color="green">
                                    Recebemos de <b>{{ \Str::beforeLast($model->name, '-') }} </b> ({{$model->address->city}} / {{$model->address->state}}) CNPJ Nº {{ $model->document }}
                                    <br>
                                    <br>
                                    A importância de <b>{{ form_read($model->instituicao_vigente->valor) }}</b> (oitocentos e cinco reais) referente anuidade
                                    {{ $model->instituicao_vigente->year }}
                                    <br>
                                    <br>
                                    <!-- OBS.:  -->
                                    <br>
                                    <br>
                                    <center>Curitiba/PR, {{ date_carbom_format($model->instituicao_vigente->payment_date)->format("d/m/Y") }}
                                        <!-- data que foi pago: 21/02/2021 -->
                                        <br>
                                        <br>
                                        <img src="{{ \Storage::url('images/AssinaturaMarcioApolinario.png')}}">
                            </td>
                        </tr>
                    </table>
                    <br>
                </td>
            </tr>
        </table>
        <br>
        {{-- @if ($model)
            <script>
                var element = document.getElementById('element-to-print');

                var worker = html2pdf().set({
                    filename: '{{ $model->slug }}.pdf',
                    pagebreak: {
                        mode: 'avoid-all'
                    },
                    // jsPDF:        { unit: 'em', format: 'a4', orientation: 'portrait' }
                }).from(element).save();
                window.addEventListener("load", function(event) {});
            </script>
        @endif --}}
</body>
</html>
