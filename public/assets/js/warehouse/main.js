$(document).ready(function() {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    var columns = [{
            label: 'Warehouse ID',
            name: 'warehouseID',
            width: 100,
            key: true
        },
        {
            label: 'Name',
            name: 'name',
            width: 260,
            editable: true
        },
        {
            label: 'Location',
            name: 'location',
            width: 260,
            editable: true
        },
        {
            label: 'Created At',
            name: 'CreatedAt',
            width: 140
        },
        {
            label: 'Updated At',
            name: 'UpdatedAt',
            width: 140
        } 
    ];

    // Initialize the jqGrid
    $("#grid").jqGrid({
        datatype: "json",
        url: 'http://localhost/ims/public/ims/warehouse/warehouse_data',
        colModel: columns,
        rowNum: 20,
        rowList: [20, 50, 100, 200],
        pager: '#pager',
        sortname: 'id',
        viewrecords: true,
        sortorder: 'asc',
        caption: 'Warehouse Details',
        editurl: 'http://localhost/ims/public/ims/warehouse/crud_operations',
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
        url: 'http://localhost/ims/public/ims/warehouse/edit',
        closeAfterEdit: true,
        recreateForm: true,
        ajaxEditOptions: {
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        }
    }, {
        // Add options
        url: 'http://localhost/ims/public/ims/warehouse/add',
        closeAfterAdd: true,
        recreateForm: true,
        ajaxEditOptions: {
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        }
    }, {
        // Delete options
        url: 'http://localhost/ims/public/ims/warehouse/delete',
        closeAfterDelete: true,
        recreateForm: true,
        ajaxDelOptions: {
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        }
    });
});