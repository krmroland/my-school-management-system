import "./bootstrap";
import "./navbarLinks";
import "./components";
import "./customComponents";
import "./tables";
import "./forms";
import "./search";
import "./textEditor";

import helperMixin from "./HelpersMixin";

import "./icons";
import "./globalBus";
const app = new Vue({
    el: "#app",
    mixins: [helperMixin]
});
