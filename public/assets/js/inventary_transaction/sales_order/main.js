$(document).ready(function() {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    var columns = [{
            label: 'Order ID',
            name: 'order_id',
            width: 80,
            key: true
        },
        {
            label: 'Customer ID',
            name: 'customer_id',
            width: 80,
            editable: true
        },
        {
            label: 'Name',
            name: 'name',
            width: 130,
            editable: true
        },
        {
            label: 'Order Date',
            name: 'order_date',
            width: 140
        },
        {
            label: 'Total Amount',
            name: 'total_amount',
            width: 100,
            editable: true
        },
        {
            label: 'Status',
            name: 'status',
            width: 90,
            editable: true
        },
        {
            label: 'Created At',
            name: 'created_at',
            width: 130
        },
        {
            label: 'Updated At',
            name: 'updated_at',
            width: 130
        }
    ];

    // Initialize the jqGrid
    $("#grid").jqGrid({
        datatype: "json",
        url: 'http://localhost/ims/public/ims/sales_order/sales_order_data',
        colModel: columns,
        rowNum: 20,
        rowList: [20, 50, 100, 200],
        pager: '#pager',
        sortname: 'id',
        viewrecords: true,
        sortorder: 'asc',
        caption: 'Sales Order Details',
        editurl: 'http://localhost/ims/public/ims/sales_order/crud_operations',
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
        url: 'http://localhost/ims/public/ims/sales_order/edit_user',
        closeAfterEdit: true,
        recreateForm: true,
        ajaxEditOptions: {
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        }
    }, {
        // Add options
        url: 'http://localhost/ims/public/ims/sales_order/add_user',
        closeAfterAdd: true,
        recreateForm: true,
        ajaxEditOptions: {
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        }
    }, {
        // Delete options
        url: 'http://localhost/ims/public/ims/sales_order/delete_user',
        closeAfterDelete: true,
        recreateForm: true,
        ajaxDelOptions: {
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        }
    });
});