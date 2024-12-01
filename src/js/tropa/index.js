import { Dropdown, Tab, Modal } from "bootstrap";
import { Toast, validarFormulario } from "../funciones";
import Swal from "sweetalert2";
import DataTable from "datatables.net-bs5";
import { lenguaje } from "../lenguaje";
import { config } from "fullcalendar";

const TablaTropa = document.getElementById('TablaTropa');

const modalAltas = document.getElementById('modalAltas');
const modalElementAltas = document.querySelector('#modalAltas');
const modalBSAltas = new Modal(modalElementAltas)
const modalBajas = document.getElementById('modalBajas');
const modalCorrecciones = document.getElementById('modalCorrecciones');

const formAlta = document.getElementById('formAlta');
const formVerificar = document.getElementById('formVerificar');
const formBaja = document.getElementById('formBaja');
const formCorrrecciones = document.getElementById('formCorrecciones');

//MODAL ALTA
//VERIFICACIÓN DPI
const inputDpi = document.getElementById('ver_dpi');
//VALIDACIONES DE IMPUTS
const inputCatalogo = document.getElementById('per_catalogo');
const dpiTropa = document.getElementById('per_dpi');
const dpiBeneficiario = document.getElementById('ben_dpi');
const nitTropa = document.getElementById('oper_nit');
const teltropa = document.getElementById('per_telefono');
const telBeneficiario = document.getElementById('ben_celular');
const inputPlaza = document.getElementById('per_plaza');
const inputEmpleo = document.getElementById('per_desc_empleo');
const inputGrado = document.getElementById('per_grado')
const Catalogo_insertar = document.getElementById('catalogo_insertar');
const imputJerarquia = document.getElementById('org_jerarquia');
const inputCeom = document.getElementById('org_ceom');

//DEPARTAMENTOS Y MUNICIPIOS
const selectDepartamentoTropa = document.getElementById('per_departamento');
const selectMunicipioTropa = document.getElementById('per_ext_ced_lugar');
const selectDepartamentoResidencia = document.getElementById('per_departamento_resi');
const selectMunicipioResidencia = document.getElementById('per_dir_lugar');
const selectDepartamentoNacimiento = document.getElementById('per_departamento_nac');
const selectMunicipioNacimiento = document.getElementById('per_nac_lugar');
const selectDepartamentoBen = document.getElementById('ben_depto_nacimiento');
const selectMunicipioBen = document.getElementById('ben_mun_nacimiento');
//BOTONES ALTAS
const BtnSearchVerificar = document.getElementById('searchVerificar');
const BtnSearchCatalogo = document.getElementById('searchCatalogo');
const BtnAlta = document.getElementById('btnDarAlta');
const BtnLimpiarAlta = document.getElementById('btnLimpiarAlta');
const BtnCancelarAlta = document.getElementById('btnCancelarAlta');


//MODAL CORRECCIONES
//DATOS PERSONALES
const inputcatalogo_correcciones = document.getElementById('catalogo_correcciones');
const inputprimer_nombre_correcciones = document.getElementById('primer_nombre_correcciones');
const inputsegundo_nombre_correcciones = document.getElementById('segundo_nombre_correcciones');
const inputtercer_nombre_correcciones = document.getElementById('tercer_nombre_correcciones');
const inputprimer_apellido_correcciones = document.getElementById('primer_apellido_correcciones');
const inputsegundo_apellido_correcciones = document.getElementById('segundo_apellido_correcciones');
const inputtercer_apellido_correcciones = document.getElementById('tercer_apellido_correcciones');
const inputdpi_correcciones = document.getElementById('dpi_correcciones');
const inputfech_ext_dpi_tropa_correcciones = document.getElementById('fech_ext_dpi_tropa_correcciones');
const inputdepto_dpi_correcciones = document.getElementById('depto_dpi_correcciones');
const inputmunicipio_dpi_correcciones = document.getElementById('municipio_dpi_correcciones');
const inputplaza_correcciones = document.getElementById('plaza_correcciones');
const inputgrado_correcciones = document.getElementById('grado_correcciones');
const inputempleo_correcciones = document.getElementById('empleo_correcciones');
const inputfech_alta_correcciones = document.getElementById('fech_alta_correcciones');
//DATOS GENERALES
const inputestado_civil_correcciones = document.getElementById('estado_civil_correcciones');
const inputtipo_sangre_correcciones = document.getElementById('tipo_sangre_correcciones');
const inputdireccion_correcciones = document.getElementById('direccion_correcciones');
const inputzona_correcciones = document.getElementById('zona_correcciones');
const inputdepto_residencia_correcciones = document.getElementById('depto_residencia_correcciones');
const inputmunicipio_residencia_correcciones = document.getElementById('municipio_residencia_correcciones');
const inputtelefono_correcciones = document.getElementById('telefono_correcciones');
const inputsexo_correcciones = document.getElementById('sexo_correcciones');
const inputfech_nac_correcciones = document.getElementById('fech_nac_correcciones');
const inputdepto_nacimiento_correcciones = document.getElementById('depto_nacimiento_correcciones');
const inputmunicipio_nacimiento_correcciones = document.getElementById('municipio_nacimiento_correcciones');
const inputnit_correcciones = document.getElementById('nit_correcciones');
const inputcorreo_correcciones = document.getElementById('correo_correcciones');
//DATOS BENEFICIARIO
const inputben_nombre_correcciones = document.getElementById('ben_nombre_correcciones');
const inputdpi_ben_correcciones = document.getElementById('dpi_ben_correcciones');
const inputben_genero_correcciones = document.getElementById('ben_genero_correcciones');
const inputtel_ben_correcciones = document.getElementById('tel_ben_correcciones');
const inputparentesco_correcciones = document.getElementById('parentesco_correcciones');
const inputben_est_civil_correcciones = document.getElementById('ben_est_civil_correcciones');
const inputben_fech_nacimiento_correcciones = document.getElementById('ben_fech_nacimiento_correcciones');
const inputben_depto_nacimiento_correcciones = document.getElementById('ben_depto_nacimiento_correcciones');
const inputben_mun_nacimiento_correcciones = document.getElementById('ben_mun_nacimiento_correcciones');
const inputdirecc_ben_correcciones = document.getElementById('direcc_ben_correcciones');
//SITUACIONES CORRECCIONES
const inputsituacion_correcciones = document.getElementById('situacion_correcciones');
const inputsituacion_ben_correcciones = document.getElementById('situacion_ben_correcciones');
//BOTONES CORRECCIONES
const BtnModificar = document.getElementById('btnCorregir');
const BtnCancelarCorrecciones = document.getElementById('btnCancelarCorrecciones');


//MODAL BAJAS
//DATOS BAJAS
const inputCatalogoBajas = document.getElementById('catalogo');
const inputNombreCompletoBajas = document.getElementById('nombre_completo');
const inputPlazaBajas = document.getElementById('plaza');
const inputEmpleoBajas = document.getElementById('empleo');
//BOTONES BAJAS
const BtnBaja = document.getElementById('btnDarBaja');
const BtnCancelarBaja = document.getElementById('btnCancelarBaja');


TablaTropa.classList.add('d-none');

BtnAlta.classList.add('d-none');
BtnLimpiarAlta.classList.add('d-none');
BtnCancelarAlta.classList.add('none');

BtnBaja.classList.add('d-none');
BtnCancelarBaja.classList.add('none');

BtnModificar.classList.add('d-none');
BtnCancelarCorrecciones.classList.add('none');

formVerificar.classList.add('none');
formAlta.classList.add('d-none');
formBaja.classList.add('d-none');
formCorrrecciones.classList.add('d-none');

const buscar = async () => {
    const url = '/Altas_Bajas/API/tropa/buscarTropa';
    const config = {
        method: 'GET'
    }

    const respuesta = await fetch(url, config);
    const data = await respuesta.json();

    // console.log(data)

    datatable.clear().draw();
    if (data && data.length > 0) {
        TablaTropa.classList.remove('d-none');
        datatable.rows.add(data).draw();
    }
}

let contador = 1;
const datatable = new DataTable('#TablaTropa', {
    data: null,
    language: lenguaje,
    pageLength: 20,
    lengthMenu: [30, 40, 50, 100],
    columns: [
        {
            title: 'No.',
            data: 'per_catalogo',
            width: '2%',
            render: (data, type, row, meta) => {
                return meta.row + 1;
            }
        },
        {
            title: 'Catalogo',
            data: 'catalogo',
            render: function (data, type, row) {
                if (data == '') {
                    return '"VACANTE"';
                } else {
                    return data;
                }
            }
        },
        {
            title: 'Grado',
            data: 'grado',
        },
        {
            title: 'Nombre Completo',
            data: 'nombre_completo',
            render: function (data, type, row) {
                if (data == '') {
                    return '"VACANTE"';
                } else {
                    return data;
                }
            }
        },
        {
            title: 'Plaza',
            data: 'plaza',
        },
        {
            title: 'Empleo',
            data: 'empleo',
            render: function (data, type, row) {
                if (data == '') {
                    return '"VACANTE"';
                } else {
                    return data;
                }
            }
        },
        {
            title: 'Ceom',
            data: 'ceom',
        },
        {
            title: 'Acciones',
            data: 'per_catalogo',
            searchable: false,
            orderable: false,
            render: (data, type, row, meta) => {
                let html = '';

                if (row.situacion === 'T0') {

                    html =
                    `
                    <button class='btn btn-danger baja' data-plaza="${row.plaza}" data-bs-toggle="modal" data-bs-target="#modalBajas"><i class="bi bi-person-fill-dash"></i></button>
                    
                    <button class='btn btn-primary correcciones' data-catalogo="${row.catalogo}" data-bs-toggle="modal" data-bs-target="#modalCorrecciones"><i class="bi bi-person-vcard-fill"></i></button>
                    `;

                } else {
                    html =

                    `
                    <button class='btn btn-warning alta' data-empleo="${row.empleo}" data-plaza="${row.plaza}" data-org_grado="${row.org_grado}" data-org_jerarquia="${row.org_jerarquia}" data-org_ceom="${row.org_ceom}" data-bs-toggle="modal" data-bs-target="#modalAltas"><i class="bi bi-person-fill-add"></i></button>

                    `;
                }

                return html;
            }
        }
    ]
});

// ALTAS //

const mostrarFormularioAltas = async () => {

    const dpi = inputDpi.value;

    if (dpi.length == 13) {

        try {
            Swal.fire({
                title: 'Cargando',
                text: 'Espere un momento mientras verificamos el DPI...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            const url = `/Altas_Bajas/API/tropa/verificarDpi?dpi=${dpi}`;
            const config = {
                method: 'GET'
            };

            const respuesta = await fetch(url, config);
            const data = await respuesta.json();
            // console.log(data)

            Swal.close();

            if (data.existe && Object.keys(data.existe).length > 0) {

                Swal.fire({
                    title: 'Alerta',
                    html: `La situación de <strong>${data.existe.nombre_completo}</strong> es: <strong>${data.existe.situacion}</strong>, por lo tanto no puede causar alta.`,
                    icon: 'error',
                    showConfirmButton: true,
                    timerProgressBar: false
                });

                formVerificar.classList.add('none');
                formVerificar.reset();

            } else {
                Swal.fire({
                    title: 'Verificado',
                    text: 'El usuario consultado si puede causar alta',
                    icon: 'success',
                    showConfirmButton: true
                });

                formVerificar.classList.add('d-none');
                formAlta.classList.remove('d-none');
                BtnAlta.classList.remove('d-none');
                BtnLimpiarAlta.classList.remove('d-none');

            }

        } catch (error) {

            console.log(error)

        }

    } else {

        Swal.fire({
            title: 'Error',
            text: 'DPI INVALIDO',
            icon: 'error',
            showConfirmButton: true
        });

    }

};

const buscarMunicipio = async () => {
    const departamento = selectDepartamentoTropa.value.trim();

    try {

        Swal.fire({
            title: 'Cargando...',
            text: 'Por favor, espera mientras se cargan los municipios.',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        const url = `/Altas_Bajas/API/tropa/buscarMunicipio?municipio=${departamento}`;
        const config = {
            method: 'GET',
        };

        const respuesta = await fetch(url);

        const data = await respuesta.json();

        selectMunicipioTropa.innerHTML = '';

        const defaultOption = document.createElement('option');
        defaultOption.value = '';
        defaultOption.textContent = 'Seleccione...';
        selectMunicipioTropa.appendChild(defaultOption);

        if (Array.isArray(data)) {
            data.slice(1).forEach((municipio) => {
                const option = document.createElement('option');
                option.value = municipio.dm_codigo;
                option.textContent = municipio.dm_desc_lg.trim();
                selectMunicipioTropa.appendChild(option);
            });
        } else {
            console.error('La respuesta no es válida:', data);
        }

        Swal.close();

    } catch (error) {

        console.error(error);

        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No se pudieron cargar los municipios. Inténtalo nuevamente.',
        });
    }
};

const buscarMunicipioResidencia = async () => {

    const DepartamentoResidencia = selectDepartamentoResidencia.value.trim();

    try {

        Swal.fire({
            title: 'Cargando...',
            text: 'Por favor, espera mientras se cargan los municipios.',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        const url = `/Altas_Bajas/API/tropa/buscarMunicipioResidencia?municipio=${DepartamentoResidencia}`;
        const config = {
            method: 'GET',
        };

        const respuesta = await fetch(url);

        const data = await respuesta.json();

        selectMunicipioResidencia.innerHTML = '';

        const defaultOption = document.createElement('option');
        defaultOption.value = '';
        defaultOption.textContent = 'Seleccione...';
        selectMunicipioResidencia.appendChild(defaultOption);

        if (Array.isArray(data)) {
            data.slice(1).forEach((municipio) => {
                const option = document.createElement('option');
                option.value = municipio.dm_codigo;
                option.textContent = municipio.dm_desc_lg.trim();
                selectMunicipioResidencia.appendChild(option);
            });
        } else {
            console.error('La respuesta no es válida:', data);
        }

        Swal.close();

    } catch (error) {

        console.error(error);

        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No se pudieron cargar los municipios. Inténtalo nuevamente.',
        });
    }
};

const buscarMunicipioNacimiento = async () => {

    const DepartamentoNacimiento = selectDepartamentoNacimiento.value.trim();

    try {

        Swal.fire({
            title: 'Cargando...',
            text: 'Por favor, espera mientras se cargan los municipios.',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        const url = `/Altas_Bajas/API/tropa/buscarMunicipioNacimiento?municipio=${DepartamentoNacimiento}`;
        const config = {
            method: 'GET',
        };

        const respuesta = await fetch(url);

        const data = await respuesta.json();

        selectMunicipioNacimiento.innerHTML = '';

        const defaultOption = document.createElement('option');
        defaultOption.value = '';
        defaultOption.textContent = 'Seleccione...';
        selectMunicipioNacimiento.appendChild(defaultOption);

        if (Array.isArray(data)) {
            data.slice(1).forEach((municipio) => {
                const option = document.createElement('option');
                option.value = municipio.dm_codigo;
                option.textContent = municipio.dm_desc_lg.trim();
                selectMunicipioNacimiento.appendChild(option);
            });
        } else {
            console.error('La respuesta no es válida:', data);
        }

        Swal.close();

    } catch (error) {

        console.error(error);

        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No se pudieron cargar los municipios. Inténtalo nuevamente.',
        });
    }
};

const buscarMunicipioBen = async () => {

    const DepartamentoBen = selectDepartamentoBen.value.trim();

    try {

        Swal.fire({
            title: 'Cargando...',
            text: 'Por favor, espera mientras se cargan los municipios.',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        const url = `/Altas_Bajas/API/tropa/buscarMunicipioBen?municipio=${DepartamentoBen}`;
        const config = {
            method: 'GET',
        };

        const respuesta = await fetch(url);

        const data = await respuesta.json();

        selectMunicipioBen.innerHTML = '';

        const defaultOption = document.createElement('option');
        defaultOption.value = '';
        defaultOption.textContent = 'Seleccione...';
        selectMunicipioBen.appendChild(defaultOption);

        if (Array.isArray(data)) {
            data.slice(1).forEach((municipio) => {
                const option = document.createElement('option');
                option.value = municipio.dm_codigo;
                option.textContent = municipio.dm_desc_lg.trim();
                selectMunicipioBen.appendChild(option);
            });
        } else {
            console.error('La respuesta no es válida:', data);
        }

        Swal.close();

    } catch (error) {

        console.error(error);

        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No se pudieron cargar los municipios. Inténtalo nuevamente.',
        });
    }
};

const generarCatalogo = async () => {



    Swal.fire({
        title: 'Cargando',
        text: 'Buscando...',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const url = '/Altas_Bajas/API/tropa/generarCatalogo';
        const headers = new Headers();
        headers.append('X-Requested-With', 'fetch');
        const config = {
            method: 'GET',
            headers,
        };

        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        // console.log(data)
        Swal.close();

        const { codigo, mensaje, catalogo_nuevo, catalogo_insertar } = data;

        if (codigo === 1) {

            Catalogo_insertar.value = catalogo_insertar;
            inputCatalogo.value = catalogo_nuevo;

            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'El catálogo se generó correctamente.',
            });
        } else {

            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: mensaje || 'No se pudo generar el catálogo. Intenta nuevamente.',
            });
        }

    } catch (error) {

        Swal.close();

        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Ocurrió un problema al realizar la consulta. Por favor, intenta nuevamente.',
        });

        console.error(error);
    }
};

function cuiIsValid(cui) {
    if (!cui) {
        return false;
    }

    var cuiRegExp = /^[0-9]{4}\s?[0-9]{5}\s?[0-9]{4}$/;

    if (!cuiRegExp.test(cui)) {
        return false;
    }

    cui = cui.replace(/\s/g, '');
    var depto = parseInt(cui.substring(9, 11), 10);
    var muni = parseInt(cui.substring(11, 13));
    var numero = cui.substring(0, 8);
    var verificador = parseInt(cui.substring(8, 9));

    var munisPorDepto = [
        17, 8, 16, 16, 13, 14, 19, 8, 24, 21, 9, 30, 32, 21, 8, 17, 14, 5, 11, 11, 7, 17
    ];

    if (depto === 0 || muni === 0 || depto > munisPorDepto.length || muni > munisPorDepto[depto - 1]) {
        return false;
    }

    var total = 0;
    for (var i = 0; i < numero.length; i++) {
        total += numero[i] * (i + 2);
    }

    var modulo = (total % 11);

    return modulo === verificador;
};

function nitIsValid(nit) {
    if (!nit) {
        return true;
    }

    nit = nit.replace(/[^0-9kK-]/g, '');

    const nitRegExp = /^[0-9]+(-?[0-9kK])?$/;

    if (!nitRegExp.test(nit)) {
        return false;
    }

    nit = nit.replace(/-/, '');
    const lastChar = nit.length - 1;
    const number = nit.substring(0, lastChar);
    const expectedChecker = nit.substring(lastChar).toLowerCase();

    let factor = number.length + 1;
    let total = 0;

    for (let i = 0; i < number.length; i++) {
        const digit = parseInt(number.charAt(i), 10);
        total += digit * factor;
        factor -= 1;
    }

    const modulus = (11 - (total % 11)) % 11;
    const computedChecker = (modulus === 10 ? 'k' : modulus.toString());

    return expectedChecker === computedChecker;
};

function establecerPrimerDiaMes() {
    try {

        const fechaActual = new Date();

        const primerDiaMes = new Date(fechaActual.getFullYear(), fechaActual.getMonth(), 1);

        const anio = primerDiaMes.getFullYear();
        const mes = String(primerDiaMes.getMonth() + 1).padStart(2, '0');
        const dia = String(primerDiaMes.getDate()).padStart(2, '0');
        const fechaFormateada = `${anio}-${mes}-${dia}`;

        const campoFecha = document.getElementById('per_fec_nomb');
        if (campoFecha) {
            campoFecha.value = fechaFormateada;
            // console.log(campoFecha)
            // return;
        } else {

        }
    } catch (error) {
        console.error(error.message);

        Swal.fire({
            icon: 'error',
            title: 'Error al establecer la fecha',
            text: error.message,
            confirmButtonText: 'Aceptar'
        });
    }
};

function validarTelefono(telefono) {
    const regexTelefono = /^[0-9][0-9]{7}$/;
    return regexTelefono.test(telefono);
}

const ObtenerDatosPlaza = (e) => {
    const plaza = e.currentTarget.dataset.plaza;
    const empleo = e.currentTarget.dataset.empleo;
    const org_grado = e.currentTarget.dataset.org_grado;
    const org_jerarquia = e.currentTarget.dataset.org_jerarquia;
    const org_ceom = e.currentTarget.dataset.org_ceom;

    // console.log(e)

    inputPlaza.value = plaza
    inputEmpleo.value = empleo
    inputGrado.value = org_grado
    inputCeom.value = org_ceom
    imputJerarquia.value = org_jerarquia

};

const darAlta = async (e) => {
    e.preventDefault();

    
    BtnAlta.disabled = true;
    
    if (!validarFormulario(formAlta, ['alta_id', 'per_nom3', 'per_ape3', 'per_zona'])) {
        Swal.fire({
            title: "Campos vacíos",
            text: "Debe llenar todos los campos",
            icon: "info"
        });
        
        BtnAlta.disabled = false;
        
        return;
    }
    
    Swal.fire({
        title: 'Cargando',
        text: 'Espere un momento mientras registra al usuario',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });
    
    const formData = new FormData(formAlta);

    const beneficiarios = [];

    const beneficiariosForms = document.querySelectorAll('.formulario-clonable');

    beneficiariosForms.forEach(form => {

        const beneficiario = {
            nombre: form.querySelector('[name="ben_nombre"]').value,
            dpi: form.querySelector('[name="ben_dpi"]').value,
            sexo: form.querySelector('[name="ben_sexo"]').value,
            celular: form.querySelector('[name="ben_celular"]').value,
            parentesco: form.querySelector('[name="ben_parentezco"]').value,
            direccion: form.querySelector('[name="ben_direccion"]').value,
            estadoCivil: form.querySelector('[name="ben_est_civil"]').value,
            fechaNacimiento: form.querySelector('[name="ben_fec_nac"]').value,
            departamentoNacimiento: form.querySelector('[name="ben_depto_nacimiento"]').value,
            municipioNacimiento: form.querySelector('[name="ben_mun_nacimiento"]').value,
            porcentaje: form.querySelector('[name="ben_porcentaje"]').value
        };

        beneficiarios.push(beneficiario);
    });

    formData.append('beneficiarios', JSON.stringify(beneficiarios));

    try {
        const url = "/Altas_Bajas/API/tropa/darAlta";
        const config = {
            method: 'POST',
            body: formData
        };

        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        const { codigo, mensaje, detalle } = data;
        let icon = 'info';

        if (codigo == 1) {

            Swal.close();

            Swal.fire({
                title: "Éxito",
                text: mensaje,
                icon: "success"
            });

            modalBSAltas.hide();
            formAlta.reset();
            BtnAlta.disabled = false;
            buscar();

        } else {

            Swal.close();
            
            Swal.fire({
                title: "Error",
                text: mensaje,
                icon: "error"
            });
            console.log(detalle);
        }

        Toast.fire({
            icon: icon,
            title: mensaje
        });

    } catch (error) {
        console.log(error);
    }

    modalBSAltas.hide();
    formAlta.reset();
    BtnAlta.disabled = false;
    buscar();
};


// BAJAS //
const ObtenerDatosBajas = async (e) => {

    const plaza = e.currentTarget.dataset.plaza;

    Swal.fire({
        title: 'Cargando',
        text: 'Buscando...',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const url = `/Altas_Bajas/API/tropa/obtenerDatosBajas?plaza=${plaza}`;
        const headers = new Headers();
        headers.append('X-Requested-With', 'fetch');
        const config = {
            method: 'GET',
            headers,
        };

        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        const { mensaje, codigo, datos } = data;

        Swal.close();

        if (codigo == '1') {

            inputCatalogoBajas.value = `${datos.catalogo_baja}`;
            inputNombreCompletoBajas.value = `${datos.grado_baja} ${datos.nombre_completo_baja}`;
            inputEmpleoBajas.value = `${datos.empleo_baja}`;
            inputPlazaBajas.value = `${datos.plaza_baja}`;

            formBaja.classList.remove('d-none');

        } else {

            console.log('Código inválido');

            inputCatalogoBajas.value = '';
            inputNombreCompletoBajas.value = '';
            inputPlazaBajas.value = '';
            inputEmpleoBajas.value = '';

            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: mensaje || 'No se encontraron datos para la plaza proporcionada.',
            });
        }

        BtnBaja.classList.remove('d-none');

    } catch (error) {

        Swal.close();

        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Ocurrió un problema al obtener los datos. Por favor, intenta nuevamente.',
        });

        console.log(error);
    }
};


//CORRECCIONES

const obtenerDatosCorrecciones = async (e) => {

    const correcciones = e.currentTarget.dataset.catalogo;

    Swal.fire({
        title: 'Cargando',
        text: 'Buscando...',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const url = `/Altas_Bajas/API/tropa/obtenerDatosCorrecciones?catalogo=${correcciones}`;
        const headers = new Headers();
        headers.append('X-Requested-With', 'fetch');
        const config = {
            method: 'GET',
            headers,
        };

        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        const { mensaje, codigo, datos } = data;

        // console.log(data);

        Swal.close();

        if (codigo === 1) {

            //DATOS PERSONALES
            inputcatalogo_correcciones.value = `${datos.catalogo_correcciones}`;
            inputprimer_nombre_correcciones.value = `${datos.primer_nombre_correcciones}`;
            inputsegundo_nombre_correcciones.value = `${datos.segundo_nombre_correcciones}`;
            inputtercer_nombre_correcciones.value = `${datos.tercer_nombre_correcciones}`;
            inputprimer_apellido_correcciones.value = `${datos.primer_apellido_correcciones}`;
            inputsegundo_apellido_correcciones.value = `${datos.segundo_apellido_correcciones}`;
            inputtercer_apellido_correcciones.value = `${datos.tercer_apellido_correcciones}`;
            inputdpi_correcciones.value = `${datos.dpi_correcciones}`;
            inputfech_ext_dpi_tropa_correcciones.value = `${datos.fech_ext_dpi_tropa_correcciones}`;
            inputdepto_dpi_correcciones.value = `${datos.depto_dpi_correcciones}`;
            inputmunicipio_dpi_correcciones.value = `${datos.municipio_dpi_correcciones}`;
            inputplaza_correcciones.value = `${datos.plaza_correcciones}`;
            inputgrado_correcciones.value = `${datos.grado_correcciones}`;
            inputempleo_correcciones.value = `${datos.empleo_correcciones}`;
            inputfech_alta_correcciones.value = `${datos.fech_alta_correcciones}`;

            //DATOS GENERALES
            inputestado_civil_correcciones.value = `${datos.estado_civil_correcciones}`;
            inputtipo_sangre_correcciones.value = `${datos.tipo_sangre_correcciones}`;
            inputdireccion_correcciones.value = `${datos.direccion_correcciones}`;
            inputzona_correcciones.value = `${datos.zona_correcciones}`;
            inputdepto_residencia_correcciones.value = `${datos.depto_residencia_correcciones}`;
            inputmunicipio_residencia_correcciones.value = `${datos.municipio_residencia_correcciones}`;
            inputtelefono_correcciones.value = `${datos.telefono_correcciones}`;
            inputsexo_correcciones.value = `${datos.sexo_correcciones}`;
            inputfech_nac_correcciones.value = `${datos.fech_nac_correcciones}`;
            inputdepto_nacimiento_correcciones.value = `${datos.depto_nacimiento_correcciones}`;
            inputmunicipio_nacimiento_correcciones.value = `${datos.municipio_nacimiento_correcciones}`;
            inputnit_correcciones.value = `${datos.nit_correcciones}`;
            inputcorreo_correcciones.value = `${datos.correo_correcciones}`;

            //DATOS BENEFICIARIO
            inputben_nombre_correcciones.value = `${datos.ben_nombre_correcciones}`;
            inputdpi_ben_correcciones.value = `${datos.dpi_ben_correcciones}`;
            inputben_genero_correcciones.value = `${datos.ben_genero_correcciones}`;
            inputtel_ben_correcciones.value = `${datos.tel_ben_correcciones}`;
            inputparentesco_correcciones.value = `${datos.parentesco_correcciones}`;
            inputben_est_civil_correcciones.value = `${datos.ben_est_civil_correcciones}`;
            inputben_fech_nacimiento_correcciones.value = `${datos.ben_fech_nacimiento_correcciones}`;
            inputben_depto_nacimiento_correcciones.value = `${datos.ben_depto_nacimiento_correcciones}`;
            inputben_mun_nacimiento_correcciones.value = `${datos.ben_mun_nacimiento_correcciones}`;
            inputdirecc_ben_correcciones.value = `${datos.direcc_ben_correcciones}`;

            //SITUACIONES
            inputsituacion_correcciones.value = `${datos.situacion_correcciones}`;
            inputsituacion_ben_correcciones.value = `${datos.situacion_ben_correcciones}`;

            formCorrrecciones.classList.remove('d-none');

        } else {
            console.log('Código inválido');

            //DATOS PERSONALES
            inputcatalogo_correcciones.value = '';
            inputprimer_nombre_correcciones.value = '';
            inputsegundo_nombre_correcciones.value = '';
            inputtercer_nombre_correcciones.value = '';
            inputprimer_apellido_correcciones.value = '';
            inputsegundo_apellido_correcciones.value = '';
            inputtercer_apellido_correcciones.value = '';
            inputdpi_correcciones.value = '';
            inputfech_ext_dpi_tropa_correcciones.value = '';
            inputdepto_dpi_correcciones = '';
            inputmunicipio_dpi_correcciones = '';
            inputplaza_correcciones.value = '';
            inputgrado_correcciones.value = '';
            inputempleo_correcciones.value = '';
            inputfech_alta_correcciones.value = '';

            //DATOS GENERALES
            inputestado_civil_correcciones.value = '';
            inputtipo_sangre_correcciones.value = '';
            inputdireccion_correcciones.value = '';
            inputzona_correcciones.value = '';
            inputdepto_residencia_correcciones.value = '';
            inputmunicipio_residencia_correcciones.value = '';
            inputtelefono_correcciones.value = '';
            inputsexo_correcciones.value = '';
            inputfech_nac_correcciones.value = '';
            inputdepto_nacimiento_correcciones
            inputmunicipio_nacimiento_correcciones
            inputnit_correcciones.value = '';
            inputcorreo_correcciones.value = '';

            //DATOS BENEFICIARIO
            inputben_nombre_correcciones.value = '';
            inputdpi_ben_correcciones.value = '';
            inputben_genero_correcciones.value = '';
            inputtel_ben_correcciones.value = '';
            inputparentesco_correcciones.value = '';
            inputben_est_civil_correcciones.value = '';
            inputben_fech_nacimiento_correcciones.value = '';
            inputben_depto_nacimiento_correcciones.value = '';
            inputben_mun_nacimiento_correcciones.value = '';
            inputdirecc_ben_correcciones.value = '';

            //SITUAICONES
            inputsituacion_correcciones.value = '';
            inputsituacion_ben_correcciones.value = '';

            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: mensaje || 'No se encontraron datos para la plaza proporcionada.',
            });
        }

    } catch (error) {

        Swal.close();

        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Ocurrió un problema al obtener los datos. Por favor, intenta nuevamente.',
        });

        console.log(error);
    }
};


//EVENTOS
formAlta.addEventListener('submit', darAlta)

document.addEventListener('DOMContentLoaded', function () {
    const formularioContainer = document.getElementById('formulario-container');

    const buscarMunicipioBen = async (selectDepartamentoBen) => {

        const selectMunicipioBen = selectDepartamentoBen.closest('.formulario-clonable')
            .querySelector('[id^=ben_mun_nacimiento]');

        const DepartamentoBen = selectDepartamentoBen.value.trim();

        if (!DepartamentoBen) {
            selectMunicipioBen.innerHTML = '<option value="">Seleccione...</option>';
            return;
        }

        try {
            Swal.fire({
                title: 'Cargando...',
                text: 'Por favor, espera mientras se cargan los municipios.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            const url = `/Altas_Bajas/API/tropa/buscarMunicipioBen?municipio=${DepartamentoBen}`;

            const respuesta = await fetch(url);
            const data = await respuesta.json();

            selectMunicipioBen.innerHTML = '';

            const defaultOption = document.createElement('option');
            defaultOption.value = '';
            defaultOption.textContent = 'Seleccione...';
            selectMunicipioBen.appendChild(defaultOption);

            if (Array.isArray(data)) {
                data.slice(1).forEach((municipio) => {
                    const option = document.createElement('option');
                    option.value = municipio.dm_codigo;
                    option.textContent = municipio.dm_desc_lg.trim();
                    selectMunicipioBen.appendChild(option);
                });
            } else {
                console.error('La respuesta no es válida:', data);
                selectMunicipioBen.innerHTML = '<option value="">Sin municipios</option>';
            }

            Swal.close();

        } catch (error) {
            console.error(error);

            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No se pudieron cargar los municipios. Inténtalo nuevamente.',
            });

            // Restaurar el select de municipios a su estado inicial
            selectMunicipioBen.innerHTML = '<option value="">Seleccione...</option>';
        }
    };

    // Añadir event listener para manejar cambios en departamentos de todos los formularios
    formularioContainer.addEventListener('change', function (event) {
        // Verificar si el cambio ocurrió en un select de departamento de beneficiario
        const selectDepartamentoBen = event.target;
        if (selectDepartamentoBen.id.startsWith('ben_depto_nacimiento')) {
            buscarMunicipioBen(selectDepartamentoBen);
        }
    });

    // Función para manejar la clonación de formularios
    function clonarFormularioBeneficiario(event) {
        // Prevenir cualquier comportamiento predeterminado
        event.preventDefault();
        event.stopPropagation();

        // Seleccionar el primer formulario cloneable
        const formularioOriginal = document.querySelector('.formulario-clonable');

        // Clonar el formulario
        const nuevoFormulario = formularioOriginal.cloneNode(true);

        // Limpiar los valores de los inputs
        const inputs = nuevoFormulario.querySelectorAll('input, select');
        inputs.forEach(input => {
            // Limpiar valores
            if (input.type === 'text' || input.type === 'number' || input.type === 'date') {
                input.value = '';
            }
            if (input.tagName === 'SELECT') {
                input.selectedIndex = 0;
            }

            // Generar nuevos IDs únicos
            const originalId = input.id;
            const baseId = originalId.replace(/_\d+$/, '');
            const newId = `${baseId}_${Date.now()}`;
            input.id = newId;
            input.name = newId;
        });

        // Actualizar los labels
        const labels = nuevoFormulario.querySelectorAll('label');
        labels.forEach(label => {
            const forAttribute = label.getAttribute('for');
            if (forAttribute) {
                const baseFor = forAttribute.replace(/_\d+$/, '');
                label.setAttribute('for', `${baseFor}_${Date.now()}`);
            }
        });

        // Mostrar el botón de eliminar
        const quitarBtn = nuevoFormulario.querySelector('.quitar-btn');
        quitarBtn.style.display = 'flex';

        // Añadir el nuevo formulario al contenedor
        formularioContainer.appendChild(nuevoFormulario);
    }

    // Añadir evento al botón de agregar formulario usando delegación de eventos
    document.addEventListener('click', function (event) {
        if (event.target.closest('#agregar-form')) {
            clonarFormularioBeneficiario(event);
        }
    });
});

inputDpi.addEventListener('change', mostrarFormularioAltas);
dpiTropa.addEventListener('change', function () {
    const inputValue = this.value.trim();

    if (inputValue == "") {

        dpiTropa.classList.remove('is-valid');
        dpiTropa.classList.remove('is-invalid');
        return;
    }

    const cleanedValue = inputValue.replace(/[^0-9\s]/g, '');

    this.value = cleanedValue;

    if (cuiIsValid(cleanedValue)) {

        dpiTropa.classList.add('is-valid');
        dpiTropa.classList.remove('is-invalid');

    } else {

        Swal.fire({
            icon: 'error',
            title: 'DPI no válido',
            text: 'El DPI ingresado no cumple con los requisitos.',
        });

        dpiTropa.classList.remove('is-valid');
        dpiTropa.classList.add('is-invalid');
    }
});

dpiBeneficiario.addEventListener('change', function () {
    const inputValue = this.value.trim();

    if (inputValue == "") {

        dpiBeneficiario.classList.remove('is-valid');
        dpiBeneficiario.classList.remove('is-invalid');
        return;
    }

    const cleanedValue = inputValue.replace(/[^0-9\s]/g, '');

    this.value = cleanedValue;

    if (cuiIsValid(cleanedValue)) {

        dpiBeneficiario.classList.add('is-valid');
        dpiBeneficiario.classList.remove('is-invalid');

    } else {

        Swal.fire({
            icon: 'error',
            title: 'DPI no válido',
            text: 'El DPI ingresado no cumple con los requisitos.',
        });
        this.value = '';

        dpiBeneficiario.classList.remove('is-valid');
        dpiBeneficiario.classList.add('is-invalid');
    }
});

nitTropa.addEventListener('change', function () {
    const inputValue = this.value.trim();

    if (inputValue === "") {
        nitTropa.classList.remove('is-valid');
        nitTropa.classList.remove('is-invalid');
        return;
    }

    const cleanedValue = inputValue.replace(/[^0-9kK-]/g, '');

    this.value = cleanedValue;

    if (nitIsValid(cleanedValue)) {
        nitTropa.classList.add('is-valid');
        nitTropa.classList.remove('is-invalid');
    } else {

        Swal.fire({
            icon: 'error',
            title: 'NIT no válido',
            text: 'El NIT ingresado no cumple con los requisitos.',
        });

        this.value = '';
        nitTropa.classList.remove('is-valid');
        nitTropa.classList.add('is-invalid');
    }
});

teltropa.addEventListener('change', function () {
    const inputValue = this.value.trim();

    if (inputValue === "") {
        teltropa.classList.remove('is-valid');
        teltropa.classList.remove('is-invalid');
        return;
    }

    const cleanedValue = inputValue.replace(/[^0-9]/g, '');
    this.value = cleanedValue;

    if (validarTelefono(cleanedValue)) {

        teltropa.classList.add('is-valid');
        teltropa.classList.remove('is-invalid');

    } else {

        Swal.fire({
            icon: 'error',
            title: 'Teléfono no válido',
            text: 'El número ingresado no es válido.',
        });

        this.value = '';
        teltropa.classList.remove('is-valid');
        teltropa.classList.add('is-invalid');
    }
});

telBeneficiario.addEventListener('change', function () {
    const inputValue = this.value.trim();

    if (inputValue === "") {
        telBeneficiario.classList.remove('is-valid');
        telBeneficiario.classList.remove('is-invalid');
        return;
    }

    const cleanedValue = inputValue.replace(/[^0-9]/g, '');

    this.value = cleanedValue;

    if (validarTelefono(cleanedValue)) {

        telBeneficiario.classList.add('is-valid');
        telBeneficiario.classList.remove('is-invalid');


    } else {

        Swal.fire({
            icon: 'error',
            title: 'Teléfono no válido',
            text: 'El número ingresado no es válido.',
        });

        this.value = '';
        telBeneficiario.classList.remove('is-valid');
        telBeneficiario.classList.add('is-invalid');
    }
});

selectDepartamentoTropa.addEventListener('change', buscarMunicipio);
selectDepartamentoResidencia.addEventListener('change', buscarMunicipioResidencia);
selectDepartamentoNacimiento.addEventListener('change', buscarMunicipioNacimiento);
selectDepartamentoBen.addEventListener('change', buscarMunicipioBen);

datatable.on('click', '.alta', ObtenerDatosPlaza);
datatable.on('click', '.baja', ObtenerDatosBajas);
datatable.on('click', '.correcciones', obtenerDatosCorrecciones);

BtnSearchVerificar.addEventListener('click', mostrarFormularioAltas);
BtnSearchCatalogo.addEventListener('click', generarCatalogo);
BtnLimpiarAlta.addEventListener('click', function () {

    formVerificar.reset();
    formAlta.reset();
    formVerificar.classList.add('d-none');
    BtnAlta.classList.remove('d-none');
    BtnLimpiarAlta.classList.remove('d-none');
    BtnCancelarAlta.classList.add('none');

});

modalAltas.addEventListener('hidden.bs.modal', function () {

    formVerificar.reset();
    formAlta.reset();
    formVerificar.classList.remove('d-none');
    formAlta.classList.add('d-none');
    BtnAlta.classList.add('d-none');
    BtnLimpiarAlta.classList.add('d-none');
    BtnCancelarBaja.classList.remove('d-none');

});

modalAltas.addEventListener('shown.bs.modal', function () {
    establecerPrimerDiaMes();
});

modalBajas.addEventListener('hidden.bs.modal', function () {

    formBaja.reset();
    BtnBaja.classList.add('d-none');
    BtnCancelarBaja.classList.remove('d-none');

});

modalCorrecciones.addEventListener('hidden.bs.modal', function () {

    formCorrrecciones.reset();
    BtnModificar.classList.add('d-none');
    BtnCancelarCorrecciones.classList.remove('d-none');

});

buscar();