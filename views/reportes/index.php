<div class="row justify-content-center text-center">
    <div class="row justify-content-center">

        <div class="col table-responsive col-lg-9 table-wrapper border shadow bg-light rounded p-5">
            <i class="bi bi-file-earmark-text-fill" style="font-size: 75px;"></i>
            <h1 class="App">Reporte de Movimientos</h1>
            <hr>

            <div class="row justify-content-center text-center">
                <div class="row justify-content-center bg">

                    <form id="formReportes">
                        <input type="hidden" name="reportes_id" id="reportes_id">

                        <div class="row justify-content-center text-center">
                            <div class="row justify-content-center bg">
                                <div class="col justify-content-center bg">

                                    <div class="row justify-content-center mb-3">
                                        <div class="col justify-content-center">
                                            <label for="dependencia"><b>Dependencia</b></label>
                                            <input type="text" name="dependencia" id="dependencia" class="form-control" placeholder="<?= $user['dep_desc_lg'] ?>" disabled>
                                        </div>

                                        <div class="col-4 justify-content-center">
                                            <label for="fecha_actual"><b>Fecha</b></label>
                                            <input type="date" name="fecha_actual" id="fecha_actual" class="form-control" require>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center mb-3">
                                        <div class="col-3 justify-content-center">
                                            <label for="catalogo"><b>Catalogo G-1</b></label>
                                            <input type="number" name="catalogo" id="catalogo" class="form-control" require>
                                        </div>
                                        <div class="col justify-content-center">
                                            <label for="datos"><b>Datos Oficial de Personal</b></label>
                                            <input type="text" name="datos" id="datos" class="form-control" disabled>
                                        </div>
                                        <div class="col-2 justify-content-center">
                                            <div class="form-check mt-4">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" name="g1_accidental" id="g1_accidental">
                                                    <label class="form-check-label" for="g1_accidental"><b>Accidental</b></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center mb-3">
                                        <div class="col-3 justify-content-center">
                                            <label for="catalogo"><b>Catalogo Comte.</b></label>
                                            <input type="number" name="catalogo" id="catalogo" class="form-control" require>
                                        </div>
                                        <div class="col justify-content-center">
                                            <label for="datos"><b>Datos Comte / Direcctor / Jefe</b></label>
                                            <input type="text" name="datos" id="datos" class="form-control" disabled>
                                        </div>
                                        <div class="col-2 justify-content-center">
                                            <div class="form-check mt-4">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" name="comte_accidental" id="comte_accidental">
                                                    <label class="form-check-label" for="comte_accidental"><b>Accidental</b></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center mb-3">
                                        <div class="col justify-content-center">
                                            <button type="button" class="btn btn-primary btn-lg" name="btnPDF" id="btnPDF"><i class="bi bi-file-pdf-fill" style="font-size: 50px;"></i></button>
                                            <p><label for="pdf"><b>Imprimir PDF</b></label></p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="<?= asset('./build/js/reportes/index.js') ?>"></script>