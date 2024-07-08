$(document).ready(function() {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    var columns = [
        { label: 'Stock ID', name: 'id', width: 90, key: true, cellattr: function () { return 'class="stock-id-cell"'; }, title: 'Unique Stock Identifier' },
        { label: 'Name', name: 'name', width: 150, editable: true, cellattr: function () { return 'class="name-cell"'; }, title: 'Name of the Stock' },
        { label: 'Description', name: 'description', width: 200, editable: true, cellattr: function () { return 'class="description-cell"'; }, title: 'Description of the Stock' },
        { label: 'Quantity', name: 'quantity', width: 180, editable: true, cellattr: function () { return 'class="quantity-cell"'; }, title: 'Quantity Available' },
        { label: 'Price', name: 'price', width: 180, editable: true, cellattr: function () { return 'class="price-cell"'; }, title: 'Price per Unit' },
        { label: 'Created Date', name: 'created_at', width: 160, cellattr: function () { return 'class="created-date-cell"'; }, title: 'Date Created' },
        { label: 'Updated Date', name: 'updated_at', width: 160, cellattr: function () { return 'class="updated-date-cell"'; }, title: 'Date Last Updated' }
    ];

    $("#grid").jqGrid({
        url: 'http://localhost/ims/public/ims/stock/stock_data',
        datatype: "json",
        colModel: columns,
        viewrecords: true,
        height: 500, // Fixed height for the grid container
        rowNum: 22, // Display 22 rows per page
        rowList: [20, 50, 100, 150, 200],
        pager: '#pager',
        sortname: 'id',
        sortorder: 'asc',
        caption: 'Stocks Details',
        autowidth: true,
        shrinkToFit: true,
        multiselect: true,
        toolbarfilter: true,
        editurl: 'http://localhost/ims/public/ims/stock/crud_operations',
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
        url: 'http://localhost/ims/public/ims/stock/edit',
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
        url: 'http://localhost/ims/public/ims/stock/add',
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
        url: 'http://localhost/ims/public/ims/stock/delete',
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
    $('body').append('<div class="loading-spinner" style="display:none;"><img src="spinner.gif" alt="Loading..."></div>');

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
            .stock-id-cell { background-color: #FFDDC1; }
            .name-cell { background-color: #FFECB3; }
            .description-cell { background-color: #D1C4E9; }
            .quantity-cell { background-color: #BBDEFB; }
            .price-cell { background-color: #B3E5FC; }
            .created-date-cell { background-color: #B2EBF2; }
            .updated-date-cell { background-color: #B2DFDB; }
        `)
        .appendTo("head");

    // Export Modal
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
                                    <option value="json">JSON</option>
                                    <option value="csv">CSV</option>
                                    <option value="excel">Excel</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="exportDataButton">Export</button>
                    </div>
                </div>
            </div>
        </div>
    `);

    $('#exportDataButton').click(function() {
        var format = $('#exportFormat').val();
        exportData(format);
        $('#exportModal').modal('hide');
    });

    function exportData(format) {
        var allData = [];
        var totalRows = $("#grid").jqGrid('getGridParam', 'records');
        var rowsPerPage = $("#grid").jqGrid('getGridParam', 'rowNum');
        var totalPages = Math.ceil(totalRows / rowsPerPage);

        for (var page = 1; page <= totalPages; page++) {
            $("#grid").jqGrid('setGridParam', { page: page }).trigger('reloadGrid', [{ page: page }]);
            var rowData = $("#grid").jqGrid('getRowData');
            allData = allData.concat(rowData);
        }

        if (format === 'json') {
            exportToJson(allData);
        } else if (format === 'csv') {
            exportToCsv(allData);
        } else if (format === 'excel') {
            exportToExcel(allData);
        }
    }

    function exportToJson(data) {
        var json = JSON.stringify(data, null, 2);
        var blob = new Blob([json], { type: 'application/json' });
        var url = URL.createObjectURL(blob);
        var a = document.createElement('a');
        a.href = url;
        a.download = 'stock_data.json';
        a.click();
        URL.revokeObjectURL(url);
    }

    function exportToCsv(data) {
        var csv = '';
        var headers = Object.keys(data[0]).join(',');
        csv += headers + '\n';
        data.forEach(function(row) {
            var values = Object.values(row).join(',');
            csv += values + '\n';
        });
        var blob = new Blob([csv], { type: 'text/csv' });
        var url = URL.createObjectURL(blob);
        var a = document.createElement('a');
        a.href = url;
        a.download = 'stock_data.csv';
        a.click();
        URL.revokeObjectURL(url);
    }

    function exportToExcel(data) {
        var ws = XLSX.utils.json_to_sheet(data);
        var wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, 'Stock Data');
        XLSX.writeFile(wb, 'stock_data.xlsx');
    }
});
