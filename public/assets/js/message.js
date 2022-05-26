/*jslint browser: true, devel: true, eqeq: true, plusplus: true, sloppy: true, vars: true, white: true*/
/*global $, document*/

$(document).ready(function() {

    function message(parameter) {
        var temp = parameter;

        if (temp == 1) {
            $("#0").html("Hi, tap below to open a chat with me! 👋");
            $("#1").html("Only <span>1</span> left! It's not too late to stop now!");
            $("#6").html("Only <span>6</span> more cigarettes slow down! 🚬");
            $("#9").html("Enough for today! You can do it!");
        } else if (temp == 2) {
            $("#0").html("Hello, you can chat with me if you press the button below! 👋");
            $("#1").html("Only <span>1</span> left! It's not too late to stop now!");
            $("#6").html("Just <span>6</span> left for today, or you can stop now 🤔");
            $("#9").html("Enough for today! You can do it!");
        } else {
            $("#0").html("Hey, if you want to talk I'm here! 👋");
            $("#1").html("Only <span>1</span> left! It's not too late to stop now!");
            $("#6").html("No more then <span>6</span> cigarettes today! 🚬");
            $("#9").html("Enough for today! You can do it!");
        }
    }

    var random = Math.floor((Math.random() * 3) + 1);

    if (random == 1) {
        message(1);
    } else if (random == 2) {
        message(2);
    } else {
        message(3);
    }

});
