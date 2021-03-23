$(document).ready(function () {
    //SECTION Datatable
    //Datatable options go here!
    $('#locations-table').DataTable({
        "processing": true,
        "order": [
            [1, "asc"]
        ],
        "columnDefs": [{
                "targets": [2, 3],
                "orderable": false,
                "searchable": false,
                "width": "35em", "targets": 0
            },
            {
                targets: [0, 1, 2, 3],
                className: 'dt-body-center'
            }
        ]
    });

    $('#buildings-table').DataTable({
        "processing": true,
        "order": [
            [1, "asc"]
        ],
        "columnDefs": [{
                "targets": 2,
                "orderable": false,
                "searchable": false,
                "width": "35em", "targets": 0
            },
            {
                targets: [0, 1, 2],
                className: 'dt-body-center'
            }
        ]
    });
});

// Normalize special characters.
$.fn.DataTable.ext.type.search.string = function (data) {
    return !data ?
        '' :
        typeof data === 'string' ?
        data
        .replace(/[áÁàÀâÂäÄãÃåÅæÆ]/g, 'a')
        .replace(/[çÇ]/g, 'c')
        .replace(/[éÉèÈêÊëË]/g, 'e')
        .replace(/[íÍìÌîÎïÏîĩĨĬĭ]/g, 'i')
        .replace(/[ñÑ]/g, 'n')
        .replace(/[óÓòÒôÔöÖœŒ]/g, 'o')
        .replace(/[ß]/g, 's')
        .replace(/[úÚùÙûÛüÜ]/g, 'u')
        .replace(/[ýÝŷŶŸÿ]/g, 'n') :
        data;
};
