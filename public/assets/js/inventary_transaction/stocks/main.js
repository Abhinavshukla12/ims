$(document).ready(function() {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    var columns = [{
            label: 'ID',
            name: 'id',
            width: 50,
            key: true
        },
        {
            label: 'Name',
            name: 'name',
            width: 150,
            editable: true
        },
        {
            label: 'Price',
            name: 'price',
            width: 100,
            editable: true
        },
        {
            label: 'Amount of Product',
            name: 'count',
            width: 100,
            editable: true
        } 
    ];

    // Initialize the jqGrid
    $("#grid").jqGrid({
        datatype: "json",
        url: 'http://localhost/ims/public/ims/stocks/stocks_data',
        colModel: columns,
        rowNum: 20,
        rowList: [20, 50, 100, 200],
        pager: '#pager',
        sortname: 'id',
        viewrecords: true,
        sortorder: 'asc',
        caption: 'Stocks Details',
        editurl: 'http://localhost/ims/public/ims/stocks/crud_operations',
        ajaxGridOptions: {
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        }
    });
     // Add navigation bar with add, edit, and delete buttons
     $("#grid").jqGrid('navGrid', '#pager', {
        add: true,
        edit: true,
        del: true,
        search: false,
        refresh: false
    }, {
        // Edit options
        url: 'http://localhost/ims/public/ims/stocks/edit_user',
        closeAfterEdit: true,
        recreateForm: true,
        ajaxEditOptions: {
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        }
    }, {
        // Add options
        url: 'http://localhost/ims/public/ims/stocks/add_user',
        closeAfterAdd: true,
        recreateForm: true,
        ajaxEditOptions: {
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        }
    }, {
        // Delete options
        url: 'http://localhost/ims/public/ims/stocks/delete_user',
        closeAfterDelete: true,
        recreateForm: true,
        ajaxDelOptions: {
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        }
    });
});