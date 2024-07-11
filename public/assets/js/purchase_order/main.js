$(document).ready(() => {
    const csrfToken = $('meta[name="csrf-token"]').attr('content');

    const columns = [
        { label: 'Order ID', name: 'order_id', width: 90, key: true, cellattr: () => 'style="background-color: #FFDDC1"' },
        { label: 'Supplier ID', name: 'supplier_id', width: 90, editable: true, cellattr: () => 'style="background-color: #FFDDC1"' },
        { label: 'Name', name: 'name', width: 150, editable: true, cellattr: () => 'style="background-color: #FFECB3"' },
        { label: 'Order Date', name: 'order_date', width: 150, editable: true, cellattr: () => 'style="background-color: #C5CAE9"' },
        { label: 'Quantity', name: 'quantity', width: 180, editable: true, cellattr: () => 'style="background-color: #BBDEFB"' },
        { label: 'Price', name: 'price', width: 180, editable: true, cellattr: () => 'style="background-color: #B3E5FC"' },
        { label: 'Created Date', name: 'created_at', width: 160, cellattr: () => 'style="background-color: #B2EBF2"' },
        { label: 'Updated Date', name: 'updated_at', width: 160, cellattr: () => 'style="background-color: #B2DFDB"' }
    ];

    const $grid = $("#grid");

    $grid.jqGrid({
        url: 'http://localhost/ims/public/ims/purchase_order/purchase_data',
        datatype: "json",
        colModel: columns,
        viewrecords: true,
        height: 500,
        rowNum: 100,
        rowList: [100, 500, 1000, 1500, 2000],
        pager: '#pager',
        sortname: 'order_id',
        sortorder: 'asc',
        caption: 'Purchase Order Details',
        autowidth: true,
        shrinkToFit: true,
        multiselect: true,
        toolbarfilter: true,
        editurl: 'http://localhost/ims/public/ims/purchase_order/crud_operations',
        ajaxGridOptions: {
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        },
        loadError: (xhr, status, error) => {
            alert('Error: ' + error);
        },
        loadComplete: () => {
            $(".loading-spinner").hide();
        },
        beforeRequest: () => {
            $(".loading-spinner").show();
        },
        gridComplete: () => {
            $('[title]').tooltip();
        }
    });

    $grid.jqGrid('navGrid', '#pager', {
        add: true,
        edit: true,
        del: true,
        search: true,
        refresh: true
    }, {
        url: 'http://localhost/ims/public/ims/purchase_order/edit',
        closeAfterEdit: true,
        recreateForm: true,
        ajaxEditOptions: {
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        },
        afterSubmit: (response) => {
            return response.status == 200 ? [true, "", ""] : [false, "Error: " + response.responseText, ""];
        },
        errorTextFormat: (response) => {
            return 'Error: ' + response.responseText;
        }
    }, {
        url: 'http://localhost/ims/public/ims/purchase_order/add',
        closeAfterAdd: true,
        recreateForm: true,
        ajaxEditOptions: {
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        },
        afterSubmit: (response) => {
            return response.status == 200 ? [true, "", ""] : [false, "Error: " + response.responseText, ""];
        },
        errorTextFormat: (response) => {
            return 'Error: ' + response.responseText;
        }
    }, {
        url: 'http://localhost/ims/public/ims/purchase_order/delete',
        closeAfterDelete: true,
        recreateForm: true,
        ajaxDelOptions: {
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        },
        afterSubmit: (response) => {
            return response.status == 200 ? [true, "", ""] : [false, "Error: " + response.responseText, ""];
        },
        errorTextFormat: (response) => {
            return 'Error: ' + response.responseText;
        }
    });

    $grid.jqGrid('inlineNav', '#pager', {
        edit: true,
        add: true,
        del: true,
        cancel: true,
        save: true,
        editParams: {
            keys: true,
            oneditfunc: (rowid) => {
                // Custom code on edit
            },
            successfunc: (response) => {
                // Custom code on success
                return true;
            },
            errorfunc: (rowid, response) => {
                // Custom code on error
                alert('Error: ' + response.responseText);
            }
        }
    });

    $grid.jqGrid('filterToolbar', {
        stringResult: true,
        searchOnEnter: false,
        defaultSearch: 'cn'
    });

    $grid.jqGrid('navButtonAdd', '#pager', {
        caption: "Export",
        buttonicon: "ui-icon-extlink",
        onClickButton: () => {
            $("#exportModal").modal('show');
        },
        position: "last"
    });

    const socket = new WebSocket('ws://localhost:8080');
    socket.onmessage = (event) => {
        const data = JSON.parse(event.data);
        $grid.jqGrid('setGridParam', { datatype: 'json' }).trigger('reloadGrid');
    };

    $('body').append('<div class="loading-spinner" style="display:none;"><div class="spinner"></div></div>');

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
            .supplier-id-cell { background-color: #FFE4C4; }
            .name-cell { background-color: #FFECB3; }
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
                        <button type="button" class="btn btn-primary" id="exportData">Export</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            XLSX.utils.book_append_sheet(wb, ws, "Purchase");
            XLSX.writeFile(wb, "purchase_data.xlsx");
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
                var columns = ["Order ID", "Supplier ID", "Name", "Order Date", "Quantity", "Price", "Created Date", "Updated Date"];
                var rows = data.map(function(purchase) {
                    return [purchase.order_id, purchase.supplier_id, purchase.name, purchase.order_date, purchase.quantity, purchase.price, purchase.created_at, purchase.updated_at];
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
