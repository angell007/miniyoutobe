export default {
    data() {
        return {
            videos: [],
            page: 0,
            url: 'http://youtobe.test/'
        };
    },

    methods: {
        infiniteHandler($state) {
            this.page++;
            let url = "http://youtobe.test/videos?page=" + this.page;
            axios.get(url).then(response => {
                let videos = response.data.data;
                if (videos.length) {
                    this.videos = this.videos.concat(videos);
                    $state.loaded();
                } else {
                    $state.complete();
                }
            });
        },

        verVideo: function(slug){
            location.href= '/videos/' + slug
        },
    }
};
