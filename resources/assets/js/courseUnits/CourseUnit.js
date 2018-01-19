class CourseUnit {
    constructor(attributes) {
        console.log(attributes);

        for (let attribute in attributes) {
            this[attribute] = attributes[attribute];
        }
    }
    get notes() {
        if (!this.id) {
            return;
        }
        if (this._notes) {
            return this._notes;
        }
        this.fetchNotes();
    }
    url() {
        return `/courseUnit/${this.id}/notes`;
    }
    fetchNotes() {
        axios.get(this.url()).then(({ data }) => (this._notes = data));
    }
}

export { CourseUnit };
