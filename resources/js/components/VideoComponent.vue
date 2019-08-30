<template>
  <div class="py-5 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12" v-for="item in videos" v-bind:key="item.title">
          <div>
            <div class="card-header font-weight-bold text text-dark">
              <a href="#" target="_blank" rel="noopener noreferrer" class="text-uppercase" v-on:click="verVideo(item.slug) ">
                {{item.title}}
              </a>
            </div>
          </div>

          <div class="card mb-4 box-shadow">
            <div class="embed-responsive embed-responsive-16by9">
              <video width="320" height="240" controls>
                <source :src="'/video/' + item.video_path" />
              </video>
            </div>

            <div class="card-body">
              <p class="card-text m-2 p-2">{{item.description}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button
                    type="button"
                    class="btn btn-sm btn-outline-secondary"
                    v-on:click="verVideo(item.slug)"
                  >View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" v-on:click="editVideo()">Edit</button>
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


<script src="../videos.js"></script>