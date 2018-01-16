


function open_signup() {
    $('#signup_area').toggle();
}

function close_this() {
    $('#signup_area').css({'display':'none'});
}

$('#close_sign').click('on',function () {
    $('#signup_area').css({'display':'none'});
});


$('#signup_form').on('submit',function(event){
    alert("success");
    event.preventDefault();
    var codeid = $('#code_id').val();
    var signup_pass = $('#signup_pass').val();
    var signup_pass_conform = $('#signup_pass_conform').val();


    var value = {
        'codeid': codeid,
        'signup_pass' :signup_pass,
        'signup_pass_conform' : signup_pass_conform
    };

    var promise = $.ajax({
        type : 'post',
        url : 'signupcheck.php',
        data : value
    });

    promise.done(function(data){
        $('form')[0].reset();
        $('#message').html(data);

    }).fail(function(){

        alert('ajax call failiure');
    });
});