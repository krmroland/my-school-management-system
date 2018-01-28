let indexes = [];

const today = new Date().getDay();

//if we are on a Sunday,
// then we set indexes for  Monday and Tuesday

if (today == 0) {
    indexes = [0, 1];
} else {
    let tomorrowIndex = today;

    if (today == 6) {
        tomorrowIndex = 0;
    }

    let todayIndex = today - 1;

    indexes.push(todayIndex, tomorrowIndex);
}

export default indexes;
