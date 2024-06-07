$(document).ready(function() {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    var columns = [{
            label: 'ID',
            name: 'PurchaseOrderID',
            width: 80,
            key: true
        },
        {
            label: 'Order Date',
            name: 'OrderDate',
            width: 140
        },
        {
            label: 'Supplier ID',
            name: 'SupplierID',
            width: 80,
            editable: true
        },
        {
            label: 'Total Amount',
            name: 'TotalAmount',
            width: 100,
            editable: true
        },
        {
            label: 'Status',
            name: 'Status',
            width: 100,
            editable: true
        },
        {
            label: 'Created At',
            name: 'CreatedAt',
            width: 130
        },
        {
            label: 'Updated At',
            name: 'UpdatedAt',
            width: 130
        }
    ];

    // Initialize the jqGrid
    $("#grid").jqGrid({
        datatype: "json",
        url: 'http://localhost/ims/public/ims/purchase_order/purchase_order_data',
        colModel: columns,
        rowNum: 20,
        rowList: [20, 50, 100, 200],
        pager: '#pager',
        sortname: 'id',
        viewrecords: true,
        sortorder: 'asc',
        caption: 'Purchase Order Details',
        editurl: 'http://localhost/ims/public/ims/purchase_order/crud_operations',
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
        url: 'http://localhost/ims/public/ims/purchase_order/edit_user',
        closeAfterEdit: true,
        recreateForm: true,
        ajaxEditOptions: {
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        }
    }, {
        // Add options
        url: 'http://localhost/ims/public/ims/purchase_order/add_user',
        closeAfterAdd: true,
        recreateForm: true,
        ajaxEditOptions: {
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        }
    }, {
        // Delete options
        url: 'http://localhost/ims/public/ims/purchase_order/delete_user',
        closeAfterDelete: true,
        recreateForm: true,
        ajaxDelOptions: {
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        }
    });
});