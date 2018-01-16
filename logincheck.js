


$(document).ready(function(){
    $('#go').on('submit',function(event){
        //alert("success");
        event.preventDefault();
        var uname = $('#u_id').val(),
            upass = $('#pass_id').val();

        //alert(uname+upass);

        var value ={
            'uname': uname,
            'upass': upass
        }

        var promise = $.ajax({
            type : 'post',
            url : 'test.php',
            data : value
        });

        promise.done(function(data){
            $('form')[0].reset();
            $('#add').html(data);

        }).fail(function(){

            alert('ajax call failiure');
        });
    });
});