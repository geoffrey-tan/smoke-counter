/*jslint browser: true, devel: true, eqeq: true, plusplus: true, sloppy: true, vars: true, white: true*/
/*global $, document, Device, setInterval*/

$(document).ready(function() {

    var address = $("#ipAddress").html(); // (1) part from aRest library
    var device = new Device(address);

    /*========================================================
        SLIDER
    ========================================================*/

    $(function() {
        $("#slider-range-max").slider({
            min: 1,
            max: 20,
            value: $("#counterMax").html()
        });
    });

    // Slider adjust
    $(function() {
        $("#slider-range-max").slider();

        var startPos = $("#slider-range-max").slider("value"); // (2) Stackoverflow
        var endPos = "";

        $("#slider-range-max").on("slidestop", function(event, ui) {
            endPos = ui.value;

            if (startPos != endPos) {
                var val = $("#slider-range-max").slider("value");
                device.callFunction("adjust", val); // (1) part from aRest library

                device.getVariable("max", function(data) {
                    $("#counterMax").html(data.max);
                });
            }

            startPos = endPos;
        });
    });

    /*========================================================
        AREST GET REQUEST
    ========================================================*/

    var value = $("#counterMax").html();
    var valueTwo = $("#counter").html();
    var newEl;
    var removeEl;

    while (document.getElementsByClassName("img").length > value) {
        removeEl = document.getElementsByClassName("img")[0];
        removeEl.parentNode.removeChild(removeEl);
    }

    if (valueTwo > 0) {
        for (var i = 0; i < valueTwo; i++) {
            $("#image-container > img").eq(i).attr("src","assets/images/cigarette_a.svg");
        }
    }

    setInterval(function() {

    // Counter max display
        device.getVariable("max", function(data) { // (1) part from aRest library
            $("#counterMax").html(data.max);

            var value = data.max;

            while (document.getElementsByClassName("img").length > value) {
                removeEl = document.getElementsByClassName("img")[0];
                removeEl.parentNode.removeChild(removeEl);
            }

            for (var i = 0; i < value; i++) {
                if (document.getElementsByClassName("img")[i] === undefined) {
                    newEl = document.createElement("img");
                    document.getElementsByTagName("section")[4].appendChild(newEl);
                    $("#image-container > img").addClass("img");
                    $("#image-container > img").attr("src","assets/images/cigarette.svg");
                }
            }

        });

        // Counter display
        device.getVariable("counter", function(data) { // (1) part from aRest library
            $("#counter").html(data.counter);

            var value = data.counter;

            if (value > 0) {
                for (var i = 0; i < value; i++) {
                    $("#image-container > img").eq(i).attr("src","assets/images/cigarette_a.svg"); // (3) Stackoverflow
                }
            }

        });

    }, 5000);

});

/*========================================================
    SOURCE
========================================================*/

// (1) https://github.com/marcoschwartz/aREST.js
// (2) https://stackoverflow.com/questions/15508922/jquery-ui-slider-change-event-fires-even-when-value-has-not-changed
// (3) https://stackoverflow.com/questions/44595992/jquery-function-on-array-not-working
