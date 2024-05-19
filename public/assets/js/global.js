$(function () {

    $(document).on('change', '.record__select-all', function () {
        $(this).closest('body').toggleClass('bg-hover');
    });

    $('.select2-tages').select2({
        'width': '100%',
        'tags': true,
        'mult': true,
    });

    $(document).on('change', '.all-roles', function () {

        $(this).parents('tr').find('input[type="checkbox"]').prop('checked', this.checked);

    });

    $(document).on('change', '.role', function () {

        if (!this.checked) {
            $(this).parents('tr').find('.all-roles').prop('checked', this.checked);
        }

    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //select all functionality
    $(document).on('change', '.record__select', function () {
        getSelectedRecords();
        $(this).closest('tr').toggleClass('bg-hover');
    });

    // used to select all records
    $(document).on('change', '#record__select-all', function () {
        $('.record__select').prop('checked', this.checked);
        getSelectedRecords();
        $(this).closest('body').toggleClass('bg-hover');
    });

    function getSelectedRecords() {
        var recordIds = [];

        $.each($(".record__select:checked"), function () {
            recordIds.push($(this).val());
        });

        $('#record-ids').val(JSON.stringify(recordIds));

        recordIds.length > 0
            ? $('#bulk-delete').attr('disabled', false)
            : $('#bulk-delete').attr('disabled', true)

    }//end of getSelectedRecords

});//end of ready

$(document).ready(function () {

    //delete
    $(document).on('click', '.delete, #bulk-delete', function (e) {

        var that = $(this)

        e.preventDefault();

        var notey = new Noty({
            text: "@lang('admin.global.confirm_delete')",
            type: "alert",
            killer: true,
            buttons: [
                Noty.button("@lang('admin.global.yes')", 'btn btn-success mr-2', function () {
                    let url = that.closest('form').attr('action');
                    let data = new FormData(that.closest('form').get(0));

                    let loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i>';
                    let originalText = that.html();
                    that.html(loadingText);

                    notey.close();

                    $.ajax({
                        url: url,
                        data: data,
                        method: 'post',
                        processData: false,
                        contentType: false,
                        cache: false,
                        success: function (response) {

                            $("#record__select-all").prop("checked", false);

                            $('.datatable').DataTable().ajax.reload();

                            new Noty({
                                layout: 'topRight',
                                type: 'alert',
                                text: response,
                                killer: true,
                                timeout: 2000,
                            }).show();

                            that.html(originalText);
                        },
                        error: function (response) {
                            data = response.responseJSON.message;
                            new Noty({
                                layout: 'topRight',
                                type: 'error',
                                text: data + '😥',
                                killer: true,
                                timeout: 4000,
                            }).show();
                            that.html(originalText);
                        }

                    });//end of ajax call

                }),

                Noty.button("@lang('admin.global.no')", 'btn btn-danger mx-2', function () {
                    notey.close();
                })
            ]
        });

        notey.show();

    });//end of delete

});//end of document ready

// let path = window.location.pathname;
// let element = null;
// if (path == "/cms") {
//     element = document.getElementById('main-statistics')
// } else {
//     path = path.split("/cms/").pop();
//     element = document.getElementById(path);
// }

// element.classList.add("active");
