$(document).ready(function() {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    var columns = [
        { label: 'Order ID', name: 'order_id', width: 90, key: true, cellattr: function () { return 'style="background-color: #FFDDC1"'; } },
        { label: 'Customer ID', name: 'customer_id', width: 130, editable: true, cellattr: function () { return 'style="background-color: #FFE4C4"'; } },
        { label: 'Name', name: 'name', width: 150, editable: true, cellattr: function () { return 'style="background-color: #FFECB3"'; } },
        { label: 'Address', name: 'address', width: 200, editable: true, cellattr: function () { return 'style="background-color: #D1C4E9"'; } },
        { label: 'Order Date', name: 'order_date', width: 150, editable: true, cellattr: function () { return 'style="background-color: #C5CAE9"'; } },
        { label: 'Quantity', name: 'quantity', width: 180, editable: true, cellattr: function () { return 'style="background-color: #BBDEFB"'; } },
        { label: 'Price', name: 'price', width: 180, editable: true, cellattr: function () { return 'style="background-color: #B3E5FC"'; } },
        { label: 'Created Date', name: 'created_at', width: 160, cellattr: function () { return 'style="background-color: #B2EBF2"'; } },
        { label: 'Updated Date', name: 'updated_at', width: 160, cellattr: function () { return 'style="background-color: #B2DFDB"'; } }
    ];

    $("#grid").jqGrid({
        url: 'http://localhost/ims/public/ims/sales/sales_data',
        datatype: "json",
        colModel: columns,
        viewrecords: true,
        height: 'auto',
        rowNum: 20,
        rowList: [20, 50, 100, 150, 200],
        pager: '#pager',
        sortname: 'order_id',
        sortorder: 'asc',
        caption: 'Sales Details',
        autowidth: true,
        shrinkToFit: true,
        multiselect: true,
        toolbarfilter: true,
        editurl: 'http://localhost/ims/public/ims/sales/crud_operations',
        ajaxGridOptions: {
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        },
        loadError: function(xhr, status, error) {
            alert('Error: ' + error);
        }
    });

    $("#grid").jqGrid('navGrid', '#pager', {
        add: true,
        edit: true,
        del: true,
        search: true,
        refresh: true
    }, {
        // Edit options
        url: 'http://localhost/ims/public/ims/sales/edit',
        closeAfterEdit: true,
        recreateForm: true,
        ajaxEditOptions: {
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        }
    }, {
        // Add options
        url: 'http://localhost/ims/public/ims/sales/add',
        closeAfterAdd: true,
        recreateForm: true,
        ajaxEditOptions: {
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        }
    }, {
        // Delete options
        url: 'http://localhost/ims/public/ims/sales/delete',
        closeAfterDelete: true,
        recreateForm: true,
        ajaxDelOptions: {
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        }
    });

    $("#grid").jqGrid('inlineNav', '#pager', {
        edit: true,
        add: true,
        del: true,
        cancel: true,
        save: true,
        editParams: {
            keys: true,
            oneditfunc: function(rowid) {
                // Custom code on edit
            },
            successfunc: function(response) {
                // Custom code on success
                return true;
            },
            errorfunc: function(rowid, response) {
                // Custom code on error
                alert('Error: ' + response.responseText);
            }
        }
    });

    $("#grid").jqGrid('filterToolbar', {
        stringResult: true,
        searchOnEnter: false,
        defaultSearch: 'cn'
    });

    $("#grid").jqGrid('navButtonAdd', '#pager', {
        caption: "Export",
        buttonicon: "ui-icon-extlink",
        onClickButton: function() {
            // Custom code for exporting data
            alert('Export button clicked');
        },
        position: "last"
    });
});
