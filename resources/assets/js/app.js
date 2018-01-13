import "./bootstrap";

import "./components";
import "./customComponents";
import "./tables";
import "./forms";

import helperMixin from "./HelpersMixin";

import "./icons";
import "./globalBus";
const app = new Vue({
    el: "#app",
    mixins: [helperMixin]
});
