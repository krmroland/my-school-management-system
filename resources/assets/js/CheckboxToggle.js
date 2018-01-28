class CheckboxToggle {
    constructor(items) {
        this._all = {};
        this._selected = {};

        items.forEach((value, index) => {
            this._all[index] = value;
        });
    }
    get all() {
        return this._all;
    }
    get selected() {
        return this._selected;
    }
    updateSelected(event, index) {
        const isAdding = event.target.checked;

        if (isAdding) {
            return this.setSelected(index);
        }
        //otherwise we are removing so we delete the index
        return this.unsetSelected(index);
    }
    setSelected(index) {
        Vue.set(this._selected, index, this._all[index]);
        return this;
    }
    unsetSelected(index) {
        Vue.delete(this._selected, index);
        return this;
    }
    preSelectIndexes(indecies) {
        indecies.forEach(index => this.setSelected(index));
        return this;
    }
    selectAll(value = true) {
        if (value) {
            this._selected = Object.assign({}, this._all);
        } else {
            this._selected = {};
        }
        return this;
    }

    selectedHas(index) {
        return hasOwnProp(this._selected, index);
    }
}

export default CheckboxToggle;
