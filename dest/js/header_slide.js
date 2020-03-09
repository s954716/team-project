"use strict";

var new_scroll_position = 0;
var last_scroll_position = void 0;

window.addEventListener('scroll', function (e) {
    var header = document.getElementById("header");
    last_scroll_position = window.scrollY;

    if (new_scroll_position < last_scroll_position && last_scroll_position > 80) {
        header.classList.remove("slideDown");
        header.classList.add("slideUp");
    } else if (new_scroll_position > last_scroll_position) {
        header.classList.remove("slideUp");
        header.classList.add("slideDown");
    }

    new_scroll_position = last_scroll_position;
});