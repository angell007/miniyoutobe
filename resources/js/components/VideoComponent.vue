<template>
  <div class="py-5 bg-light">
    <!-- <button class="btn btn-success" v-on:click="submitForm()">click</button> -->

    <div class="container">
      <div class="row">
        <div class="col-md-6" v-for="item in videos" v-bind:key="item.title">
          <div>
            <div class="card-header font-weight-bold text text-dark">
              <router-link :to="{name: 'video', params: {video: item.title}}" v-text="item.title" class="text-dark"></router-link>
            </div>
          </div>
          <div class="card mb-4 box-shadow">
            <div class="embed-responsive embed-responsive-16by9">
              <video width="320" height="240" controls>
                <source :src="'video/' + item.video_path" />
              </video>
            </div>

            <div class="card-body">
              <p class="card-text m-2 p-2">{{item.description}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <loading-component @distance="1" @infinite="infiniteHandler">
      <div slot="no-more">Sin mas resultados</div>
      <div slot="spinner">Cargando...</div>
      <div slot="no-results">Sin resultados</div>
    </loading-component>
  </div>
</template>

<script>
export default {
  data() {
    return {
      videos: [],
      page: 0
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
    }

    // submitForm() {
    //   this.$toastr('success', 'i am a toastr success', 'hello')
    // }
  }
};
</script>