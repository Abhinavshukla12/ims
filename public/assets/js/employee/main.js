$(document).ready(function() {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    var columns = [
        { label: 'Employee ID', name: 'id', width: 90, key: true, cellattr: function () { return 'style="background-color: #FFDDC1"'; } },
        { label: 'First Name', name: 'first_name', width: 90, editable: true, cellattr: function () { return 'style="background-color: #FFDDC1"'; } },
        { label: 'Last Name', name: 'last_name', width: 150, editable: true, cellattr: function () { return 'style="background-color: #FFECB3"'; } },
        { label: 'Email', name: 'email', width: 150, editable: true, cellattr: function () { return 'style="background-color: #C5CAE9"'; } },
        { label: 'Phone', name: 'phone', width: 180, editable: true, cellattr: function () { return 'style="background-color: #BBDEFB"'; } },
        { label: 'Position', name: 'position', width: 180, editable: true, cellattr: function () { return 'style="background-color: #B3E5FC"'; } },
        { label: 'Salary', name: 'salary', width: 180, editable: true, cellattr: function () { return 'style="background-color: #B2EBF2"'; } },
        { label: 'Hire Date', name: 'hire_date', width: 160, cellattr: function () { return 'style="background-color: #B2DFDB"'; } },
        { label: 'Status', name: 'status', width: 160, editable: true, cellattr: function () { return 'style="background-color: #C8E6C9"'; } }
    ];    

    $("#grid").jqGrid({
        url: 'http://localhost/ims/public/ims/employee/employee_data',
        datatype: "json",
        colModel: columns,
        viewrecords: true,
        height: 'auto',
        rowNum: 20,
        rowList: [20, 50, 100, 150, 200],
        pager: '#pager',
        sortname: 'id',
        sortorder: 'asc',
        caption: 'Employees Management',
        autowidth: true,
        shrinkToFit: true,
        multiselect: true,
        toolbarfilter: true,
        editurl: 'http://localhost/ims/public/ims/employee/crud_operations',
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
        url: 'http://localhost/ims/public/ims/employee/edit',
        closeAfterEdit: true,
        recreateForm: true,
        ajaxEditOptions: {
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        }
    }, {
        // Add options
        url: 'http://localhost/ims/public/ims/employee/add',
        closeAfterAdd: true,
        recreateForm: true,
        ajaxEditOptions: {
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        }
    }, {
        // Delete options
        url: 'http://localhost/ims/public/ims/employee/delete',
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