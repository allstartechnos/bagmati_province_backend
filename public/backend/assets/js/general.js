$(document).ready(function () {


    $(document).on("submit", "form.main_form", function (e) {
        e.preventDefault();
        let button = $(this).find("button[type=submit]");
        let current = $(this);
        button.prop("disabled", true).html(`<div class="spinner-border spinner-border-sm"></div> Saving...`);
        if (typeof CKEDITOR !== 'undefined') {
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
        }

        let isPage = current.find('.formButton').data('button') == 'page';

        let route = $(this).attr('action');
        let method = $(this).attr('method');
        let data = new FormData(this);
        $.ajax({
            url: route,
            data: data,
            method: method,
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function (res) {
                $('span.text-danger').remove();
                button.prop("disabled", false).html(`<i class="bi bi-check-circle"></i> Saved`);
                if (res.success_message) {
                    successAlert(res.success_message)

                    if (!isPage) {
                        current
                            .find('input:not([type="hidden"]), textarea')
                            .val('');

                        current.find('.ck-content p').text('');
                    }

                    if (res.reload == true) {
                        window.location.href = res.url;
                    }

                    if (res.isUpdate) {
                        updateData(res, current = null);
                    }

                   

                    if (res.trash) {
                        $('#trash_count').text(res.trash);
                    }

                }
                if (res.error_message) {
                    errorAlert(res.error_message)
                    window.location.href = res.url;
                }
            },
            error: function (err) {
                button.prop("disabled", false).html(`<i class="bi bi-x-circle p-1"></i> Error`);
                $('span.text-danger').remove();
                if (err.responseJSON.message) {
                    errorAlert(err.responseJSON.message);
                    $('#error_msg').text(err.responseJSON.message); //to show error message in page.
                }
                if (res.error_message) {
                    window.location.href = res.url; //after
                }
                if (err.responseJSON.errors) {
                    $.each(err.responseJSON.errors, function (key, value) {
                        let splitted_key = key.split('.');
                        if (splitted_key.length > 1) {
                            $("<span class='text-danger'>" + value + "<br></span>").insertAfter($("[name='" + splitted_key[0] + "[]']")[splitted_key[1]]);
                        }
                        $('#' + key).after("<span class='text-danger'>" + value + "<br></span>");
                        current.find('#' + key + '_error').after("<span class='text-danger'>" + value + "<br></span>");
                        // current.find('#' + splitted_key[0]+'_error').after("<span class='text-danger'>" + value + "<br></span>");
                    });
                }
            },
        });
    });

    $(document).on("click", ".delete-confirm", function (e) {
        e.preventDefault();
        let form = $(this).closest("form");
        Swal.fire({
            title: 'Are you sure to delete?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {

            if (result.isConfirmed) {
                form.submit();
                $(this).closest("tr").remove();
                // successAlert(res.success_message)
                //  if (res.reload == true) {
                //         window.location.href = res.url;
                //     }
            }
        })
    });

    $(document).on("click", ".restore-confirm", function (e) {
        e.preventDefault();
        let form = $(this).closest("form");
        Swal.fire({
            title: 'Are you sure ?',
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });

    $(document).on("click", ".delete-permanent", function (e) {
        e.preventDefault();
        let form = $(this).closest("form");
        Swal.fire({
            title: 'Are you sure to delete it permanently?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {

            if (result.isConfirmed) {
                form.submit();
                $(this).closest("tr").remove();
                $('#trash_count').text(res.trash);
                // successAlert(res.success_message)
                //  if (res.reload == true) {
                //         window.location.href = res.url;
                //     }
            }
        })
    });

});

function successAlert(title = 'Saved !') {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: true,
        showConfirmButtonColor: 'green',
        timer: 3000,
        timerProgressBar: true,
        iconColor: 'green',
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        },
        customClass: {
            popup: 'small-toast',
            title: 'small-toast-title',
            icon: 'small-toast-icon'
        }
    })

    Toast.fire({
        icon: 'info',
        title: title,
    })
}

// function errorAlert(title = 'Failed!') {
//     const Toast = Swal.mixin({
//         toast: true,
//         position: 'top-end',
//         showConfirmButton: false,
//         timer: 3000,
//         timerProgressBar: false,
//         didOpen: (toast) => {
//             toast.addEventListener('mouseenter', Swal.stopTimer)
//             toast.addEventListener('mouseleave', Swal.resumeTimer)
//         }
//     })

//     Toast.fire({
//         icon: 'error',
//         title: title,
//         size: 'small',

//     })
// }

function errorAlert(title = 'Failed!') {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: true,
        showConfirmButtonColor: 'red',
        timer: 3000,
        iconColor: 'red',
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        },
        customClass: {
            popup: 'small-toast',
            title: 'small-toast-title',
            icon: 'small-toast-icon'
        }
    });

    Toast.fire({
        icon: 'warning',
        title: title
    });
}
