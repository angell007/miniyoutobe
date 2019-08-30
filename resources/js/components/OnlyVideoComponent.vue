<template>
  <div class="row">
    <!-- <button v-on:click="obImg()" class="btn-danger m-1 p-">Obtener video</button> -->
    <div class="card col-md-8" style="width: 70%;">
      <h4 class="text text-dark m-3 p-2 text-uppercase">{{video.title}}</h4>
      <div class="embed-responsive embed-responsive-16by9">
        <video controls :src="video.video_path"></video>
      </div>
      <div class="card-body">
        <p class="card-text">{{resource}}</p>
      </div>
    </div>
    <div class="card col-md-4">
      <video-component></video-component>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      resource: null,
      url: null,
      slug: null,
      video: []
    };
  },

  methods: {
    obImg: function() {
      console.log(this.video.video_path);
    }
  },

  created: function() {
    this.url = window.location.pathname;
    axios.get(this.url).then(response => {
      this.video = response.data;
      this.video.video_path = "/video/".concat(response.data.video_path);
    });
  }
};
</script>
