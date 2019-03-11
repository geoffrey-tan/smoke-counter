/*eslint no-unused-vars: ["error", { "args": "none" }]*/
/*jslint browser: true, devel: true, eqeq: true, plusplus: true, sloppy: true, vars: true, white: true, unparam: true*/
/*global $, console*/
/*exported Device*/

// Device definition
function Device(address) {
    this.address = address;

    this.pinMode = function(pin, state) {
        $.ajaxq("queue", {
            url: "http://" + this.address + "/mode/" + pin + "/o",
            crossDomain: true
        }).done(function(data) {
            console.log(data); // eslint-disable-line no-console
        });
    };

    this.digitalWrite = function(pin, state) {
        $.ajaxq("queue", {
            url: "http://" + this.address + "/digital/" + pin + "/" + state,
            crossDomain: true
        }).done(function(data) {
            console.log(data); // eslint-disable-line no-console
        });
    };

    this.analogWrite = function(pin, state) {
        $.ajaxq("queue", {
            url: "http://" + this.address + "/analog/" + pin + "/" + state,
            crossDomain: true
        }).done(function(data) {
            console.log(data); // eslint-disable-line no-console
        });
    };

    this.analogRead = function(pin, callback) {
        $.ajaxq("queue", {
            url: "http://" + this.address + "/analog/" + pin,
            crossDomain: true
        }).done(function(data) {
            callback(data);
        });
    };

    this.digitalRead = function(pin, callback) {
        $.ajaxq("queue", {
            url: "http://" + this.address + "/digital/" + pin,
            crossDomain: true
        }).done(function(data) {
            callback(data);
        });
    };

    this.getVariable = function(variable, callback) {
        $.ajaxq("queue", {
            url: "http://" + this.address + "/" + variable,
            crossDomain: true
        }).done(function(data) {
            callback(data);
        });
    };

    this.callFunction = function(called_function, parameters) {
        $.ajaxq("queue", {
            url: "http://" + this.address + "/" + called_function + "?params=" + parameters,
            crossDomain: true
        });
    };
}
