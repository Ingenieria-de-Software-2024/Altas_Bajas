<div class="row justify-content-center text-center">
    <div class="row justify-content-center">
        <h1 class="App">Tropa</h1>

        <div class="col table-responsive col-lg-11 table-wrapper border shadow bg-light rounded">
            <div class="row justify-content-center text-center">
                <div class="col-2 justify-content-center text-center">
                    <i class="bi bi-person-fill-add" style="font-size: 75px;"></i>
                    <h3 class="App">Altas</h3>
                </div>
                <div class="col-2 justify-content-center text-center">
                    <i class="bi bi-person-fill-dash" style="font-size: 75px;"></i>
                    <h3 class="App">Bajas</h3>
                </div>
                <div class="col-2 justify-content-center text-center">
                    <i class="bi bi-person-vcard-fill" style="font-size: 75px;"></i>
                    <h3 class="App">Correcciones</h3>
                </div>
            </div>
            <hr>
            <table class="table table-bordered table-hover w-100 text-center shadow" id="TablaTropa"></table>
        </div>
    </div>
</div>

<!-- FORMULARIO PARA CAUSAR ALTA -->

<div class="row justify-content-center text-center">
    <div class="row justify-content-center bg">

        <div class="modal fade" id="modalAltas" tabindex="-1" data-bs-keyboard="false" role="dialog"
            aria-labelledby="modalTitleId">
            <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered " role="document">
                <div class="modal-content bg-light">
                    <div class="modal-header bg-warning bg-gradient">
                        <h5 class="modal-title" id="modalTitleId">Formulario para causar <b><u>Alta</u></b>, personal de
                            Tropa </h5>
                    </div>

                    <form class="modal-body" id="formVerificar" enctype="multipart/form-data">
                        <input type="hidden" name="verificar-id" id="verificar-id">

                        <div class="row justify-content-center mt-5" id="dpi">
                            <div class="col-3 justify-content-center">
                                <label for="ver_dpi"><b>Ingrese su DPI</b></label>
                                <div class="input-group justify-content-center mb-4">
                                    <input type="number" class="form-control text-center" id="ver_dpi" name="ver_dpi">
                                    <button class="btn btn-primary" type="button" id="searchVerificar" name="searchVerificar"><i class="bi bi-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form class="modal-body" id="formAlta" enctype="multipart/form-data">
                        <input type="hidden" name="alta_id" id="alta_id">

                        <div class="row justify-content-center">
                            <div class="col justify-content-center">

                                <label for="per_catalogo"><b>Generar Cátalogo</b></label>
                                <div class="input-group justify-content-center mb-4">
                                    <button class="btn btn-success" type="button" id="searchCatalogo" name="searchCatalogo"><i class="bi bi-arrow-clockwise me-2"></i></button>
                                    <input type="number" class="form-control text-center" id="per_catalogo" name="per_catalogo" readonly>
                                    <input type="hidden" class="form-control text-center" id="catalogo_insertar" name="catalogo_insertar" readonly>
                                    <input type="hidden" class="form-control text-center" id="org_jerarquia" name="org_jerarquia" readonly>
                                    <input type="hidden" class="form-control text-center" id="org_ceom" name="org_ceom" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content text-start">
                            <div class="col justify-content text-start">
                                <h3><u><b>DATOS GENERALES</b></u></h3>
                            </div>
                        </div>
                        <hr>

                        <div class="row justify-content-center">
                            <div class="col justify-content-center">
                                <label for="per_nom1"><b>Primer Nombre</b></label>
                                <input type="text" name="per_nom1" id="per_nom1" class="form-control">
                            </div>
                            <div class="col justify-content-center">
                                <label for="per_nom2"><b>Segundo Nombre</b></label>
                                <input type="text" name="per_nom2" id="per_nom2" class="form-control">
                            </div>
                            <div class="col justify-content-center">
                                <label for="per_nom3"><b>Tercer Nombre</b></label>
                                <input type="text" name="per_nom3" id="per_nom3" class="form-control">
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col justify-content-center">
                                <label for="per_ape1"><b>Primer Apellido</b></label>
                                <input type="text" name="per_ape1" id="per_ape1" class="form-control">
                            </div>
                            <div class="col justify-content-center">
                                <label for="per_ape2"><b>Segundo Apellido</b></label>
                                <input type="text" name="per_ape2" id="per_ape2" class="form-control">
                            </div>
                            <div class="col-3 justify-content-center">
                                <label for="per_dpi"><b>Número de DPI</b></label>
                                <input type="number" name="per_dpi" id="per_dpi" class="form-control">
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-3 justify-content-center">
                                <label for="per_fec_ext_ced"><b>Fecha extensión DPI</b></label>
                                <input type="date" name="per_fec_ext_ced" id="per_fec_ext_ced" class="form-control">
                            </div>
                            <div class="col justify-content-center">
                                <label for="per_departamento"><b>Depto. de extensión</b></label>
                                <select class="form-select" name="per_departamento" id="per_departamento" class="form-control">
                                    <option value="">Seleccione...</option>
                                    <?php foreach ($departamentos as $opciones) : ?>
                                        <option value="<?= $opciones['dm_codigo'] ?>"><?= $opciones['departamentos'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col justify-content-center">
                                <label for="per_ext_ced_lugar"><b>Municipio de extensión</b></label>
                                <select class="form-select" name="per_ext_ced_lugar" id="per_ext_ced_lugar" class="form-control">
                                    <option value="">Seleccione...</option>
                                </select>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col justify-content-center">
                                <label for="per_plaza"><b>Plaza</b></label>
                                <input type="text" name="per_plaza" id="per_plaza" class="form-control" readonly>
                            </div>
                            <input type="hidden" name="per_grado" id="per_grado" class="form-control" readonly>
                            <div class="col justify-content-center">
                                <label for="per_desc_empleo"><b>Empleo</b></label>
                                <input type="text" name="per_desc_empleo" id="per_desc_empleo" class="form-control" readonly>
                            </div>
                            <div class="col justify-content-center">
                                <label for="per_fec_nomb"><b>Fecha de Alta</b></label>
                                <input type="date" name="per_fec_nomb" id="per_fec_nomb" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="row justify-content text-start mt-5">
                            <div class="col justify-content text-start">
                                <h3><u><b>DATOS PERSONALES</b></u></h3>
                            </div>
                        </div>
                        <hr>

                        <div class="row justify-content-center">
                            <div class="col-2 justify-content-center">
                                <label for="per_est_civil"><b>Estado Civil</b></label>
                                <select class="form-select" name="per_est_civil" id="per_est_civil" class="form-control">
                                    <option selected>Seleccione...</option>
                                    <option value="C">Casado</option>
                                    <option value="S">Soltero</option>
                                    <option value="D">Divorciado</option>
                                    <option value="V">Viudo</option>
                                </select>
                            </div>
                            <div class="col-2 justify-content-center">
                                <label for="tipo_sangre_correcciones"><b>Tipo de Sangre</b></label>
                                <select class="form-select" name="per_sangre" id="per_sangre" class="form-control">
                                    <option selected>Seleccione...</option>
                                    <option value="A+">A+</option>
                                    <option value="B+">B+</option>
                                    <option value="O+">O+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="A-">A-</option>
                                    <option value="B-">B-</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>
                            <div class="col justify-content-center">
                                <label for="per_direccion"><b>Dirección</b></label>
                                <input type="text" name="per_direccion" id="per_direccion" class="form-control">
                            </div>
                            <div class="col-1 justify-content-center">
                                <label for="per_zona"><b>zona</b></label>
                                <input type="number" name="per_zona" id="per_zona" class="form-control">
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-4 justify-content-center">
                                <label for="per_departamento_resi"><b>Depto. de Residencia</b></label>
                                <select class="form-select" name="per_departamento_resi" id="per_departamento_resi" class="form-control">
                                    <option value="">Seleccione...</option>
                                    <?php foreach ($departamentos as $opciones) : ?>
                                        <option value="<?= $opciones['dm_codigo'] ?>"><?= $opciones['departamentos'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-4 justify-content-center">
                                <label for="per_dir_lugar"><b>Municipio de Residencia</b></label>
                                <select class="form-select" name="per_dir_lugar" id="per_dir_lugar" class="form-control">
                                    <option value="">Seleccione...</option>
                                </select>
                            </div>
                            <div class="col justify-content-center">
                                <label for="per_telefono"><b>Telefono</b></label>
                                <input type="number" name="per_telefono" id="per_telefono" class="form-control">
                            </div>
                            <div class="col-2 justify-content-center">
                                <label for="per_sexo"><b>Sexo</b></label>
                                <select class="form-select" name="per_sexo" id="per_sexo" class="form-control">
                                    <option selected>Seleccione...</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">femenino</option>
                                </select>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-2 justify-content-center">
                                <label for="per_fec_nac"><b>Fecha de Nacimiento</b></label>
                                <input type="date" name="per_fec_nac" id="per_fec_nac" class="form-control">
                            </div>
                            <div class="col justify-content-center">
                                <label for="per_departamento_nac"><b>Depto. de Nacimiento</b></label>
                                <select class="form-select" name="per_departamento_nac" id="per_departamento_nac" class="form-control">
                                    <option value="">Seleccione...</option>
                                    <?php foreach ($departamentos as $opciones) : ?>
                                        <option value="<?= $opciones['dm_codigo'] ?>"><?= $opciones['departamentos'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col justify-content-center">
                                <label for="per_nac_lugar"><b>Municipio de Nacimiento</b></label>
                                <select class="form-select" name="per_nac_lugar" id="per_nac_lugar" class="form-control">
                                    <option value="">Seleccione...</option>
                                </select>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-3 justify-content-center">
                                <label for="oper_nit"><b>Nit</b></label>
                                <input type="number" name="oper_nit" id="oper_nit" class="form-control">
                            </div>
                            <div class="col justify-content-center">
                                <label for="oper_correo_personal"><b>Correo Personal</b></label>
                                <input type="mail" name="oper_correo_personal" id="oper_correo_personal" class="form-control">
                            </div>
                        </div>

                        <div id="formulario-container">
                            <div class="formulario-clonable">

                                <div class="row justify-content text-start mt-5">
                                    <div class="col justify-content text-start d-flex align-items-center">
                                        <h3><u><b>DATOS BENEFICIARIO</b></u></h3>
                                        <div class="row justify-content-center">
                                            <div class="col justify-content-center">
                                                <button id="agregar-form" class="btn btn-success rounded-circle" style="width: 60px; height: 60px; padding: 0; display: flex; justify-content: center; align-items: center; font-size: 30px; margin-left: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15); transition: all 0.3s ease;"><i class="bi bi-bookmark-plus-fill" style="font-size: 30px;"></i></button>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col justify-content-center">
                                                <button class="btn btn-danger rounded-circle quitar-btn" style="width: 50px; height: 50px; padding: 0; display: none; justify-content: center; align-items: center; font-size: 30px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15); transition: all 0.3s ease;"><i class="bi bi-bookmark-dash-fill" style="font-size: 30px;"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row justify-content-center">
                                    <div class="col justify-content-center">
                                        <label for="ben_nombre"><b>Nombre completo</b></label>
                                        <input type="text" name="ben_nombre" id="ben_nombre" class="form-control">
                                    </div>
                                    <div class="col-3 justify-content-center">
                                        <label for="ben_dpi"><b>Número de DPI</b></label>
                                        <input type="number" name="ben_dpi" id="ben_dpi" class="form-control">
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col justify-content-center">
                                        <label for="ben_direccion"><b>Direccion</b></label>
                                        <input type="text" name="ben_direccion" id="ben_direccion" class="form-control">
                                    </div>
                                    <div class="col-2 justify-content-center">
                                        <label for="ben_porcentaje"><b>Porcentaje</b></label>
                                        <input type="number" name="ben_porcentaje" id="ben_porcentaje" class="form-control">
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col justify-content-center">
                                        <label for="ben_sexo"><b>Sexo</b></label>
                                        <select class="form-select" name="ben_sexo" id="ben_sexo" class="form-control">
                                            <option selected>Seleccione...</option>
                                            <option value="M">Masculino</option>
                                            <option value="F">Femenino</option>
                                        </select>
                                    </div>
                                    <div class="col justify-content-center">
                                        <label for="ben_celular"><b>Teléfono</b></label>
                                        <input type="number" name="ben_celular" id="ben_celular" class="form-control">
                                    </div>
                                    <div class="col justify-content-center">
                                        <label for="ben_parentezco"><b>Parentesco</b></label>
                                        <select class="form-select" name="ben_parentezco" id="ben_parentezco" class="form-control">
                                            <option value="">Seleccione...</option>
                                            <?php foreach ($parentescos as $opciones) : ?>
                                                <option value="<?= $opciones['par_codigo'] ?>"><?= $opciones['par_desc_md'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="col justify-content-center">
                                        <label for="ben_est_civil"><b>Estado Civil</b></label>
                                        <select class="form-select" name="ben_est_civil" id="ben_est_civil" class="form-control">
                                            <option selected>Seleccione...</option>
                                            <option value="C">Casado</option>
                                            <option value="S">Soltero</option>
                                            <option value="D">Divorciado</option>
                                            <option value="V">Viudo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-2 justify-content-center">
                                        <label for="ben_fec_nac"><b>Fecha de Nacimiento</b></label>
                                        <input type="date" name="ben_fec_nac" id="ben_fec_nac" class="form-control">
                                    </div>
                                    <div class="col justify-content-center">
                                        <label for="ben_depto_nacimiento"><b>Depto. de Nacimiento</b></label>
                                        <select class="form-select" name="ben_depto_nacimiento" id="ben_depto_nacimiento" class="form-control">
                                            <option value="">Seleccione...</option>
                                            <?php foreach ($departamentos as $opciones) : ?>
                                                <option value="<?= $opciones['dm_codigo'] ?>"><?= $opciones['departamentos'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="col justify-content-center">
                                        <label for="ben_mun_nacimiento"><b>Municipio de Nacimiento</b></label>
                                        <select class="form-select" name="ben_mun_nacimiento" id="ben_mun_nacimiento" class="form-control">
                                            <option value="">Seleccione...</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="row justify-content-center">
                        <div class="row justify-content-center">
                            <div class="modal-footer justify-content-center">
                                <button type="submit" form="formAlta" class="btn btn-warning btn-lg" id="btnDarAlta" name="btnDarAlta"><i class="bi bi-person-check-fill"></i> Dar Alta</button>
                                <button type="button" class="btn btn-success btn-lg" id="BtnReenganchar" name="BtnReenganchar"><i class="bi bi-person-check-fill"></i> Dar Alta</button>
                                <button type="button" class="btn btn-primary btn-lg" id="btnLimpiarAlta" name="btnLimpiarAlta"><i class="bi bi-stars"></i> Limpiar</button>
                                <button type="button" class="btn btn-danger btn-lg" id="btnCancelarAlta" name="btnCancelarAlta" data-bs-dismiss="modal"><i class="bi bi-x-circle-fill"></i> Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FORMULARIO PARA CAUSAR BAJA -->

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
                    <form class="modal-body" id="formBaja" enctype="multipart/form-data">

                        <div class="row justify-content-center mb-3">
                            <div class="row justify-content-center mb-3">
                                <div class="col-3 justify-content-center">
                                    <label for="catalogo_baja"><b>Cátalogo</b></label>
                                    <input type="number" name="catalogo" id="catalogo" class="form-control" readonly>
                                </div>
                                <div class="col justify-content-center">
                                    <label for="nombre_completo_baja"><b>Grado y Nombre</b></label>
                                    <input type="text" name="nombre_completo" id="nombre_completo" class="form-control"
                                        disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mb-3">
                            <div class="col justify-content-center">
                                <label for="plaza_baja"><b>Plaza</b></label>
                                <input type="text" name="plaza" id="plaza" class="form-control" readonly>
                            </div>
                            <div class="col justify-content-center">
                                <label for="empleo_baja"><b>Empleo</b></label>
                                <input type="text" name="empleo" id="empleo" class="form-control"
                                    disabled>
                            </div>
                            <div class="col justify-content-center">
                                <label for="mov_fecha"><b>Fecha de Baja</b></label>
                                <input type="date" name="mov_fecha" id="mov_fecha" class="form-control">
                            </div>
                        </div>

                        <div class="col justify-content-center">
                            <label for="motivo_baja"><b>Motivo</b></label>
                            <select class="form-select form-control" name="motivo_baja" id="motivo_baja">
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
                                <button type="button" class="btn btn-success btn-lg" id="btnCancelarBaja" name="btnCancelarBaja" data-bs-dismiss="modal"><i class="bi bi-x-circle-fill"></i> Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FORMULARIO PARA CORREGIR DATOS -->

<div class="row justify-content-center text-center">
    <div class="row justify-content-center">

        <div class="modal fade" id="modalCorrecciones" tabindex="-1" data-bs-keyboard="false" role="dialog"
            aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered" role="document">
                <div class="modal-content bg-light">
                    <div class="modal-header bg-primary bg-gradient">
                        <h5 class="modal-title" id="modalTitleId">Formulario para hacer <b><u>Correcciones</u></b>, personal de
                            Tropa </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form class="modal-body" id="formCorrecciones" enctype="multipart/form-data">

                        <div class="row justify-content-center mb-3">
                            <div class="col-3 justify-content-center">
                                <label for="catalogo_correcciones"><b>Cátalogo</b></label>
                                <input type="number" name="catalogo_correcciones" id="catalogo_correcciones" class="form-control" readonly>
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
                                <label for="primer_nombre_correcciones"><b>Primer Nombre</b></label>
                                <input type="text" name="primer_nombre_correcciones" id="primer_nombre_correcciones" class="form-control" disabled>
                            </div>
                            <div class="col justify-content-center">
                                <label for="segundo_nombre_correcciones"><b>Segundo Nombre</b></label>
                                <input type="text" name="segundo_nombre_correcciones" id="segundo_nombre_correcciones" class="form-control" disabled>
                            </div>

                            <div class="col justify-content-center">
                                <label for="tercer_nombre_correcciones"><b>Tercer Nombre</b></label>
                                <input type="text" name="tercer_nombre_correcciones" id="tercer_nombre_correcciones" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="row justify-content-center mb-3">
                            <div class="col justify-content-center">
                                <label for="primer_apellido_correcciones"><b>Primer Apellido</b></label>
                                <input type="text" name="primer_apellido_correcciones" id="primer_apellido_correcciones" class="form-control" disabled>
                            </div>
                            <div class="col justify-content-center">
                                <label for="segundo_apellido_correcciones"><b>Segundo Apellido</b></label>
                                <input type="text" name="segundo_apellido_correcciones" id="segundo_apellido_correcciones" class="form-control" disabled>
                            </div>
                            <div class="col justify-content-center">
                                <label for="tercer_apellido_correcciones"><b>Tercer Apellido</b></label>
                                <input type="text" name="tercer_apellido_correcciones" id="tercer_apellido_correcciones" class="form-control" disabled>
                            </div>
                            <div class="col-3 justify-content-center">
                                <label for="dpi_correcciones"><b>Número de DPI</b></label>
                                <input type="text" name="dpi_correcciones" id="dpi_correcciones" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="row justify-content-center mb-3">
                            <div class="col-3 justify-content-center">
                                <label for="fech_ext_dpi_tropa_correcciones"><b>Fecha extensión DPI</b></label>
                                <input type="date" name="fech_ext_dpi_tropa_correcciones" id="fech_ext_dpi_tropa_correcciones" class="form-control">
                            </div>
                            <div class="col justify-content-center">
                                <label for="depto_dpi_correcciones"><b>Depto. de extensión</b></label>
                                <select class="form-select" name="depto_dpi_correcciones" id="depto_dpi_correcciones" class="form-control">
                                    <option value="">Seleccione...</option>
                                    <?php foreach ($departamentos as $opciones) : ?>
                                        <option value="<?= $opciones['dm_codigo'] ?>"><?= $opciones['departamentos'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col justify-content-center">
                                <label for="municipio_dpi_correcciones"><b>Municipio de extensión</b></label>
                                <select class="form-select" name="municipio_dpi_correcciones" id="municipio_dpi_correcciones" class="form-control">
                                    <option value="">Seleccione...</option>
                                </select>
                            </div>
                        </div>

                        <div class="row justify-content-center mb-3">
                            <div class="col justify-content-center">
                                <label for="plaza_correcciones"><b>Plaza</b></label>
                                <input type="text" name="plaza_correcciones" id="plaza_correcciones" class="form-control" disabled>
                            </div>
                            <div class="col justify-content-center">
                                <label for="grado_correcciones"><b>Grado</b></label>
                                <input type="text" name="grado_correcciones" id="grado_correcciones" class="form-control" disabled>
                            </div>
                            <div class="col justify-content-center">
                                <label for="empleo_correcciones"><b>Empleo</b></label>
                                <input type="text" name="empleo_correcciones" id="empleo_correcciones" class="form-control" disabled>
                            </div>
                            <div class="col justify-content-center">
                                <label for="fech_alta_correcciones"><b>Fecha de Alta</b></label>
                                <input type="date" name="fech_alta_correcciones" id="fech_alta_correcciones" class="form-control" disabled>
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
                                <label for="estado_civil_correcciones"><b>Estado Civil</b></label>
                                <select class="form-select" name="estado_civil_correcciones" id="estado_civil_correcciones" class="form-control">
                                    <option selected>Seleccione...</option>
                                    <option value="C">Casado</option>
                                    <option value="S">Soltero</option>
                                    <option value="D">Divorciado</option>
                                    <option value="V">Viudo</option>
                                </select>
                            </div>
                            <div class="col-2 justify-content-center">
                                <label for="tipo_sangre_correcciones"><b>Tipo de Sangre</b></label>
                                <input type="text" name="tipo_sangre_correcciones" id="tipo_sangre_correcciones" class="form-control" disabled>
                            </div>
                            <div class="col justify-content-center">
                                <label for="direccion_correcciones"><b>Dirección</b></label>
                                <input type="text" name="direccion_correcciones" id="direccion_correcciones" class="form-control">
                            </div>
                            <div class="col-1 justify-content-center">
                                <label for="zona_correcciones"><b>Zona</b></label>
                                <input type="text" name="zona_correcciones" id="zona_correcciones" class="form-control">
                            </div>
                        </div>

                        <div class="row justify-content-center mb-3">
                            <div class="col-4 justify-content-center">
                                <label for="depto_residencia_correcciones"><b>Depto. de Residencia</b></label>
                                <select class="form-select" name="depto_residencia_correcciones" id="depto_residencia_correcciones" class="form-control">
                                    <option value="">Seleccione...</option>
                                    <?php foreach ($departamentos as $opciones) : ?>
                                        <option value="<?= $opciones['dm_codigo'] ?>"><?= $opciones['departamentos'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-4 justify-content-center">
                                <label for="municipio_residencia_correcciones"><b>Municipio de Residencia</b></label>
                                <select class="form-select" name="municipio_residencia_correcciones" id="municipio_residencia_correcciones" class="form-control">
                                    <option value="">Seleccione...</option>
                                </select>
                            </div>
                            <div class="col justify-content-center">
                                <label for="telefono_correcciones"><b>Telefono</b></label>
                                <input type="numb" name="telefono_correcciones" id="telefono_correcciones" class="form-control">
                            </div>
                            <div class="col-2 justify-content-center">
                                <label for="sexo_correcciones"><b>Sexo</b></label>
                                <input type="text" name="sexo_correcciones" id="sexo_correcciones" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="row justify-content-center mb-3">
                            <div class="col-2 justify-content-center">
                                <label for="fech_nac_correcciones"><b>Fecha de Nacimiento</b></label>
                                <input type="date" name="fech_nac_correcciones" id="fech_nac_correcciones" class="form-control" disabled>
                            </div>
                            <div class="col justify-content-center">
                                <label for="depto_nacimiento_correcciones"><b>Depto. de Nacimiento</b></label>
                                <input type="text" name="depto_nacimiento_correcciones" id="depto_nacimiento_correcciones" class="form-control" disabled>
                            </div>
                            <div class="col justify-content-center">
                                <label for="municipio_nacimiento_correcciones"><b>Municipio de Nacimiento</b></label>
                                <input type="text" name="municipio_nacimiento_correcciones" id="municipio_nacimiento_correcciones" class="form-control" disabled>

                            </div>
                        </div>

                        <div class="row justify-content-center mb-3">
                            <div class="col-3 justify-content-center">
                                <label for="nit_correcciones"><b>Nit</b></label>
                                <input type="text" name="nit_correcciones" id="nit_correcciones" class="form-control" disabled>
                            </div>
                            <div class="col justify-content-center">
                                <label for="correo_correcciones"><b>Correo Personal</b></label>
                                <input type="text" name="correo_correcciones" id="correo_correcciones" class="form-control">
                            </div>
                        </div>

                    </form>
                    <div class="row justify-content-center">
                        <div class="row justify-content-center">
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-primary btn-lg" id="btnCorregir" name="btnCorregir"><i class="bi bi-pencil-square"></i> Modificar</button>
                                <button type="button" class="btn btn-danger btn-lg" id="btnCancelarCorrecciones" name="btnCancelarCorrecciones" data-bs-dismiss="modal"><i class="bi bi-x-circle-fill"></i> Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= asset('./build/js/tropa/index.js') ?>"></script>