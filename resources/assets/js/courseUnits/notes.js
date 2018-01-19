function fetchUrl(semester_id) {
    return `courseUnits/${semester_id}/notes`;
}
class Notes {
    constructor() {
        this.cached = {};
    }
    cacheData(semester_id) {
        this.cached[semester_id] = data;
    }
    fetch(semester_id) {
        axios
            .get(fetchUrl(semester_id))
            .then(({ data }) => this.cacheData(semester_id, data));
    }
}

export default new Notes();
