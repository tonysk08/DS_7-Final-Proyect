  <!-- Font Awesome  -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS  -->
  <link rel="stylesheet" href="../bootstrap/4.3.1/css/bootstrap.min.css">
  <!-- Material Design Bootstrap  -->
  <link rel="stylesheet" href="../css/mdb.min.css">
  <!-- DataTables.net  -->
  <link rel="stylesheet" type="text/css" href="../css/addons/datatables.min.css">
  <link rel="stylesheet" href="../css/addons/datatables-select.min.css">

  <!-- SCRIPTS  -->
  <!-- JQuery  -->
  <script src="../js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips  -->
  <script type="text/javascript" src="../js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript  -->
  <script type="text/javascript" src="../bootstrap/4.3.1/js/bootstrap.js"></script>
  <!-- MDB core JavaScript  -->
  <script type="text/javascript" src="../js/mdb.min.js"></script>
  <!-- DataTables  -->
  <script type="text/javascript" src="../js/addons/datatables.min.js"></script>
  <!-- DataTables Select  -->
  <script type="text/javascript" src="../js/addons/datatables-select.min.js"></script>
  <!-- Custom scripts -->
  <script>
    $('#dtMaterialDesignExample').DataTable();

    $('#dt-material-checkbox').dataTable({

      columnDefs: [{
        orderable: false,
        className: 'select-checkbox',
        targets: 0
      }],
      select: {
        style: 'os',
        selector: 'td:first-child'
      }
    });

    $('#dtMaterialDesignExample_wrapper, #dt-material-checkbox_wrapper').find('label').each(function () {
      $(this).parent().append($(this).children());
    });
    $('#dtMaterialDesignExample_wrapper .dataTables_filter, #dt-material-checkbox_wrapper .dataTables_filter').find(
      'input').each(function () {
      $('input').attr("placeholder", "Buscar    ");
      $('input').removeClass('form-control-sm');
    });
    $('#dtMaterialDesignExample_wrapper .dataTables_length, #dt-material-checkbox_wrapper .dataTables_length').addClass(
      'd-flex flex-row');
    $('#dtMaterialDesignExample_wrapper .dataTables_filter, #dt-material-checkbox_wrapper .dataTables_filter').addClass(
      'md-form');
    $('#dtMaterialDesignExample_wrapper select, #dt-material-checkbox_wrapper select').removeClass(
      'custom-select custom-select-sm form-control form-control-sm');
    $('#dtMaterialDesignExample_wrapper select, #dt-material-checkbox_wrapper select').addClass('mdb-select');
    $('#dtMaterialDesignExample_wrapper .mdb-select, #dt-material-checkbox_wrapper .mdb-select').materialSelect();
    $('#dtMaterialDesignExample_wrapper .dataTables_filte, #dt-material-checkbox_wrapper .dataTables_filterr').find(
      'label').remove();

  </script>