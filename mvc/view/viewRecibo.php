<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css " rel="stylesheet">
</head>
<body>
    <div class="container">
        <table border=1 class="table">
            <tr>
                <td>FECHA</td>
                <td><?= $data["fecha"]?></td>
            </tr>
            <tr>
                <td>MONTO</td>
                <td><?= $data["monto"] ?></td>
            </tr>
            <tr>
                <td>TOTAL</td>
                <td><?= $data["total"] ?></td>
            </tr>
            <tr>
                <td>CONCEPTO DE COMPRA</td>
                <td>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium ab dolore dolorem cupiditate eius qui minima, eos facere sunt laborum quos, veniam, expedita commodi. Ratione atque aliquam culpa maiores minima?
                    Perferendis fugit odit aliquam unde eum facilis dolor asperiores? Quibusdam repellendus perspiciatis, alias ratione voluptatem rerum quis, facere nihil blanditiis obcaecati atque, aut doloribus. Atque beatae ratione voluptatibus. Modi, distinctio.
                    Architecto minima tempore ipsam ratione incidunt odit deleniti voluptas non doloribus, eaque dolore animi, illo laudantium quas consequatur! Sunt in, iusto ex ut ducimus numquam repellat alias tempora repudiandae consequuntur!
                </td>
            </tr>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>
</body>
</html>

