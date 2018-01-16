


$('#go').on('submit',function(event) {

    event.preventDefault();
    var u_id = $('#u_id').val();
    var pass_id = $('#pass_id').val();

    alert(u_id + pass_id);

    var value = {
        'u_id': u_id,
        'pass_id':pass_id
    };

    var promise = $.ajax({
        type : 'post',
        url : 'test.php',
        data : value
    });

    promise.done(function(data){
        $('form')[0].reset();
        $('#mess').html(data);

    }).fail(function(){

        alert('ajax call failiure');
    });

});