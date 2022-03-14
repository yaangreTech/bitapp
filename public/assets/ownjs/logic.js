$(function() {
    // console.log(action);
    try {
        var donners = JSON.parse(currentActivedb.getItem(action));

        console.log('donners');
        if (donners.year != 0 && donners.year != undefined) {
            $('.filtreur').val(donners.year).change();
        }


        startSevices();
    } catch (error) {
        console.log('without filter');
    }

})


// function getYear(key) {
//     var year = {};
//     $.ajax({
//         type: "GET",
//         dataType: "JSON",
//         url: '/school/get_year/' + key,
//         success: function(data) {
//             // console.log(data);
//             year = data;
//         },
//         error: function(error) { console.log(error); }
//     });
//     console.log(year);
//     // return year;
// }


function editer(assosValues = '', id) {
    console.log(assosValues);
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

function setBreadcrumb(titles = '', breadcrumIitems = '') {
    titles = titles.split('&');
    breadcrumIitems = breadcrumIitems.split('&');
    var s_titles = '';
    $.each(titles, function(index, title) {
        s_titles += title;
        index != titles.length - 1 && (s_titles += ' > ');
    })
    $('.page-title').html(s_titles);

    $.each(breadcrumIitems, function(index, breadcrumIitem) {
        $('.breadcrumb').append(
            index != breadcrumIitems.length - 1 ? $("<li class = \"breadcrumb-item bcrumb-2\" ><a href = \"#\" onClick = \"return false;\" > " + breadcrumIitem + " </a></li>") :
            $("<li class = \"breadcrumb-item bcrumb-2 active \" >" + breadcrumIitem + "</li>")
        );
    })
}