$(document).ready(function() {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Sales table columns similar to stock table
    var columns = [
        { label: 'Order ID', name: 'order_id', width: 90, key: true, cellattr: function () { return 'class="order-id-cell"'; }, title: 'Unique Order Identifier' },
        { label: 'Customer ID', name: 'customer_id', width: 130, editable: true, cellattr: function () { return 'class="customer-id-cell"'; }, title: 'Customer Identifier' },
        { label: 'Name', name: 'name', width: 150, editable: true, cellattr: function () { return 'class="name-cell"'; }, title: 'Customer Name' },
        { label: 'Address', name: 'address', width: 200, editable: true, cellattr: function () { return 'class="address-cell"'; }, title: 'Customer Address' },
        { label: 'Order Date', name: 'order_date', width: 150, editable: true, cellattr: function () { return 'class="order-date-cell"'; }, title: 'Date of Order' },
        { label: 'Quantity', name: 'quantity', width: 180, editable: true, cellattr: function () { return 'class="quantity-cell"'; }, title: 'Order Quantity' },
        { label: 'Price', name: 'price', width: 180, editable: true, cellattr: function () { return 'class="price-cell"'; }, title: 'Order Price' },
        { label: 'Created Date', name: 'created_at', width: 160, cellattr: function () { return 'class="created-date-cell"'; }, title: 'Date Created' },
        { label: 'Updated Date', name: 'updated_at', width: 160, cellattr: function () { return 'class="updated-date-cell"'; }, title: 'Date Last Updated' }
    ];

    $("#grid").jqGrid({
        url: 'http://localhost/ims/public/ims/sales/sales_data',
        datatype: "json",
        colModel: columns,
        viewrecords: true,
        height: 500,
        rowNum: 100,
        rowList: [100, 500, 1000, 1500, 2000],
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
        },
        loadComplete: function() {
            $(".loading-spinner").hide();
        },
        beforeRequest: function() {
            $(".loading-spinner").show();
        },
        gridComplete: function() {
            $('[title]').tooltip();
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
        },
        afterSubmit: function(response, postdata) {
            if (response.status == 200) {
                return [true, "", ""];
            } else {
                return [false, "Error: " + response.responseText, ""];
            }
        },
        errorTextFormat: function(response) {
            return 'Error: ' + response.responseText;
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
        },
        afterSubmit: function(response, postdata) {
            if (response.status == 200) {
                return [true, "", ""];
            } else {
                return [false, "Error: " + response.responseText, ""];
            }
        },
        errorTextFormat: function(response) {
            return 'Error: ' + response.responseText;
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
        },
        afterSubmit: function(response, postdata) {
            if (response.status == 200) {
                return [true, "", ""];
            } else {
                return [false, "Error: " + response.responseText, ""];
            }
        },
        errorTextFormat: function(response) {
            return 'Error: ' + response.responseText;
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
            $("#exportModal").modal('show');
        },
        position: "last"
    });

    // WebSocket for real-time updates
    var socket = new WebSocket('ws://localhost:8080');
    socket.onmessage = function(event) {
        var data = JSON.parse(event.data);
        $("#grid").jqGrid('setGridParam', { datatype: 'json' }).trigger('reloadGrid');
    };

    // Loading spinner
    $('body').append('<div class="loading-spinner" style="display:none;"><div class="spinner"></div></div>');

    // CSS Styling
    $('<style>')
        .prop("type", "text/css")
        .html(`
            .loading-spinner {
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 1000;
            }
            .spinner {
                border: 8px solid black;
                border-top: 8px solid red;
                border-radius: 50%;
                width: 40px;
                height: 40px;
                animation: spin 4s linear infinite;
            }
            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
            .order-id-cell { background-color: #FFDDC1; }
            .customer-id-cell { background-color: #FFE4C4; }
            .name-cell { background-color: #FFECB3; }
            .address-cell { background-color: #D1C4E9; }
            .order-date-cell { background-color: #C5CAE9; }
            .quantity-cell { background-color: #BBDEFB; }
            .price-cell { background-color: #B3E5FC; }
            .created-date-cell { background-color: #B2EBF2; }
            .updated-date-cell { background-color: #B2DFDB; }
            .modal-header {
                background-color: #032f3c;
                color: white;
            }
            .modal-body {
                background-color: #10898d;
            }
            .modal-footer {
                justify-content: space-between;
                background-color: #00796b;
            }
        `).appendTo("head");

    // Export Modal HTML
    $('body').append(`
        <div class="modal fade" id="exportModal" tabindex="-1" role="dialog" aria-labelledby="exportModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exportModalLabel">Export Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="exportForm">
                            <div class="form-group">
                                <label for="exportFormat">Select Export Format:</label>
                                <select class="form-control" id="exportFormat">
                                    <option value="excel">Excel</option>
                                    <option value="pdf">PDF</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="exportButton">Export</button>
                    </div>
                </div>
            </div>
        </div>
    `);

    // Export Data Function
    window.exportData = function() {
        var format = $('#exportFormat').val();
        var data = $("#grid").jqGrid('getRowData');

        if (format === 'excel') {
            // Export as Excel
            var ws = XLSX.utils.json_to_sheet(data);
            var wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, "Sales");
            XLSX.writeFile(wb, "sales_data.xlsx");
        } else if (format === 'pdf') {
            // Check if data is not empty and is an array
            if (!Array.isArray(data) || data.length === 0) {
                console.error('Invalid data format or empty data array.');
                return; // Exit function if data is invalid
            }

            try {
                // Export as PDF
                var { jsPDF } = window.jspdf;
                var doc = new jsPDF('l', 'pt', 'a4');
                var columns = ["Order ID", "Customer ID", "Name", "Address", "Order Date", "Quantity", "Price", "Created Date", "Updated Date"];
                var rows = data.map(function(order) {
                    return [order.order_id, order.customer_id, order.name, order.address, order.order_date, order.quantity, order.price, order.created_at, order.updated_at];
                });
                doc.autoTable({ head: [columns], body: rows });
                doc.save('sales_data.pdf');
            } catch (error) {
                console.error('Error exporting data to PDF:', error);
            }
        }
    };

    // Export Button Click Event
    $('#exportButton').click(function() {
        exportData();
        $("#exportModal").modal('hide');
    });

    // Ensure modal opens on button click
    $("#grid").jqGrid('navButtonAdd', '#pager', {
        caption: "Export",
        buttonicon: "ui-icon-extlink",
        onClickButton: function() {
            $("#exportModal").modal('show');
        },
        position: "last"
    });
});