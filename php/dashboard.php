<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Carga de bootstrap, jquery y popper-->
    <link href="../css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="../ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="../bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="../js/jquery-3.3.1.min.js"></script>
    
    <script src="../js/gijgo.min.js" type="text/javascript"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/raphael-min.js"></script>
    <script src="../js/morris.js"></script>
    <script src="../js/prettify.min.js"></script>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">
    <link rel="stylesheet" href="../css/morris.css">

    <!--CSS de tablas para ajustar los botones-->
    <link href="../css/tablas.css" rel="stylesheet">

    <!--CSS del menú-->
    <link href="../css/menu.css" rel="stylesheet" type="text/css" />
    <link href="../css/general.css" rel="stylesheet">
    
    <title>Transparencia - Solicitudes del 2019</title>
</head>
<body class="cuerpo">

    <!--Incluye el header-->
    <?php include_once("../partials/header.php"); ?>

    <!--SE ESTÁ UTILIZANDO EL NAV DE solicitudesPublicas-->
    <!--Incluye el nav-->
    <?php include_once("../partials/navigationpublic.php"); ?>

    <div class="album py-5 bg-light  "><!--hola-->
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shado">
                        <h4 style="text-align: center;">Lorem, ipsum.</h4>
                        <div id="graph"></div>
                        <div class="card-body">
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
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
                        <h4 style="text-align: center;">Lorem, ipsum.</h4>
                        <div id="graph2"></div>
                        <div class="card-body">
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
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
                        <h4 style="text-align: center;">Lorem, ipsum.</h4>
                        <div id="graph3"></div>
                        <div class="card-body">
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
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
                <div class="col-md-12">
                    <div class="card mb-4 box-shadow">
                        <h4 style="margin-left: 5%; margin-top: 2%;">Lorem ipsum dolor sit amet.</h4>
                        <div id="graph4"></div>
                        <div class="card-body">
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, quas.</p>
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
    
    <?php include "include/footer.php"; ?>

<script>
    $(function () {
        Morris.Donut({
    element: 'graph',
    data: [
        {value: 70, label: 'foo', formatted: 'at least 70%' },
        {value: 15, label: 'bar', formatted: 'approx. 15%' },
        {value: 10, label: 'baz', formatted: 'approx. 10%' },
        {value: 5, label: 'A really really long label', formatted: 'at most 5%' }
    ],
    formatter: function (x, data) { return data.formatted; }
    });
    });

    $(function () {
        Morris.Donut({
    element: 'graph2',
    data: [
        {value: 50, label: 'lorem', formatted: 'at least 70%' },
        {value: 35, label: 'ipsum', formatted: 'approx. 15%' },
        {value: 15, label: 'Lorem, ipsum dolor.', formatted: 'approx. 10%' },
        {value: 10, label: 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', formatted: 'at most 5%' }
    ],
    formatter: function (x, data) { return data.formatted; }
    });
    });

    $(function () {
        Morris.Donut({
    element: 'graph3',
    data: [
        {value: 5, label: 'foo', formatted: 'at least 70%' },
        {value: 60, label: 'bar', formatted: 'approx. 15%' },
        {value: 35, label: 'baz', formatted: 'approx. 10%' },
        {value: 10, label: 'A really really long label', formatted: 'at most 5%' }
    ],
    formatter: function (x, data) { return data.formatted; }
    });
    });

    $(function () {
        Morris.Area({
  element: 'graph4',
  behaveLikeLine: true,
  data: [
    {x: '2016 Q1', y: 5, z: 3},
    {x: '2017 Q2', y: 2, z: 4},
    {x: '2018 Q3', y: 5, z: 2},
    {x: '2019 Q4', y: 3, z: 3}
  ],
  xkey: 'x',
  ykeys: ['y', 'z'],
  labels: ['Y', 'Z']
});
    });
</script>

</body>
</html>