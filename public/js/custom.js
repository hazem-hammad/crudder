// toaster configurations
toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toastr-top-center",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

$(document).ready(function () {

    $('.form').submit(function (e) {

        e.preventDefault();

        const btn = $(this).find(":submit");

        const form = $(this);

        let url = $(this).attr('action');

        let data = new FormData(this);

        let errors = [];

        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $('.invalid-feedback').text('');

                btn.attr("data-kt-indicator", "on").attr('disabled', true);
            },

            success: function (response) {

                toastr.success(response.message);

                $("html, body").animate({scrollTop: 0});

                if (response.hasRedirect && response.url) {

                    setTimeout(function () {
                        window.location.replace(response.url);
                    }, 1000)

                } else {

                    setTimeout(function () {
                        location.reload();
                    }, 1000)

                }
            },

            error: function (response) {

                toastr.error(response.responseJSON.message);

                $('.invalid-feedback').text('');

                if (response.status === 422) {

                    errors = response.responseJSON.errors;

                    $.each(errors, function (key, value) {
                        form.find('#' + key + 'Message').html(value).css('display', 'block');
                    });
                } else if (response.status === 401 || response.status === 419) {

                    window.location.replace('/admin/login');

                }

                $("html, body").animate({scrollTop: 0});

                btn.removeAttr("data-kt-indicator").removeAttr('disabled');
            }
        });
    });

    $('.export-tickets').submit(function (e) {

        e.preventDefault();

        const btn = $(this).find(":submit");

        let url = $(this).attr('action');

        let data = new FormData(this);

        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $('.invalid-feedback').text('');

                btn.attr("data-kt-indicator", "on").attr('disabled', true);
            },

            success: function (response) {

                btn.removeAttr("data-kt-indicator").removeAttr('disabled');

                $('#export_tickets_modal').modal('toggle');

                Swal.fire({
                    title: 'Your report is ready for download',
                    icon: 'success',
                    confirmButtonColor: '#1BC5BD',
                    confirmButtonText: 'Download',
                }).then((result) => {
                    if (result.value) {
                        window.location.replace(response.file_path);
                    }
                })

            },

            error: function (response) {

                $('#export_tickets_modal').modal('toggle');

                toastr.success(response.message);

                btn.removeAttr("data-kt-indicator").removeAttr('disabled');
            }
        });
    });
})

/**
 * update model status
 * @param element
 */
function updateModelStatus(element) {

    const url = element.dataset.route;

    axios.patch(url)
        .then(response => {

            toastr.success(response.data.message);

            if (response.has_redirect) {
                if (response.url) {
                    setTimeout(function () {
                        window.location.replace(response.url);
                    }, 1000)
                } else {
                    location.reload();
                }
            } else {
                $('#kt_datatable').DataTable().ajax.reload();
            }

        })
        .catch(error => {
            toastr.error(error.message);

            $('#kt_datatable').DataTable().ajax.reload();
        })
}

$('.category-type').change(function () {

    let categoryType = $(this).val();

    if (categoryType === 'sub_category') {
        $('.parent_category').removeAttr('hidden')
    } else {
        $('.parent_category').attr("hidden", true)
    }
})

function deleteModel(element) {
    Swal.fire({
        title: 'Are you sure you want to delete it?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#F64E60',
        cancelButtonColor: '#3699FF',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No',
    }).then((result) => {
        if (result.isConfirmed) {

            const action = element.getAttribute('data-action');
            const id = element.getAttribute('data-id');

            axios.delete(action)
                .then(response => {

                    Swal.fire('', response.data?.message, 'success')

                    if (response.data.has_redirect) {
                        if (response.data.url) {
                            setTimeout(function () {
                                window.location.replace(response.data.url);
                            }, 1000)
                        } else {
                            location.reload();
                        }

                    } else {
                        $('#kt_datatable').DataTable().ajax.reload();

                    }

                })
                .catch(error => {
                    Swal.fire('', error?.response?.data?.message, 'error')
                })

        }
    })
}

function deleteMultiTicket(element) {
    Swal.fire({
        title: 'Are you sure you want to delete tickets?',
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#F64E60',
        cancelButtonColor: '#3699FF',
        confirmButtonText: 'Yes, delete  it!',
        cancelButtonText: 'No',
    }).then((result) => {
        if (result.isConfirmed) {
            $(document).ready(function () {

                const btn = $(this).find(":submit");


                let url = element.getAttribute('data-action');


                let data = new FormData(document.getElementById("multi_delete_tickets_form"));

                let errors = [];

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function () {
                        $('.invalid-feedback').text('');
                    },

                    success: function (response) {

                        Swal.fire(
                            '',
                            response.message,
                            'success'
                        )
                        $('#kt_datatable').DataTable().ajax.reload();
                        $('.change_status_option').attr("hidden", true);

                    },

                    error: function (response) {

                        Swal.fire(
                            '',
                            error?.response?.data?.message,
                            'error'
                        )
                    }
                });

            })
            setTimeout(function () {
                location.reload();
            }, 1000)
        }

    })
}

function sort(element) {

    const action = $(element).data("action");
    const id = $(element).data("id");

    // Get the input field
    const field = document.getElementById(`sort-field-${id}`);

    $(`.sort-btn-label-${id}`).addClass('d-none');
    $(`.sort-btn-loader-${id}`).removeClass('d-none');

    axios.get(action, {
        params: {
            sort: field.value
        }
    }).then(response => {

        $(`.sort-btn-label-${id}`).removeClass('d-none');
        $(`.sort-btn-loader-${id}`).addClass('d-none');

        toastr.success(response.data.message);

        if (response.has_redirect) {
            if (response.url) {
                setTimeout(function () {
                    window.location.replace(response.url);
                }, 1000)
            } else {
                location.reload();
            }
        } else {
            $('#kt_datatable').DataTable().ajax.reload();
        }


    }).catch(error => {
        toastr.error(error.message);

        $('#kt_datatable').DataTable().ajax.reload();
    })
}

function exportTickets(element) {
    Swal.fire({
        title: 'We will receive an email with tickets report',
        icon: 'success',
        showCancelButton: true,
        confirmButtonColor: '#50CD89',
        cancelButtonColor: '#3699FF',
        confirmButtonText: 'Send',
        cancelButtonText: 'No',
    }).then((result) => {
        if (result.isConfirmed) {

            console.log('confirnmed');
            const action = element.getAttribute('data-action');

            axios.get(action)
                .then(response => {

                    Swal.fire('', response.data?.message, 'success')

                    if (response.data.has_redirect) {
                        if (response.data.url) {
                            setTimeout(function () {
                                window.location.replace(response.data.url);
                            }, 1000)
                        } else {
                            location.reload();
                        }

                    } else {
                        $('#kt_datatable').DataTable().ajax.reload();
                    }

                })
                .catch(error => {
                    Swal.fire('', error?.response?.data?.message, 'error')
                })

        }
    })
}

<!--begin::Datatable configurations-->
(() => {
    "use strict";
    const __webpack_exports__ = {};

    const KTDatatablesSearchOptionsAdvancedSearch = function () {

        const initTable1 = function () {
            const table = $('#kt_datatable').DataTable({
                "language": {
                    "sProcessing": "Loading Data ...",
                },
                scrollX: true,
                pageLength: 20,
                pagingType: "full_numbers",
                processing: true,
                serverSide: true,
                fixedColumns: {
                    right: typeof fixed_actions !== 'undefined' ?? 1
                },
                // select: true,
                order: [[0, "desc"]],
                ajax: {
                    url: typeof data_url !== 'undefined' ? data_url : null,
                    type: "GET",
                    data: typeof column_def_data !== 'undefined' ? column_def_data : null
                },
                columns: typeof columns !== 'undefined' ? columns : null,
                initComplete: function () {
                    const $searchInput = $('.datatable-keyword input');
                    $searchInput.unbind();
                    $searchInput.bind('keypress', function (e) {
                        if (e.which === 13) {
                            table.search(this.value).draw();
                        }
                    });
                }
            });

            const filter = function () {
                const val = $.fn.dataTable.util.escapeRegex($(this).val());
                table.column($(this).data('col-index')).search(val ? val : '', false, false).draw();
            };

            $('#kt_search').on('click', function (e) {
                e.preventDefault();
                table.table().draw();
            });

            $('#kt_reset').on('click', function (e) {
                e.preventDefault();
                $('.datatable-input').each(function () {
                    $(this).val('');
                    $(this).val('').trigger("change");
                })

                $('#store_creation_period').val('').trigger("change");
                $('#order_type').val('').trigger("change");
                $('#payment_method').val('').trigger("change");
                $('#store').val('').trigger("change");
                $('#status').val('').trigger("change");

                table.table().draw();
            });
        };

        return {
            //main function to initiate the module
            init: function () {
                initTable1();
            },

        };

    }();

    jQuery(document).ready(function () {
        KTDatatablesSearchOptionsAdvancedSearch.init();
    });
})();
<!--end::Datatable configurations-->
