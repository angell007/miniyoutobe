<template>
  <div class="py-5 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div>
            <h3 v-text="videos.title"></h3>
          </div>
          <div class="card mb-12 box-shadow">
            <img
              class="card-img-top"
              data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
              alt="Thumbnail [100%x225]"
              style="height: 225px; width: 100%; display: block;"
              data-holder-rendered="true"
              :src="videos.image"
            />
            <div class="card-body">
              <p class="card-text" v-text="videos.descripction"></p>
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
    <div>
      <video-component></video-component>
    </div>
  </div>
</template>

<script>
export default {
  props: ["video"],
  data() {
    return {
      videos: {}
    };
  },

  created: function() {
    var urlNegocios = " api/videos/" + this.video;
    axios
      .get(urlNegocios)
      .then(response => {
        this.videos = response.data;
        console.log(response);
      })
      .catch(error => {
        this.errors = "Revise e intente nuevamente";
      });
  }
};
</script>