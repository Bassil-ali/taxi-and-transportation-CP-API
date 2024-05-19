function confirmDestroy(url, id, reference) {
    if (localStorage.getItem("local_lang") == "ar") {
        Swal.fire({
            title: "هل انت متأكد?",
            text: "لن تتمكن من التراجع عن هذا!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "نعم , حذف !ّ",
            cancelButtonText: "لا , تراجع!",
            reverseButtons: true,
        }).then(function (result) {
            if (result.value) {
                deleteItem(url, id, reference);
                // result.dismiss can be "cancel", "overlay",
                // "close", and "timer"
            } else if (result.dismiss === "cancel") {
            }
        });
    } else {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true,
        }).then(function (result) {
            if (result.value) {
                deleteItem(url, id, reference);
                // result.dismiss can be "cancel", "overlay",
                // "close", and "timer"
            } else if (result.dismiss === "cancel") {
            }
        });
    }
}

function deleteItem(url, id, reference) {
    axios
        .delete(url + "/" + id)
        .then(function (response) {
            // handle success 2xx
            console.log(response);
            showMessage(response.data.message);
            reference.closest("tr").remove();
        })
        .catch(function (error) {
            // handle error 4xx - 5xx
            console.log(error);
            showMessage(error.response.data.message, true);
        });
}

function showMessage(message, error = false) {
    Swal.fire({
        position: "center",
        icon: !error ? "success" : "error",
        title: message,
        showConfirmButton: false,
        timer: 1500,
    });
}

function store(url, data, redirectRoute) {
    axios
        .post(url, data)
        .then(function (response) {
            console.log(response);
            console.log(redirectRoute);
            if (redirectRoute != undefined) {
                window.location.href = redirectRoute;
            } else {
                toastr.success(response.data.message);
                document.getElementById("create-form").reset();
            }
        })
        .catch(function (error) {
            console.log(error);
            toastr.error(error.response.data.message);
        });
}

function update(url, data, redirectRoute) {
    axios
        .put(url, data)
        .then(function (response) {
            // handle success 2xx
            console.log(response);
            if (redirectRoute != undefined) {
                window.location.href = redirectRoute;
            } else {
                toastr.success(response.data.message);
            }
        })
        .catch(function (error) {
            // handle error 4xx - 5xx
            console.log(error);
            toastr.error(error.response.data.message);
        });
}

function showToaster(message, error = false) {
    toastr.options = {
        closeButton: true,
        debug: false,
        newestOnTop: false,
        progressBar: false,
        positionClass: "toast-top-right",
        preventDuplicates: false,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        timeOut: "5000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
    };
    if (error) toastr.error(message);
    else toastr.success(message);
}

function confirmToggleStatus(url, id, reference) {
    if (localStorage.getItem("local_lang") == "ar") {
        Swal.fire({
            title: "هل انت متأكد?",
            text: "سيتم تغيير حالة هذا العنصر",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "نعم ,تغيرر !ّ",
            cancelButtonText: "لا , تراجع!",
            reverseButtons: true,
        }).then(function (result) {
            if (result.value) {
                ToggleStatusItem(url, id, reference);
                // result.dismiss can be "cancel", "overlay",
                // "close", and "timer"
            } else if (result.dismiss === "cancel") {
            }
        });
    } else {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to Toggle Status this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, Toggle it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true,
        }).then(function (result) {
            if (result.value) {
                ToggleStatusItem(url, id, reference);
                // result.dismiss can be "cancel", "overlay",
                // "close", and "timer"
            } else if (result.dismiss === "cancel") {
            }
        });
    }
}

function ToggleStatusItem(url, id) {
    axios
        .get(url + "/" + id)
        .then(function (response) {
            // handle success 2xx
            console.log(response);
            showMessage(response.data.message);
            location.reload();
        })
        .catch(function (error) {
            // handle error 4xx - 5xx
            console.log(error);
            showMessage(error.response.data.message, true);
        });
}
