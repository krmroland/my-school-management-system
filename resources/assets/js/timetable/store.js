import CheckboxToggle from "../CheckboxToggle";
import hours from "./Hours";
import nearDateIndexes from "./NearDateIndexes";

const days = new CheckboxToggle([
    "Monday",
    "Tuesday",
    "Wednesday",
    "Thursday",
    "Friday",
    "Saturday"
]).preSelectIndexes(nearDateIndexes);

export default new Vue({
    data() {
        return {
            days: days,
            hours: new CheckboxToggle(hours).selectAll(),
            serverTimetable: {},
            isShowingDetails: false,
            lectureDetails: {}
        };
    },
    computed: {
        selectedDaysCount() {
            return Object.values(this.days.selected).length;
        }
    },
    methods: {
        updateTimetable(data) {
            // this.isShowingDetails = false;
            this.lectureDetails = {};
            this.serverTimetable = data;
        },
        showLectureDetails(props, details) {
            this.isShowingDetails = true;
            this.lectureDetails = { props, details };
        }
    }
});
