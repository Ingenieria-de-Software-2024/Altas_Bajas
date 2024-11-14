<div class="row justify-content-center text-center">
    <div class="row justify-content-center">
        <div class="col table-responsive col-lg-11 table-wrapper border shadow bg-light rounded p-5">
            <i class="bi bi-people-fill" style="font-size: 75px;"></i>
            <h1 class="App">Cambios Personal de Tropa</h1>
            <hr>
            <table class="table table-bordered table-hover w-100 text-center shadow" id="TablaTropa"></table>
        </div>
    </div>
</div>

<div class="row justify-content-center text-center">
    <div class="row justify-content-center bg">

        <div class="modal fade" id="modalTraslados" tabindex="-1" data-bs-keyboard="false" role="dialog"
            aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered " role="document">
                <div class="modal-content bg-light">
                    <div class="modal-header bg-success bg-gradient">
                        <h5 class="modal-title" id="modalTitleId">Formulario para <b><u>traslados</u></b>, personal de
                            Tropa </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="modal-body" id="formAlta" enctype="multipart/form-data">
                        <input type="hidden" name="correcciones_id" id="correcciones_id">


                        <div class="row justify-content-center text-center">
                            <div class="row justify-content-center bg">
                                <div class="col justify-content-center bg">

                                    <div class="row justify-content-center text-center">
                                        <div class="col justify-content-center bg">
                                            <i class="bi bi-person-circle" style="font-size: 75px;"></i>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center mb-3">
                                        <div class="col-6 justify-content-center">
                                            <label for="per_catalogo"><b>Cátalogo</b></label>
                                            <input type="number" name="per_catalogo" id="per_catalogo" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row justify-content-center mb-3">
                                        <div class="col justify-content-center">
                                            <label for="nombre_completo"><b>Nombre</b></label>
                                            <input type="text" name="nombre_completo" id="nombre_completo" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center mb-3">
                                        <div class="col justify-content-center">
                                            <label for="per_grado"><b>Grado</b></label>
                                            <input type="text" name="per_grado" id="per_grado" class="form-control" disabled>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center mb-3">
                                        <div class="col justify-content-center">
                                            <label for="per_desc_empleo"><b>Empleo</b></label>
                                            <input type="text" name="per_desc_empleo" id="per_desc_empleo" class="form-control" disabled>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center mb-3">
                                        <div class="col justify-content-center">
                                            <label for="per_plaza"><b>Plaza</b></label>
                                            <input type="text" name="per_plaza" id="per_plaza" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-2 justify-content-center mt-5">
                                    <div class="row justify-content-center">
                                        <div class="col justify-content-center">
                                        </div>
                                    </div>
                                    
                                    <div class="row justify-content-center mt-5">
                                        <div class="col justify-content-center">
                                        </div>
                                    </div>

                                    <div class="row justify-content-center mt-5">
                                        <div class="col justify-content-center">
                                        </div>
                                    </div>

                                    <div class="row justify-content-center mt-5">
                                        <div class="col justify-content-center">
                                            <button type="button" class="btn btn-success btn-lg" name="btnDarAlta"><i class="bi bi-arrow-left-right"></i>
                                                <p>Trasladar</p>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <div class="col justify-content-center bg">
                                    <div class="row justify-content-center text-center">
                                        <div class="col justify-content-center bg">
                                            <i class="bi bi-person-circle" style="font-size: 75px;"></i>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center mb-3">
                                        <div class="col-6 justify-content-center">
                                            <label for="per_catalogo"><b>Cátalogo</b></label>
                                            <input type="number" name="per_catalogo" id="per_catalogo" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row justify-content-center mb-3">
                                        <div class="col justify-content-center">
                                            <label for="nombre_completo"><b>Nombre</b></label>
                                            <input type="text" name="nombre_completo" id="nombre_completo" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center mb-3">
                                        <div class="col justify-content-center">
                                            <label for="per_grado"><b>Grado</b></label>
                                            <input type="text" name="per_grado" id="per_grado" class="form-control" disabled>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center mb-3">
                                        <div class="col justify-content-center">
                                            <label for="per_desc_empleo"><b>Empleo</b></label>
                                            <input type="text" name="per_desc_empleo" id="per_desc_empleo" class="form-control" disabled>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center mb-3">
                                        <div class="col justify-content-center">
                                            <label for="per_plaza"><b>Plaza</b></label>
                                            <input type="text" name="per_plaza" id="per_plaza" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </form>
                    <div class="row justify-content-center">
                        <div class="row justify-content-center">
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-danger btn-lg" name="btnCancelar"><i class="bi bi-x-circle-fill"></i> Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <?php var_dump($_SESSION['dep_llave']) ?> -->

<script src="<?= asset('./build/js/traslados/index.js') ?>"></script>