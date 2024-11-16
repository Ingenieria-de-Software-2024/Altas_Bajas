<div class="row justify-content-center text-center">
    <div class="row justify-content-center">
        <div class="col table-responsive col-lg-11 table-wrapper border shadow bg-light rounded p-5">
            <i class="bi bi-person-fill-dash" style="font-size: 75px;"></i>
            <h1 class="App">Bajas Tropa</h1>
            <hr>
            <table class="table table-bordered table-hover w-100 text-center shadow" id="TablaTropa"></table>
        </div>
    </div>
</div>

<div class="row justify-content-center text-center">
    <div class="row justify-content-center">

        <div class="modal fade" id="modalBajas" tabindex="-1" data-bs-keyboard="false" role="dialog"
            aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
                <div class="modal-content bg-light">
                    <div class="modal-header bg-danger bg-gradient">
                        <h5 class="modal-title" id="modalTitleId">Formulario para causar <b><u>Baja</u></b>, personal de
                            Tropa </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="modal-body" id="formAlta" enctype="multipart/form-data">
                        <input type="hidden" name="baja_id" id="baja_id">

                        <div class="row justify-content-center mb-3">
                            <div class="row justify-content-center mb-3">
                                <div class="col-3 justify-content-center">
                                    <label for="catalogo"><b>Cátalogo</b></label>
                                    <input type="number" name="catalogo" id="catalogo" class="form-control" readonly="">
                                </div>
                                <div class="col justify-content-center">
                                    <label for="nombre_completo"><b>Nombre Completo</b></label>
                                    <input type="text" name="nombre_completo" id="nombre_completo" class="form-control"
                                        disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mb-3">
                            <div class="col justify-content-center">
                                <label for="plaza"><b>Plaza</b></label>
                                <input type="text" name="plaza" id="plaza" class="form-control" disabled>
                            </div>
                            <div class="col justify-content-center">
                                <label for="empleo"><b>Empleo</b></label>
                                <input type="text" name="empleo" id="empleo" class="form-control"
                                    disabled>
                            </div>
                            <div class="col justify-content-center">
                                <label for="mov_fecha"><b>Fecha de Baja</b></label>
                                <input type="date" name="mov_fecha" id="mov_fecha" class="form-control" require>
                            </div>
                        </div>

                        <div class="col justify-content-center">
                            <label for="per_situacion"><b>Motivo</b></label>
                            <select class="form-select" name="per_situacion" id="per_situacion" class="form-control"
                                required>
                                <option value="">Seleccione...</option>
                                <?php foreach ($motivos as $opcion) : ?>
                                <option value="<?= $opcion['sit_codigo'] ?>"><?= $opcion['sit_desc_lg'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    </form>
                    <div class="row justify-content-center">
                        <div class="row justify-content-center">
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-danger btn-lg" id="btnDarBaja" name="btnDarBaja"><i class="bi bi-person-fill-x"></i> Dar Baja</button>
                                <button type="button" class="btn btn-success btn-lg" id="btnCancelar" name="btnCancelar"><i class="bi bi-x-circle-fill"></i> Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <?php var_dump ($motivos)?> -->

<script src="<?= asset('./build/js/bajas/index.js') ?>"></script>