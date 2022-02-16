function getYear(key) {
    var year = {};
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: '/school/get_year/' + key,
        success: function(data) {
            // console.log(data);
            year = data;
        },
        error: function(error) { console.log(error); }
    });
    console.log(year);
    // return year;
}


function editer(assosValues = '', id) {
    $('.update').show();
    $('.update').attr('id', id);
    $('.save').hide();
    $.each(assosValues.split('&'), function(key, val) {
        if (val.split('=')[0].indexOf('^') == -1) {
            $('#' + val.split('=')[0]).val(val.split('=')[1])
        } else {
            $('#' + val.split('=')[0].split('^')[1]).val(val.split('=')[1]).change();

        }

    })

    $('#modulus_semester').attr('disabled', true);
}

$('.initier').on('click', function(e) {
    $('input').val('');
    $('.update').hide();
    $('.save').show();
})

function showToast(icon = 'success', title = 'no Title', loader = false) {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    Toast.fire({
        icon: icon,
        title: title
    }).then(() => {
        loader == true && location.reload();
    })
};

function imprimer(id) {
    $('#' + id).printThis({
        importStyle: true,
    });
}


function toUp(string) {
    return string.charAt(0).toUpperCase() + string.substring(1).toLowerCase();
}