<template>
    <div :class="{'form-group':label}">
        <label v-if="label">{{ label }}</label>
        <input type="text" class="form-control" :name="name" ref="input">
    </div>

</template>

<script>
import flatpickr from "flatpickr";

import moment from "moment";

export default {
    props: {
        label:{default:null},
        value: {deafult:''},
        format: { default: "Y-m-d" },
        name: { default: "date" },
        mode: { default: "single" },
        isMax: { default: true },
        maxDate: {
            default: () => {
                if (this.isMax && this.mode === "single") {
                    return new Date();
                }
                return null;
            }
        },
        minDate: { default: "" },
        enableTime:{default:false}
    },
    mounted() {
        flatpickr(this.$refs.input, this.options);
    },
    computed: {
        defaultDate() {
            if (this.value) {
                return this.value;
            }
            if (this.mode === "single") {
                return "today";
            }

            return `${moment()
                .subtract(1, "w")
                .format("YYYY-MM-DD")} to ${moment().format("YYYY-MM-DD")}`;
        },
        options() {
            let $options = {
                maxDate: this.maxDate,
                mode: this.mode,
                dateFormat: this.format,
                defaultDate: this.defaultDate,
                onChange: (selectedDates, dateStr, instance) => {
                    this.$emit("update:value", dateStr);
                },
                //we will make the initial dispatch to update the default value
                onReady: (selectedDates, dateStr, instance) => {
                    this.$emit("update:value", dateStr);
                }
            };
            if (this.minDate) {
                $options.minDate = this.minDate;
            }
            if (this.enableTime) {
                $options.enableTime=true;
            }
            return $options;
        }
    }
};
</script>

<style lang='stylus'>
$primary=#2c303d;
$calendarBackground = #fff
$calendarBorderColor = alpha(#484848, 0.2)

$monthForeground = #fff
$monthBackground =$primary

$weekdaysBackground =$primary

$dayForeground = #484848
$dayHoverBackground = #e2e2e2

$todayColor = #bbb

$selectedDayBackground =$primary
$selectedDayForeground = #fff

$noCalendarBorder = true

@require "~flatpickr/src/style/flatpickr";
</style>