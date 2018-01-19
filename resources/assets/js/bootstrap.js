import vue from "vue";

import axios from "axios";

import $ from "jquery";

import { Flash } from "./Flash";
import "bootstrap/js/src/dropdown";
import "bootstrap/js/src/modal";
window.$ = window.jQuery = $;

window.Vue = vue;

window.axios = axios;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common["X-CSRF-TOKEN"] = token.content;
} else {
    console.error(
        "CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token"
    );
}
window.flash = new Flash();

window.hasOwnProp = function(obj, prop) {
    return obj && Object.prototype.hasOwnProperty.call(obj, prop);
};
