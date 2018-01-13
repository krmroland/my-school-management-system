import vue from "vue";

import axios from "axios";
import $ from "jquery";
import "bootstrap/js/src/dropdown";
import { Flash } from "./Flash";
import "bootstrap/js/src/modal";
import Helpers from "./helpers";
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
const links = document.querySelectorAll(".navbar .nav-link");

const cleanLink = function cleanLinkFunction(link) {
    return link.replace(/^\//, "");
};
const href = cleanLink(location.pathname);
links.forEach(link => {
    href.includes(cleanLink(link.pathname))
        ? link.classList.add("active")
        : null;
});

window.Helpers = Helpers;
