<div class="row justify-content-center text-center">
    <div class="row justify-content-center">
        <div class="col table-responsive col-lg-11 table-wrapper border shadow bg-light rounded">
            <i class="bi bi-person-fill-add" style="font-size: 75px;"></i>
            <h1 class="App">Altas Tropa</h1>
            <hr>
            <table class="table table-bordered table-hover w-100 text-center shadow" id="TablaTropa"></table>
        </div>
    </div>
</div>

<!-- FORMULARIO ALTAS -->

<div class="row justify-content-center text-center">
    <div class="row justify-content-center bg">

        <div class="modal fade" id="modalAltas" tabindex="-1" data-bs-keyboard="false" role="dialog"
            aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered " role="document">
                <div class="modal-content bg-light">
                    <div class="modal-header bg-warning bg-gradient">
                        <h5 class="modal-title" id="modalTitleId">Formulario para causar <b><u>Alta</u></b>, personal de
                            Tropa </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="modal-body" id="formAlta" enctype="multipart/form-data">
                        <input type="hidden" name="ase_id" id="ase_id">

                        <div class="row justify-content-center mb-3">
                            <div class="col-3 justify-content-center">
                                <label for="per_catalogo"><b>Cátalogo</b></label>
                                <input type="number" name="per_catalogo" id="per_catalogo" class="form-control" readonly="">
                            </div>
                        </div>
                        <div class="row justify-content mb-3 text-start">
                            <div class="col justify-content text-start">
                                <h3><u><b>DATOS GENERALES</b></u></h3>
                            </div>
                        </div>
                        <hr>

                        <div class="row justify-content-center mb-3">
                            <div class="col justify-content-center">
                                <label for="per_nom1"><b>Primer Nombre</b></label>
                                <input type="text" name="per_nom1" id="per_nom1" class="form-control" require>
                            </div>
                            <div class="col justify-content-center">
                                <label for="per_nom2"><b>Segundo Nombre</b></label>
                                <input type="text" name="per_nom2" id="per_nom2" class="form-control" require>
                            </div>
                            <div class="col justify-content-center">
                                <label for="per_nom3"><b>Tercer Nombre</b></label>
                                <input type="text" name="per_nom3" id="per_nom3" class="form-control">
                            </div>
                        </div>

                        <div class="row justify-content-center mb-3">
                            <div class="col justify-content-center">
                                <label for="per_ape1"><b>Primer Apellido</b></label>
                                <input type="text" name="per_ape1" id="per_ape1" class="form-control" require>
                            </div>
                            <div class="col justify-content-center">
                                <label for="per_ape2"><b>Segundo Apellido</b></label>
                                <input type="text" name="per_ape2" id="per_ape2" class="form-control" require>
                            </div>
                            <div class="col-3 justify-content-center">
                                <label for="per_dpi"><b>Número de DPI</b></label>
                                <input type="number" name="per_dpi" id="per_dpi" class="form-control" require>
                            </div>
                        </div>

                        <div class="row justify-content-center mb-3">
                            <div class="col-3 justify-content-center">
                                <label for="per_fec_ext_ced"><b>Fecha extensión DPI</b></label>
                                <input type="date" name="per_fec_ext_ced" id="per_fec_ext_ced" class="form-control" require>
                            </div>
                            <div class="col justify-content-center">
                                <label for="per_departamento"><b>Depto. de extensión</b></label>
                                <select class="form-select" name="per_departamento" id="per_departamento" class="form-control" require>
                                    <option value="">Seleccione...</option>
                                    <?php foreach ($departamentos as $opciones) : ?>
                                        <option value="<?= $opciones['dm_codigo'] ?>"><?= $opciones['departamentos'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col justify-content-center">
                                <label for="per_ext_ced_lugar"><b>Municipio de extensión</b></label>
                                <select class="form-select" name="per_ext_ced_lugar" id="per_ext_ced_lugar" class="form-control" require>
                                    <option value="">Seleccione...</option>
                                </select>
                            </div>
                        </div>

                        <div class="row justify-content-center mb-3">
                            <div class="col justify-content-center">
                                <label for="per_plaza"><b>Plaza</b></label>
                                <input type="text" name="per_plaza" id="per_plaza" class="form-control" readonly>
                            </div>
                            <div class="col justify-content-center">
                                <label for="per_desc_empleo"><b>Empleo</b></label>
                                <input type="text" name="per_desc_empleo" id="per_desc_empleo" class="form-control" readonly>
                            </div>
                            <div class="col justify-content-center">
                                <label for="per_fec_nomb"><b>Fecha de nombramiento</b></label>
                                <input type="text" name="per_fec_nomb" id="per_fec_nomb" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="row justify-content mb-3 text-start">
                            <div class="col justify-content text-start">
                                <h3><u><b>DATOS PERSONALES</b></u></h3>
                            </div>
                        </div>
                        <hr>

                        <div class="row justify-content-center mb-3">
                            <div class="col-2 justify-content-center">
                                <label for="per_est_civil"><b>Estado Civil</b></label>
                                <select class="form-select" name="per_est_civil" id="per_est_civil" class="form-control" require>
                                    <option selected>Seleccione...</option>
                                    <option value="C">Casado</option>
                                    <option value="S">Soltero</option>
                                    <option value="D">Divorciado</option>
                                    <option value="V">Viudo</option>
                                </select>
                            </div>
                            <div class="col-2 justify-content-center">
                                <label for="per_sangre"><b>Tipo de Sangre</b></label>
                                <select class="form-select" name="per_sangre" id="per_sangre" class="form-control" require>
                                    <option selected>Seleccione...</option>
                                    <option value="A+">A+</option>
                                    <option value="B+">B+</option>
                                    <option value="O+">O+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="A-">A-</option>
                                    <option value="B-">B-</option>
                                    <option value="O-">O-</option>
                                    <option value="AB-">AB-</option>
                                </select>
                            </div>
                            <div class="col justify-content-center">
                                <label for="per_direccion"><b>Dirección</b></label>
                                <input type="text" name="per_direccion" id="per_direccion" class="form-control" require>
                            </div>
                        </div>

                        <div class="row justify-content-center mb-3">
                            <div class="col-4 justify-content-center">
                                <label for="per_departamento2"><b>Depto. de Residencia</b></label>
                                <select class="form-select" name="per_departamento2" id="per_departamento2" class="form-control" require>
                                    <option value="">Seleccione...</option>
                                    <?php foreach ($departamentos as $opciones) : ?>
                                        <option value="<?= $opciones['dm_codigo'] ?>"><?= $opciones['departamentos'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-4 justify-content-center">
                                <label for="per_dir_lugar"><b>Municipio de Residencia</b></label>
                                <select class="form-select" name="per_dir_lugar" id="per_dir_lugar" class="form-control" require>
                                    <option value="">Seleccione...</option>
                                </select>
                            </div>
                            <div class="col justify-content-center">
                                <label for="per_telefono"><b>Telefono</b></label>
                                <input type="numb" name="per_telefono" id="per_telefono" class="form-control" require>
                            </div>
                            <div class="col-2 justify-content-center">
                                <label for="per_sexo"><b>Sexo</b></label>
                                <select class="form-select" name="per_sexo" id="per_sexo" class="form-control" require>
                                    <option selected>Seleccione...</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">femenino</option>
                                </select>
                            </div>
                        </div>

                        <div class="row justify-content-center mb-3">
                            <div class="col-2 justify-content-center">
                                <label for="per_fec_nac"><b>Fecha de Nacimiento</b></label>
                                <input type="date" name="per_fec_nac" id="per_fec_nac" class="form-control" require>
                            </div>
                            <div class="col justify-content-center">
                                <label for="per_nac_lugar"><b>Depto. de Nacimiento</b></label>
                                <input type="text" name="per_nac_lugar" id="per_nac_lugar" class="form-control" require>
                            </div>
                            <div class="col justify-content-center">
                                <label for="per_nac_lugar"><b>Municipio de Nacimiento</b></label>
                                <input type="text" name="per_nac_lugar" id="per_nac_lugar" class="form-control" require>
                            </div>
                        </div>

                        <div class="row justify-content-center mb-3">
                            <div class="col justify-content-center">
                                <label for="oper_nit"><b>Nit</b></label>
                                <input type="text" name="oper_nit" id="oper_nit" class="form-control" readonly>
                            </div>
                            <div class="col justify-content-center">
                                <label for="oper_correo_personal"><b>Correo Personal</b></label>
                                <input type="text" name="oper_correo_personal" id="oper_correo_personal" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="row justify-content mb-3 text-start">
                            <div class="col justify-content text-start">
                                <h3><u><b>DATOS BENEFICIARIO</b></u></h3>
                            </div>
                        </div>
                        <hr>

                        <div class="row justify-content-center mb-3">
                            <div class="col justify-content-center">
                                <label for="ben_nombre"><b>Primer Nombre</b></label>
                                <input type="text" name="ben_nombre" id="ben_nombre" class="form-control" require>
                            </div>
                            <div class="col justify-content-center">
                                <label for="ben_nombre"><b>Segundo Nombre</b></label>
                                <input type="text" name="ben_nombre" id="ben_nombre" class="form-control" require>
                            </div>
                            <div class="col justify-content-center">
                                <label for="ben_nombre"><b>Tercer Nombre</b></label>
                                <input type="text" name="ben_nombre" id="ben_nombre" class="form-control">
                            </div>
                        </div>

                        <div class="row justify-content-center mb-3">
                            <div class="col justify-content-center">
                                <label for="ben_nombre"><b>Primer Apellido</b></label>
                                <input type="text" name="ben_nombre" id="ben_nombre" class="form-control" require>
                            </div>
                            <div class="col justify-content-center">
                                <label for="ben_nombre"><b>Segundo Apellido</b></label>
                                <input type="text" name="ben_nombre" id="ben_nombre" class="form-control" require>
                            </div>
                            <div class="col-3 justify-content-center">
                                <label for="ben_dpi"><b>Número de DPI</b></label>
                                <input type="number" name="ben_dpi" id="ben_dpi" class="form-control" require>
                            </div>
                        </div>

                        <div class="row justify-content-center mb-3">
                            <div class="col justify-content-center">
                                <label for="per_sexo"><b>Sexo</b></label>
                                <select class="form-select" name="per_sexo" id="per_sexo" class="form-control" require>
                                    <option selected>Seleccione...</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">femenino</option>
                                </select>
                            </div>
                            <div class="col justify-content-center">
                                <label for="ben_celular"><b>Telefono</b></label>
                                <input type="number" name="ben_celular" id="ben_celular" class="form-control" require>
                            </div>
                            <div class="col justify-content-center">
                                <label for="ben_parentezco"><b>Parentezco</b></label>
                                <select class="form-select" name="ben_parentezco" id="ben_parentezco" class="form-control" require>
                                    <option selected>Seleccione...</option>
                                    <option value="C">Casado</option>
                                    <option value="S">Soltero</option>
                                    <option value="D">Divorciado</option>
                                    <option value="V">Viudo</option>
                                </select>
                            </div>
                            <div class="col justify-content-center">
                                <label for="ben_est_civil"><b>Estado Civil</b></label>
                                <select class="form-select" name="per_est_civil" id="per_est_civil" class="form-control" require>
                                    <option selected>Seleccione...</option>
                                    <option value="C">Casado</option>
                                    <option value="S">Soltero</option>
                                    <option value="D">Divorciado</option>
                                    <option value="V">Viudo</option>
                                </select>
                            </div>
                        </div>

                        <div class="row justify-content-center mb-3">
                            <div class="col-2 justify-content-center">
                                <label for="ben_fec_nac"><b>Fecha de Nacimiento</b></label>
                                <input type="date" name="ben_fec_nac" id="ben_fec_nac" class="form-control" require>
                            </div>
                            <div class="col justify-content-center">
                                <label for="per_departamento3"><b>Depto. de Nacimiento</b></label>
                                <select class="form-select" name="per_departamento3" id="per_departamento3" class="form-control" require>
                                    <option value="">Seleccione...</option>
                                    <?php foreach ($departamentos as $opciones) : ?>
                                        <option value="<?= $opciones['dm_codigo'] ?>"><?= $opciones['departamentos'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col justify-content-center">
                                <label for="ben_nac_lugar"><b>Municipio de Nacimiento</b></label>
                                <select class="form-select" name="ben_nac_lugar" id="ben_nac_lugar" class="form-control" require>
                                    <option value="">Seleccione...</option>
                                </select>
                            </div>
                        </div>

                    </form>
                    <div class="row justify-content-center">
                        <div class="row justify-content-center">
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-warning btn-lg" name="btnDarAlta"><i class="bi bi-person-check-fill"></i> Dar Alta</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <?php var_dump($_SESSION['dep_llave']) ?> -->

<script src="<?= asset('./build/js/altas/index.js') ?>"></script>