<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $model->name }}</title>

    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
</head>

<body>
    <div id="element-to-print"
        style="position: relative; display: flex;width: 806px;height: 567px;margin: 0 auto; text-transform: uppercase;font-family: sans-serif">
        <img style="width: 806px;height: 567px;" src="{{ \Storage::url('images/certificado-filiacao.png') }}"
            alt="">
        <span
            style="position: absolute;top: 377px;left: 169px;color: #b7c0c7;">{{ str_pad($model->instituicao_vigente->count(), 7, '0', STR_PAD_LEFT) }}</span>
        <span
            style="position: absolute;top: 350px;left: 127px;color: #b2bcc4;">DEZEMBRO/{{ $model->instituicao_vigente->year }}</span>
        <span style="position: absolute;top: 252px;left: 505px;color: #005c9f;">{{ $model->document }}</span>
        <span style="position: absolute;top: 295px;left: 505px;color: #005c9f;">{{ $model->name }}</span>
        <span style="position: absolute;top: 338px;left: 505px;color: #005c9f;">{{ $model->address->street }}</span>
        <span style="position: absolute;top: 380px;left: 505px;color: #005c9f;">{{ $model->address->zip }}</span>
        <span
            style="position: absolute;top: 425px;left: 505px;color: #005c9f;">{{ $model->address->city }}/{{ $model->address->state }}</span>
    </div>
    @if ($model)
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
    @endif
</body>

</html>
