import numeral from "numeral";
import capitalize from "lodash/capitalize";
export default Vue.mixin({
    computed: {
        activeIntake() {
            return window.MySchool.activeIntake;
        },
        anIntakeIsSelected() {
            return this.activeIntake && this.activeIntake.semester.id > -1;
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
