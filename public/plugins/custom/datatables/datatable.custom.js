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
