<?php

    $titulo="Dashboard";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--Incluye el head-->
    <?php include_once("../partials/head.php"); ?>
    <!--CSS de tablas para ajustar los botones-->
    <link href="../css/tablas.css" rel="stylesheet">

    <!--CSS del menú-->
    <link href="../css/menu.css" rel="stylesheet" type="text/css" />
    <link href="../css/general.css" rel="stylesheet">

    <!--CSS Morris-->
    <link rel="stylesheet" href="../css/morris.css">

    <title>Transparencia - Solicitudes del 2019</title>
</head>
<body class="cuerpo">

    <!--Incluye el header-->
    <?php include_once("../partials/header.php"); ?>

    <!-- Incluye el menú de navegación -->
    <?php include_once("../partials/navigation.php"); ?>

    <div class="album py-5 bg-light  ">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shado">
                        <h4 style="text-align: center;">Tipo de alcance: </h4>
                        <div id="graph"></div>
                        <div class="card-body">
                            <p class="card-text">El alcance se los eventos puede determinar cuanta exposicion podria brindar dicho evento.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">button</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">button</button>
                                </div>
                                <small class="text-muted">31 Oct 2019</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <h4 style="text-align: center;">Paises mas seleccionados</h4>
                        <div id="graph2"></div>
                        <div class="card-body">
                            <p class="card-text">Los paises mas seleccionados para los viajes de los estudiantes.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">button</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">button</button>
                                </div>
                                <small class="text-muted">dd/mm/yy</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <h4 style="text-align: center;">Tipo de evento.</h4>
                        <div id="graph3"></div>
                        <div class="card-body">
                            <p class="card-text">Tipo de evento mas seleccionado al momento de realizar una peticion a la U.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">button</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">button</button>
                                </div>
                                <small class="text-muted">dd/mm/yy</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>      
    <!--Incluye el footer-->
    <?php include_once ("../partials/footer.php"); ?>

<script>
    $(function () {
        Morris.Donut({
    element: 'graph',
    data: [
        {value: 65, label: 'Internacional', formatted: '65% de los estudiantes' },
        {value: 35, label: 'Nacional', formatted: '35% de los estudiantes' },
    ],
    formatter: function (x, data) { return data.formatted; }
    });
    });

    $(function () {
        Morris.Donut({
    element: 'graph2',
    data: [
        {value: 25, label: 'Costa Rica', formatted: '25% de los estudiantes' },
        {value: 45, label: 'Mexico', formatted: '45% de los estudiantes' },
        {value: 25, label: 'Estados Unidos', formatted: '25% de los estudiantes' },
        {value: 5, label: 'Paraguay', formatted: '5% de los estudiantes' }
    ],
    formatter: function (x, data) { return data.formatted; }
    });
    });

    $(function () {
        Morris.Donut({
    element: 'graph3',
    data: [
        {value: 45, label: 'Deportivo', formatted: '45% de los estudiantes' },
        {value: 55, label: 'Cultural', formatted: '55% de los estudiantes' },
    ],
    formatter: function (x, data) { return data.formatted; }
    });
    });
</script>

</body>
</html>