<form method="POST" action="{{route('videos.store')}}" files="true" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Nuevo video</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">

                    <div class="form-group">
                        <label for="title">Titulo</label>
                        <input type="text" class="form-control" name="title" aria-describedby="emailHelp" placeholder="Enter titulo">
                    </div>

                    <div class="form-group">
                        <label for="description">Descripcion</label>
                        <textarea type="text" class="form-control" name="description" aria-describedby="emailHelp" placeholder="Enter descripcion"></textarea>
                    </div>

                    <div class="form-group col-md-6">

                        <label for="ArchivoImg">
                            <i class="fa fa-cloud-upload-alt"></i> Archivo miniautura:
                        </label>

                        <label for="file-image" class="subir btn btn-outline-dark btn-round btn-xs">
                            <i class="fas fa-cloud-upload-alt"></i> Archivo de Imagen
                        </label>

                        <input id="file-image" name="image" type="file" style='display: none;' />
                    </div>

                    <div class="form-group col-md-6">

                        <label for="Archivo">
                            <i class="fa fa-cloud-upload-alt"></i> Archivo video :
                        </label>

                        <label for="file-video" class="subir btn btn-outline-dark btn-round btn-xs">
                            <i class="fas fa-cloud-upload-alt"></i> Archivo de video
                        </label>

                        <input id="file-video" name="video" type="file" style='display: none;' />
                    </div>

                </div>

                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-danger">Subir video</button>
                </div>
            </div>
        </div>
    </div>
</form>