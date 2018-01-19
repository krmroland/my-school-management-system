import numeral from "numeral";
import capitalize from "lodash/capitalize";
export default Vue.mixin({
    computed: {
        activeSemester() {
            return window.MySchool.activeSemester;
        },
        aSemesterIsSelected() {
            return this.activeSemester && this.activeSemester.id > -1;
        }
    },

    filters: {
        currency(value) {
            return value === null || isNan(value)
                ? null
                : numeral(value).format();
        },
        capitalize(value) {
            return capitalize(value);
        }
    }
});
