import get from "lodash/get";
export default Vue.mixin({
    mounted() {
        this.anounceItemsChanged();
    },
    data() {
        return {
            isFetching: false,
            fetchingIcon: "fa-circle-o-notch fa-spin"
        };
    },
    computed: {
        items() {
            return this.getItems();
        },
        hasPrevPage() {
            return !!get(this.paginator, "prev_page_url", false);
        },
        hasNextPage() {
            return !!get(this.paginator, "next_page_url", false);
        }
    },

    methods: {
        determineIcon(defaultIcon) {
            return this.isFetching ? this.fetchingIcon : defaultIcon;
        },
        anounceItemsChanged() {
            this.$emit("itemsChanged", this.getItems());
        },
        getItems() {
            return get(this.paginator, "data", []);
        },
        fetchPage(urlKey) {
            const url = get(this.paginator, urlKey, false);
            if (!url) return;
            this.isFetching = true;
            axios
                .get(url)
                .then(({ data }) => {
                    this.paginator = data;
                    this.anounceItemsChanged();
                    this.isFetching = false;
                })
                .catch(error => (this.isFetching = false));
        },
        nextPage() {
            this.fetchPage("next_page_url");
        },
        prevPage() {
            this.fetchPage("prev_page_url");
        }
    }
});
