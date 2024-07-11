$(document).ready(function() {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    var columns = [
        { label: 'Document ID', name: 'document_id', width: 90, key: true, cellattr: function () { return 'style="background-color: #FFDDC1"'; } },
        { label: 'Name', name: 'name', width: 150, editable: true, cellattr: function () { return 'style="background-color: #FFECB3"'; } },
        { label: 'Title', name: 'title', width: 180, editable: true, cellattr: function () { return 'style="background-color: #C5CAE9"'; } },
        { label: 'Description', name: 'description', width: 150, editable: true, cellattr: function () { return 'style="background-color: #BBDEFB"'; } },
        { label: 'File Path', name: 'file_path', width: 180, editable: true, cellattr: function () { return 'style="background-color: #B3E5FC"'; } },
        { label: 'Created Date', name: 'created_at', width: 160, cellattr: function () { return 'style="background-color: #B2EBF2"'; } },
        { label: 'Updated Date', name: 'updated_at', width: 160, cellattr: function () { return 'style="background-color: #B2DFDB"'; } }
    ];

    $("#grid").jqGrid({
        url: 'http://localhost/ims/public/ims/document/document_data',
        datatype: "json",
        colModel: columns,
        viewrecords: true,
        height: 'auto',
        rowNum: 20,
        rowList: [20, 50, 100, 150, 200],
        pager: '#pager',
        sortname: 'document_id',
        sortorder: 'asc',
        caption: 'Document Details',
        autowidth: true,
        shrinkToFit: true,
        multiselect: true,
        toolbarfilter: true,
        editurl: 'http://localhost/ims/public/ims/document/crud_operations',
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
        url: 'http://localhost/ims/public/ims/document/edit',
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
        url: 'http://localhost/ims/public/ims/document/add',
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
        url: 'http://localhost/ims/public/ims/document/delete',
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
            XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
            XLSX.writeFile(wb, "document_data.xlsx");
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
                var rows = data.map(function(document) {
                    return [document.document_id, document.name, document.title, document.description, document.quantity, document.file_path, document.created_at, document.updated_at];
                });
                doc.autoTable({ head: [columns], body: rows });
                doc.save('document_data.pdf');
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
