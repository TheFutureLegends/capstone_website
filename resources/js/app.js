$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

utility = {
    isExists: (elem) => {
        if ($(elem).length > 0) {
            return true;
        }
        return false;
    },

    bootstrapSelectEmptyRefreshDisabled: (target, caseType) => {
        if (caseType === "1") {
            // only empty
            $(target).empty();
        } else if (caseType === "2") {
            // only refresh
            $(target).selectpicker('refresh');
        } else if (caseType === "3") {
            // Only disable
            $(target).prop('disabled', true);
        } else {
            $(target).empty();
            $(target).prop('disabled', true);
            $(target).selectpicker('refresh');
        }
    },

    bootstrapSelectData: (target, response) => {
        if (response !== null) {
            $(target).prop('disabled', false);
            utility.bootstrapSelectEmptyRefreshDisabled(target, '1');

            $.each(response, function (key, value) {
                $(target).append('<option value="' + value.id + '">' + value.name + '</option>');
            });

            utility.bootstrapSelectEmptyRefreshDisabled(target, '2');

        } else {
            utility.bootstrapSelectEmptyRefreshDisabled(target, '4');
        }
    },

    formatErrorMessage: (jqXHR, exception) => {
        if (jqXHR.status === 0) {
            return utility.swalError('Not connected.\nPlease verify your network connection.');
        } else if (jqXHR.status == 404) {
            return utility.swalError('The requested page not found.');
        } else if (jqXHR.status == 401) {
            return utility.swalError('Sorry!! You session has expired. Please login to continue access.');
        } else if (jqXHR.status == 500) {
            return utility.swalError('Internal Server Error.');
        } else if (exception === 'parsererror') {
            return utility.swalError('Requested JSON parse failed.');
        } else if (exception === 'timeout') {
            return utility.swalError('Time out error.');
        } else if (exception === 'abort') {
            return utility.swalError('Ajax request aborted.');
        } else {
            if (jqXHR.status == 403) {
                return utility.swalError('You do not have authorization!');
            }
            if (exception === 'Symfony\\Component\\HttpKernel\\Exception\\AccessDeniedHttpException') {
                return utility.swalError('You do not have authorization!');
            }
            return utility.swalError('Unknown error occured. Please try again.');
        }
    },

    swalError: (message) => {
        Swal.fire({
            title: 'Error!',
            text: message,
            icon: 'error',
            showConfirmButton: false,
            timer: 2000
        });
    },
}

if (utility.isExists('#showcase-datatables')) {
    $('#showcase-datatables').DataTable({
        "order": [
            [0, "asc"]
        ],
        "pagingType": "full_numbers",
        "lengthMenu": [
            [50, 100, 150, -1],
            [50, 100, 150, "All"]
        ],
        processing: true,
        serverSide: true,
        ajax: {
            url: '/dashboard/showcase/dataTable',
            type: 'POST',
        },
        columns: [{
                data: 'title',
                name: 'title'
            },
            {
                data: 'content',
                name: 'content'
            },
            {
                data: 'group',
                name: 'group'
            },
            {
                data: 'action',
                className: "text-center",
                orderable: false,
                searchable: false
            },
        ],
        language: {
            "url": "/dashboard/dataTable/language"
        },
        fnDrawCallback: function () {
            
        },
    });
}