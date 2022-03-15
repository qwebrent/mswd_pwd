$(document).ready(function() {
    document.title='MSWD - PWD Information';
    $('#pwdtable').DataTable({
        "language": {
            "lengthMenu": "Show _MENU_",
            "paginate":
            {
                "next": ">",
                "previous": "<"

            }
        },

    ordering: false,
    info: false,
    dom: 'Bfrtil',
     buttons: [
         'copyHtml5',
         {extend: 'print',
                exportOptions:
                    { columns:[0,1,2,3,4,5]},
         },
        {
                extend: 'excelHtml5',
                exportOptions:
                    { columns:[0,1,2,3,4,5]},
            },
         {
                extend: 'pdfHtml5',
                download: 'open',
                orientation: 'landscape',
                pageSize: 'A4',
                exportOptions:{
                    columns: [0,1,2,3,4,5]
            },
             customize : function(doc){
    doc.styles.tableHeader.alignment = 'left'; //Title Justification
    doc.content[1].table.widths = ['2.6%', '23.6%', '23.6%', '16.6%', '16.6%', '16.6%']; //Column Size
}
         }
     ],
    initComplete: function () {
        this.api().columns([2]).every( function () {
            var column = this;
            var select = $('<select class="form-control-sm form-control-alternative"><option value=""></option></select>')
                .appendTo( $(column.footer()).empty() )
                .on( 'change', function () {
                    var val = $.fn.dataTable.util.escapeRegex(
                        $(this).val()
                    );

                    column
                        .search( val ? '^'+val+'$' : '', true, false )
                        .draw();
                } );

            column.data().unique().sort().each( function ( d, j ) {
                select.append( '<option value="'+d+'">'+d+'</option>' )
            } );
        } );
    }

    });
} );
