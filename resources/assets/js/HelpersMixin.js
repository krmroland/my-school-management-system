import numeral from "numeral";
import capitalize from "lodash/capitalize";
export default Vue.mixin({
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
