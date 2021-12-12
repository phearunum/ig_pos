$(function() {
    // Setting datatable defaults
    $.extend( $.fn.dataTable.defaults, {
        //dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        pagingType: "full_numbers",
        language: {
            loadingRecords: "<div class='loader'><div class='circle'></div><div class='circle'></div><div class='circle'></div><div class='circle'></div><div class='circle'></div></div>",
            search: '<span>Filter:</span> _INPUT_',
            searchPlaceholder: 'Type to filter...',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        }
    });
});
