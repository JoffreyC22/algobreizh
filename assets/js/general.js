$(document).ready(function () {
          $('#datatable').DataTable({
              "language": {
                "url": "http://cdn.datatables.net/plug-ins/1.10.10/i18n/French.json"
            },
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
});