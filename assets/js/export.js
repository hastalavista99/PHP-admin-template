$(document).ready(function () {
    var table = $('#tenantsView').DataTable({
        lengthChange: true,
        "pageLength": 100,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    table.buttons().container()
        .appendTo('#tenantsView_wrapper .col-md-6:eq(0)');

    var table = $('#landlordView').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    table.buttons().container()
        .appendTo('#landlordView_wrapper .col-md-6:eq(0)');

    var table = $('#propertySaleView').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    table.buttons().container()
        .appendTo('#propertySaleView_wrapper .col-md-6:eq(0)');


    var table = $('#propertyView').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    table.buttons().container()
        .appendTo('#propertyView_wrapper .col-md-6:eq(0)');


    var table = $('#unitsView').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    table.buttons().container()
        .appendTo('#unitsView_wrapper .col-md-6:eq(0)');


    var table = $('#unitsSaleView').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    table.buttons().container()
        .appendTo('#unitsSaleView_wrapper .col-md-6:eq(0)');

    var table = $('#buyersTable').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    table.buttons().container()
        .appendTo('#buyersTable_wrapper .col-md-6:eq(0)');

    var table = $('#invoiceTable').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    table.buttons().container()
        .appendTo('#invoiceTable_wrapper .col-md-6:eq(0)');

    var table = $('#tenantReport').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    table.buttons().container()
        .appendTo('#tenantReport_wrapper .col-md-6:eq(0)');

    var table = $('#individualReport').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    table.buttons().container()
        .appendTo('#individualReport_wrapper .col-md-6:eq(0)');


    var table = $('#rentTble').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    table.buttons().container()
        .appendTo('#rentTable_wrapper .col-md-6:eq(0)');

    var table = $('#landlordTable').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    table.buttons().container()
        .appendTo('#landlordTable_wrapper .col-md-6:eq(0)');

    var table = $('#paymentReport').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    table.buttons().container()
        .appendTo('#paymentReport_wrapper .col-md-6:eq(0)');
});

let leaseView = new DataTable('#leaseView');

