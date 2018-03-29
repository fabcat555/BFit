function indexTable(table, languageUrl) {
    var indexTable = $(table).DataTable( {
        info: false,
        language: {
            url: languageUrl 
        },
        buttons: [
            'copy', 'excel', 'pdf'
        ],
        initComplete: function () {
            setTimeout( function () {
                indexTable.buttons().container().appendTo( $('.col-sm-5', indexTable.table().container() ) );
            }, 10 );
        }
    });
    return indexTable;
}