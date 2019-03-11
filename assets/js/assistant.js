$(document).ready(function() {

/*========================================================
    VARIABLES
========================================================*/

    var typing = false;
    var context = 0;
    var valueOne;
    var valueTwo;

/*========================================================
    FUNCTIONS
========================================================*/

    function assistantCall(message) {
        var data = {
            message: $("#message").val()
        };

        alert("hi");

        if (message !== undefined) {
            data.message = message;
        }

        // Context for money
        if (data.message.toLowerCase().indexOf("money") >= 0 || data.message.toLowerCase().indexOf("much") >= 0) { // (4) Stackoverflow
            context = 1;
        } else if (context == 1 && data.message.match(/\d+/) > 0) {
            var number = data.message.match(/\d+/);
            valueOne = Math.round(number[0]);
            context = 2;
        } else if (context == 2 && data.message.match(/\d+/) > 0) {
            var numberTwo = data.message.match(/\d+/);
            valueTwo = Math.round(numberTwo[0]);
            context = 3;
        } else if (context == 3) {
            valueOne = 0;
            valueTwo = 0;
            context = 0;
        } else {
            valueOne = 0;
            valueTwo = 0;
            context = 0;
        }

        if (data.message === "") {
            $("#message").blur(); // (3) jQuery

            return;
        } else if (typing === true) {
            $("#chat > section").append("<h2><strong class=\"self\">You</strong></h2><p>" + data.message + "</p>");

            $("#message").blur();
            $("#myform")[0].reset();

            return;
        } else {
            $("#chat > section").append("<h2><strong class=\"self\">You</strong></h2><p>" + data.message + "</p>");

            typing = true;

            $("#message").blur();
            $("#myform")[0].reset(); // reset text
        }

        $.post("assistant.php", {message: data.message, context: context, valueOne: valueOne, valueTwo: valueTwo}, function(result) { // (2) jQuery
            $("#chat > section").append("<h2 class=\"typing\"><strong>Assistant</strong></h2><p class=\"typing\">Typing ...</p>");

            setTimeout(function() {
                $(".typing").remove();
                $("#chat > section").append(result);

                typing = false;

                var chatScroll = $("#chat");
                chatScroll.animate({scrollTop: chatScroll.prop("scrollHeight")}, 1000); // (1) Stackoverflow
            }, 1000);

            var chatScroll = $("#chat");
            chatScroll.animate({scrollTop: chatScroll.prop("scrollHeight")}, 1000);
        });
    }

/*========================================================
    SCRIPTS
========================================================*/

    $("#myform").on("submit", function() {
        assistantCall();

        return false; // (6) Stackoverflow
    });

    $(document).on("click",".em", function() {
        assistantCall($(this).html());
    });

    $(document).on("touchstart",".em",function() { // (5) Stackoverflow
        assistantCall($(this).html());
    });

    $("body").on("keydown", function() { // (7) Stackoverflow
        var input = $("input[name=\"message\"]");

        if (!input.is(":focus")) {
            input.focus();
        }
    });
});

/*========================================================
    source
========================================================*/

// (1) https://stackoverflow.com/questions/33641208/chat-box-scroll-to-bottom
// (2) https://api.jquery.com/jquery.post/
// (3) https://api.jquery.com/blur/
// (4) https://stackoverflow.com/questions/1789945/how-to-check-whether-a-string-contains-a-substring-in-javascript
// (5) https://stackoverflow.com/questions/10722730/jquery-click-event-not-working-in-mobile-browsers
// (6) https://stackoverflow.com/questions/19454310/stop-form-refreshing-page-on-submit
// (7) https://stackoverflow.com/questions/28787317/how-to-set-text-input-field-to-focus-when-user-start-typing-on-page
