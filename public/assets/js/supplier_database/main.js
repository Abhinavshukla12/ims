$(document).ready(function() {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    var columns = [{
            label: 'Supplier ID',
            name: 'SuppliersID',
            width: 80,
            key: true
        },
        {
            label: 'Supplier Name',
            name: 'SupplierName',
            width: 130,
            editable: true
        },
        {
            label: 'Contact Name',
            name: 'ContactName',
            width: 130,
            editable: true
        },
        {
            label: 'Address',
            name: 'Address',
            width: 120,
            editable: true
        },
        {
            label: 'City',
            name: 'City',
            width: 100,
            editable: true
        },
        {
            label: 'Postal Code',
            name: 'PostalCode',
            width: 90,
            editable: true
        },
        {
            label: 'Country',
            name: 'Country',
            width: 80,
            editable: true
        },
        {
            label: 'Phone',
            name: 'Phone',
            width: 100,
            editable: true
        }
    ];

    // Initialize the jqGrid
    $("#grid").jqGrid({
        datatype: "json",
        url: 'http://localhost/ims/public/ims/supplier_database/supplier_database_data',
        colModel: columns,
        rowNum: 20,
        rowList: [20, 50, 100, 200],
        pager: '#pager',
        sortname: 'id',
        viewrecords: true,
        sortorder: 'asc',
        caption: 'Supplier Database Details',
        editurl: 'http://localhost/ims/public/ims/supplier_database/crud_operations',
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
        url: 'http://localhost/ims/public/ims/supplier_database/edit_user',
        closeAfterEdit: true,
        recreateForm: true,
        ajaxEditOptions: {
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        }
    }, {
        // Add options
        url: 'http://localhost/ims/public/ims/supplier_database/add_user',
        closeAfterAdd: true,
        recreateForm: true,
        ajaxEditOptions: {
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        }
    }, {
        // Delete options
        url: 'http://localhost/ims/public/ims/supplier_database/delete_user',
        closeAfterDelete: true,
        recreateForm: true,
        ajaxDelOptions: {
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        }
    });
});