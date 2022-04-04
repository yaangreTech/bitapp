'use strict';
$(function() {
    //Horizontal form basic
    $('#wizard_horizontal').steps({
        headerTag: 'h2',
        bodyTag: 'section',
        transitionEffect: 'slideLeft',
        onInit: function(event, currentIndex) {
            setButtonWavesEffect(event);
        },
        onStepChanged: function(event, currentIndex, priorIndex) {
            setButtonWavesEffect(event);
        }
    });

    //Vertical form basic
    $('#wizard_vertical').steps({
        headerTag: 'h2',
        bodyTag: 'section',
        transitionEffect: 'slideLeft',
        stepsOrientation: 'vertical',
        onInit: function(event, currentIndex) {
            setButtonWavesEffect(event);
        },
        onStepChanged: function(event, currentIndex, priorIndex) {
            setButtonWavesEffect(event);
        }
    });

    //Advanced form with validation
    var form = $('#wizard_with_validation').show();
    form.steps({
        headerTag: 'h3',
        bodyTag: 'fieldset',
        transitionEffect: 'slideLeft',
        onInit: function(event, currentIndex) {

            //Set tab width
            var $tab = $(event.currentTarget).find('ul[role="tablist"] li');
            var tabCount = $tab.length;
            $tab.css('width', (100 / tabCount) + '%');

            //set button waves effect
            setButtonWavesEffect(event);
        },
        onStepChanging: function(event, currentIndex, newIndex) {
            if (currentIndex > newIndex) { return true; }

            if (currentIndex < newIndex) {
                form.find('.body:eq(' + newIndex + ') label.error').remove();
                form.find('.body:eq(' + newIndex + ') .error').removeClass('error');
            }

            form.validate().settings.ignore = ':disabled,:hidden';
            return form.valid();
        },
        onStepChanged: function(event, currentIndex, priorIndex) {
            setButtonWavesEffect(event);
        },
        onFinishing: function(event, currentIndex) {
            form.validate().settings.ignore = ':disabled';
            return form.valid();
        },
        onFinished: function(event, currentIndex) {
            // swal("Good job!", "Submitted!", "success");
            var values = $('#wizard_with_validation').serialize();

            if ($('#wizard_with_validation').hasClass('student_form')) {
                // values += '&year_id=' + getYear(0).id;
                console.log('student_form');
                add_student('wizard_with_validation');
            } else if ($('#wizard_with_validation').hasClass('promotion_form')) {
                console.log('promotion_form');
                add_Year('wizard_with_validation');
                console.log(values);
            } else if ($('#wizard_with_validation').hasClass('user_form')) {
                console.log('user_form');
                add_User('wizard_with_validation');
                console.log(values);
            } else if ($('#wizard_with_validation').hasClass('complete_profile_form')) {
                console.log(values);
                complete_Registration('wizard_with_validation');
            } else if ($('#wizard_with_validation').hasClass('conserned_students_form')) {
                console.log(values);
                reinscriptStudents('wizard_with_validation');
            } else if ($('#wizard_with_validation').hasClass('end_cycle_students_form')) {
                console.log(values);
                endStudents_Cycle('wizard_with_validation');
            } else if ($('#wizard_with_validation').hasClass('TU_form')) {
                console.log(values);
                add_tu('wizard_with_validation');
            } else if ($('#wizard_with_validation').hasClass('TU_form_update')) {
                console.log(values);
                update_tu($('#tu_id').val(), 'wizard_with_validation')
                    // add_tu('wizard_with_validation');
            }


        }
    });

    form.validate({
        highlight: function(input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function(input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function(error, element) {
            $(element).parents('.form-group').append(error);
        },
        rules: {
            'confirm': {
                equalTo: '#password'
            }
        }
    });
});

function setButtonWavesEffect(event) {
    $(event.currentTarget).find('[role="menu"] li a').removeClass('waves-effect');
    $(event.currentTarget).find('[role="menu"] li:not(.disabled) a').addClass('waves-effect');
}