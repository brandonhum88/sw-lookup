<script>
    // Basic set up for each vue route
    export default {
        data() {
            return {
                loading: false,
                resources: null,
                count: 0,
                page: 1,
                error: ''
            }
        },
        created() {
            this.fetchResources;
        },
        methods: {
            changePage(params) {
                this.page = params;
                this.fetchResources;
            }
        },
        computed: {
            pageCount() {
                return Math.ceil(this.count / 10);
            }
        }
    }
</script>
