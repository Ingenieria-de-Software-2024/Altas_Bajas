<div class="row justify-content-center text-center">
    <div class="row justify-content-center">

        <div class="col table-responsive col-lg-11 table-wrapper border shadow bg-light rounded p-5">
            <i class="bi bi-people-fill" style="font-size: 75px;"></i>
            <h1 class="App">Cambios Directos Personal de Tropa</h1>
            <hr>

            <div class="row justify-content-center text-center">
                <div class="row justify-content-center bg">

                    <form id="formTraslados">

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
                                            <label for="catalogo_1"><b>Cátalogo Usuario 1</b></label>
                                            <div class="input-group justify-content-center mb-4">
                                                <input type="number" class="form-control text-center" id="catalogo_1" name="catalogo_1">
                                                <button class="btn btn-primary" type="button" id="BtnSearch_1" name="BtnSearch_1" require><i class="bi bi-search"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center mb-3">
                                        <div class="col justify-content-center">
                                            <label for="nombre_completo_1"><b>Nombre</b></label>
                                            <input type="text" name="nombre_completo_1" id="nombre_completo_1" class="form-control" disabled>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center mb-3">
                                        <div class="col justify-content-center">
                                            <label for="grado_1"><b>Grado</b></label>
                                            <input type="text" name="grado_1" id="grado_1" class="form-control" readonly>
                                            <input type="hidden" name="per_grado_1" id="per_grado_1" class="form-control" readonly>

                                        </div>

                                        <div class="col justify-content-center">
                                            <label for="plaza_1"><b>Plaza</b></label>
                                            <input type="text" name="plaza_1" id="plaza_1" class="form-control" readonly>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center mb-3">
                                        <div class="col justify-content-center">
                                            <label for="empleo_1"><b>Empleo</b></label>
                                            <input type="text" name="empleo_1" id="empleo_1" class="form-control" disabled>
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
                                            <button type="button" class="btn btn-success btn-lg p-3"
                                                id="BtnTrasladar"
                                                name="btnTrasladar"><i class="bi bi-arrow-left-right"></i>
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
                                            <label for="catalogo_2"><b>Cátalogo Usuario 2</b></label>
                                            <div class="input-group justify-content-center mb-4">
                                                <input type="number" class="form-control text-center" id="catalogo_2" name="catalogo_2">
                                                <button class="btn btn-primary" type="button" id="BtnSearch_2" name="BtnSearch_2" require><i class="bi bi-search"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center mb-3">
                                        <div class="col justify-content-center">
                                            <label for="nombre_completo_2"><b>Nombre</b></label>
                                            <input type="text" name="nombre_completo_2" id="nombre_completo_2" class="form-control" disabled>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center mb-3">
                                        <div class="col justify-content-center">
                                            <label for="grado_2"><b>Grado</b></label>
                                            <input type="text" name="grado_2" id="grado_2" class="form-control" readonly>
                                            <input type="hidden" name="per_grado_2" id="per_grado_2" class="form-control" readonly>
                                        </div>

                                        <div class="col justify-content-center">
                                            <label for="plaza_2"><b>Plaza</b></label>
                                            <input type="text" name="plaza_2" id="plaza_2" class="form-control" readonly>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center mb-3">
                                        <div class="col justify-content-center">
                                            <label for="empleo_2"><b>Empleo</b></label>
                                            <input type="text" name="empleo_2" id="empleo_2" class="form-control" disabled>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center mb-3">
                                    </div>
                                </div>
                            </div>
                        </div>


                    </form>
                    <div class="row justify-content-center">
                        <div class="row justify-content-center">
                            <div class="modal-footer justify-content-center">

                                <button type="reset" form="formTraslados" class="btn btn-danger btn-lg" name="btnCancelarTraslados" ><i class="bi bi-stars"></i> Cancelar</button>
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