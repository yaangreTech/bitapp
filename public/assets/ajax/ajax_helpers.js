var keys = [];

$(document).on('input', ['#department'], function() {
    keys.forEach(element => {
        $('.' + element).html('');
    });
})

// Select
function selectionner(url, successfonction) {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: url,
        success: successfonction,
        error: function(error) { console.log(error); }
    })
}

// insert
function inserer(url, formID, nexAction = null, loader = false) {
    var values = $('#' + formID).serialize();

    keys.forEach(element => {
        $('.' + element).html('');
    });

    $.ajax({
        type: "POST",
        dataType: "JSON",
        url: url,
        data: values,
        error: function(error) {
            // executer en cas d'erreur
            keys = [];
            $.each(error.responseJSON.errors, function(key, val) {
                keys.push(key);
                $('.' + key).html(val);
            })
        },
        success: function(data) {
            // executer en cas de succes
            if (data == true) {
                showToast('success', 'Added successfully', loader);
                nexAction != null && nexAction();

                $.each(values.split('&'), function(key, value) {
                    value.split('=')[0] != '_token' && $('#' + value.split('=')[0]).val('');
                })
            }
        },
    })
}

// suprimer
function suprimer(url, nexAction = null, loader = false) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            let timerInterval
            Swal.fire({
                title: 'Deleting!',
                html: 'Wait until <b></b> ms.',
                timer: 2000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                    $.ajax({
                        type: "GET",
                        dataType: "JSON",
                        url: url,
                        error: function(error) {},
                        success: function(data) {
                            if (data == true) {
                                showToast('success', 'Deleted successfully', loader);
                                nexAction != null && nexAction();
                            }
                        },
                    })
                }
            })
        }
    })
}

// Modification
function modifier(url, formID, nexAction = null, loader = false) {
    var values = $('#' + formID).serialize();
    console.log(values);
    keys.forEach(element => {
        $('.' + element).html('');
    });

    $.ajax({
        type: "POST",
        dataType: "JSON",
        url: url,
        data: values,
        error: function(error) {
            // executer en cas d'erreur
            keys = [];
            $.each(error.responseJSON.errors, function(key, val) {
                keys.push(key);
                $('.' + key).html(val);
            })
        },
        success: function(data) {
            // executer en cas de succes
            if (data == true) {

                showToast('success', 'Updated successfully', loader);

                nexAction != null && nexAction();

                $.each(values.split('&'), function(key, value) {
                    value.split('=')[0] != '_token' && $('#' + value.split('=')[0]).val('');
                })
            }
        },
    })
}