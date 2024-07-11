$(document).ready(function() {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Supplier table columns
    var columns = [
        { label: 'Supplier ID', name: 'supplier_id', width: 90, key: true, cellattr: function () { return 'class="order-id-cell"'; }, title: 'Unique Supplier Identifier' },
        { label: 'Name', name: 'name', width: 150, editable: true, cellattr: function () { return 'class="name-cell"'; }, title: 'Supplier Name' },
        { label: 'Contact', name: 'contact', width: 200, editable: true, cellattr: function () { return 'class="address-cell"'; }, title: 'Supplier Contact' },
        { label: 'Address', name: 'address', width: 180, editable: true, cellattr: function () { return 'class="address-cell"'; }, title: 'Supplier Address' },
        { label: 'Created Date', name: 'created_at', width: 160, cellattr: function () { return 'class="created-date-cell"'; }, title: 'Date Created' },
        { label: 'Updated Date', name: 'updated_at', width: 160, cellattr: function () { return 'class="updated-date-cell"'; }, title: 'Date Last Updated' }
    ];

    $("#grid").jqGrid({
        url: 'http://localhost/ims/public/ims/suppliers/suppliers_data',
        datatype: "json",
        colModel: columns,
        viewrecords: true,
        height: 500, // Adjust height as needed
        rowNum: 100,
        rowList: [100, 500, 1000, 1500, 2000],
        pager: '#pager',
        sortname: 'supplier_id',
        sortorder: 'asc',
        caption: 'Suppliers Details',
        autowidth: true,
        shrinkToFit: true,
        multiselect: true,
        toolbarfilter: true,
        editurl: 'http://localhost/ims/public/ims/suppliers/crud_operations',
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
        url: 'http://localhost/ims/public/ims/suppliers/edit',
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
        url: 'http://localhost/ims/public/ims/suppliers/add',
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
        url: 'http://localhost/ims/public/ims/suppliers/delete',
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
                z-index: 9999;
                background-color: rgba(255, 255, 255, 0.7);
                width: 100%;
                height: 100%;
                text-align: center;
            }

            .loading-spinner .spinner {
                border: 8px solid rgba(0, 0, 0, 0.3);
                border-radius: 50%;
                border-top: 8px solid #3498db;
                width: 60px;
                height: 60px;
                animation: spin 1s linear infinite;
                position: absolute;
                top: calc(50% - 30px);
                left: calc(50% - 30px);
            }

            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
        `)
        .appendTo('head');

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
            XLSX.utils.book_append_sheet(wb, ws, "Suppliers");
            XLSX.writeFile(wb, "suppliers_data.xlsx");
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
                var columns = ["Supplier ID", "Name", "Contact", "Address", "Created Date", "Updated Date"];
                var rows = data.map(function(supplier) {
                    return [supplier.supplier_id, supplier.name, supplier.contact, supplier.address, supplier.created_at, supplier.updated_at];
                });
                doc.autoTable({ head: [columns], body: rows });
                doc.save('suppliers_data.pdf');
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