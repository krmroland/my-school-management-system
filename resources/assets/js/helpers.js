export default class Helpers {
    static forEach(obj, func) {
        const keys = Object.keys(obj);

        for (let key in obj) {
            func(obj[key], key);
        }
        return obj;
    }
}
