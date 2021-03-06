
$(document).ready(function() {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("report").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "setpic.php?q=" + "maru", true);
    xmlhttp.send();


    $('#anscheckform').on('submit',function(event){
        event.preventDefault();
        var ansid = $('#ansid').val();

        //alert(uname+upass);

        var value = {
            'ansid': ansid
        };

        var promise = $.ajax({
            type : 'post',
            url : 'changepic.php',
            data : value
        });

        promise.done(function(data){
            $('form')[0].reset();
            $('#report').html(data);

        }).fail(function(){

            alert('ajax call failiure');
        });
    });

    var x = setInterval(function(){ update_score() }, 1000);
    function update_score() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("score_card").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "update_score.php?q=" + "maru", true);
        xmlhttp.send();
    }

    // Set the date we're counting down to
    var countDownDate = new Date("Jan 22, 2018 24:00:00").getTime();

// Update the count down every 1 second
    var x = setInterval(function() {

        // Get todays date and time
        var now = new Date().getTime();

        // Find the distance between now an the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("timer").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("timer").innerHTML = "EXPIRED";
        }
    }, 1000);

});