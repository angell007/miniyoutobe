<template>
  <div class="py-5 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-4" v-for="item in videos" v-bind:key="item.title">
          <div>
            <router-link
              class="card-header"
              :to="{name: 'video', params: {video: item.title}}"
              v-text="item.title"
            ></router-link>
          </div>
          <div class="card mb-4 box-shadow">
            <img
              class="card-img-top"
              data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
              alt="Thumbnail [100%x225]"
              style="height: 225px; width: 100%; display: block;"
              :src="item.image"
              data-holder-rendered="true"
            />
            <div class="card-body">
              <p class="card-text" v-text="item.description"></p>
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
      let url = "http://youtobe.test/api/videos?page=" + this.page;
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
  }
};
</script>