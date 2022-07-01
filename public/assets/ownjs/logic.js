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


function editer(assosValues = '', id, tuName = "") {
    var ciclist = ["Licence 1", "Licence 2", "Licence 3", "Master 1", "Master 2"];
    // console.log(assosValues);
    $('.update').show();
    $('.update').attr('id', id);
    $('.save').hide();

    $.each(assosValues.split('&'), function(key, val) {
        if (val.split('=')[0].indexOf('^') != -1) {
            $('#' + val.split('=')[0].split('^')[1]).val(val.split('=')[1]).change();

        } else if (val.split('=')[0].indexOf('*') != -1) {
            $('#TU_semester').html('<option selected> ' + val.split('=')[1] + '</option>');
            $('#TU_semester').attr('disabled', true);
            $('#TU_semester').attr('id', 'hided_TU_semester');
            // setRang(ciclist.indexOf(val[0]), ciclist.indexOf(val[1]));
        } else if (val.split('=')[0].indexOf('?') != -1) {
            // console.log(val.split('=')[1]);
            addedecu = JSON.parse(val.split('=')[1]);
            bindEcu();
        } else if (val.split('=')[0].indexOf('%') != -1) {
            $('#' + val.split('=')[0].split('%')[1]).val(val.split('=')[1]);
        } else {
            $('#' + val.split('=')[0]).val(val.split('=')[1])
        }

    })
    setRang(0, 3);
    $('#modulus_semester').attr('disabled', true);
    if (id == 'update_tus') {
        $('#TU_name').val(tuName);
        $('#TU_classe').attr('disabled', true);

    }
}

$('.initier').on('click', function(e) {
    $('input').val('');
    $('.update').hide();
    $('.save').show();
    $('#TU_classe').attr('disabled', false);
    $('#hided_TU_semester').attr('id', 'TU_semester');
    $('select').prop('selectedIndex', 0);
})

function initier(other = '') {
    $('input').val('');
    $('.update').hide();
    $('.save').show();

}

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
        // importStyle: false,
        printContainer: true,
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


// function setRang(initial, final) {
//     $("#levels_range").ionRangeSlider({
//         type: "double",
//         grid: true,
//         from: initial,
//         to: final,
//         values: [
//             "Licence 1", "Licence 2",
//             "Licence 3", "Master 1",
//             "Master 2"
//         ],
//         input_values_separator: 'x'
//             // values: [0, 10, 100, 1000, 10000, 100000, 1000000]
//     });
// }


function loading() {
    return '<div class="preloader pl-size-xs">' +
        '<div class="spinner-layer pl-blue">' +
        '    <div class="circle-clipper left">' +
        '        <div class="circle"></div>' +
        '    </div>' +
        '    <div class="circle-clipper right">' +
        '        <div class="circle"></div>' +
        '    </div>' +
        '</div>' +
        '</div>' +
        '<span class="m-l-10">loading...</span>'
}



function yeardataMapper(value) {
    console.log(value);
    // $('#start_date').on('change', function(e){
    //     console.log($('#start_date').val())
    // }
    // )
    $('#start_date').val((new Date(value).toISOString().split('T')[0]));
    $('#year_name').val((new Date(value).getFullYear()) + '-' + (new Date(value).getFullYear() + 1))
    $('#promotion_name').val('Promotion-' + (new Date(value).getFullYear() + 3))
}