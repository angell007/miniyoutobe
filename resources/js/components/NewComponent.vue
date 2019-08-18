<template>
  <div>
    <form
      method="POST"
      files="true"
      v-on:submit.prevent="createVideo()"
      enctype="multipart/form-data"
    >
      <div
        class="modal fade"
        id="modalLoginForm"
        tabindex="-1"
        role="dialog"
        aria-labelledby="myModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Nuevo video</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body mx-3">
              <label for="Archivo">
                <b>Archivo:</b>
              </label>
              <input @change="change" type="file" name="file" id="file" />
            </div>

            <div class="modal-footer d-flex justify-content-center">
              <button class="btn btn-danger">Subir video</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      avatar: null,
      thumb: null
    };
  },
  mounted: function() {},
  methods: {
    createVideo: function() {
      var urlNegocios = "api/videos";
      let formData = new FormData();
      formData.append("video", this.thumb);
      axios
        .post(urlNegocios, formData)
        .then(response => {
          $(".modal-backdrop").remove();
          $("#modalLoginForm").modal("hide");
          console.log(response);
          this.$toastr("info", "Correcto", " Operacion ... ");
        })
        .catch(error => {
          this.errors = "Revise e intente nuevamente";
        });
    },

    change: function(event) {
      let file = event.target.files[0];
      this.thumb = file;
      let reader = new FileReader();
      reader.onload = event => {
        this.thumb = event.target.result;
        // console.log(this.thumb);
      };

      reader.readAsDataURL(file);
    }
  },
  computed: {
    imagen() {
      return this.thumb;
    }
  }
};
</script>