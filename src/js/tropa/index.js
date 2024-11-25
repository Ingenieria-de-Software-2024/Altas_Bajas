import { Dropdown, Tab, Modal } from "bootstrap";
import { Toast, validarFormulario } from "../funciones";
import Swal from "sweetalert2";
import DataTable from "datatables.net-bs5";
import { lenguaje } from "../lenguaje";
import { config } from "fullcalendar";

const TablaTropa = document.getElementById('TablaTropa');

const modalAltas = document.getElementById('modalAltas');
const modalBajas = document.getElementById('modalBajas');
const modalCorrecciones = document.getElementById('modalCorrecciones');

const formAlta = document.getElementById('formAlta');
const formVerificar = document.getElementById('formVerificar');
const formCorrrecciones = document.getElementById('formCorrecciones');

const selectDepartamentoAltas = document.getElementById('per_departamento');
const selectMunicipioAltas = document.getElementById('per_ext_ced_lugar');

//VERIFICACIÓN DPI
const inputDpi = document.getElementById('ver_dpi');

//DATOS BAJAS
const inputCatalogoBajas = document.getElementById('catalogo')
const inputNombreCompletoBajas = document.getElementById('nombre_completo')
const inputPlazaBajas = document.getElementById('plaza')
const inputEmpleoBajas = document.getElementById('empleo')

//DATOS PERSONALES
const inputcatalogo_correcciones = document.getElementById('catalogo_correcciones')
const inputprimer_nombre_correcciones = document.getElementById('primer_nombre_correcciones')
const inputsegundo_nombre_correcciones = document.getElementById('segundo_nombre_correcciones')
const inputtercer_nombre_correcciones = document.getElementById('tercer_nombre_correcciones')
const inputprimer_apellido_correcciones = document.getElementById('primer_apellido_correcciones')
const inputsegundo_apellido_correcciones = document.getElementById('segundo_apellido_correcciones')
const inputtercer_apellido_correcciones = document.getElementById('tercer_apellido_correcciones')
const inputdpi_correcciones = document.getElementById('dpi_correcciones')
const inputfech_ext_dpi_tropa_correcciones = document.getElementById('fech_ext_dpi_tropa_correcciones')
const inputdepto_dpi_correcciones = document.getElementById('depto_dpi_correcciones')
const inputmunicipio_dpi_correcciones = document.getElementById('municipio_dpi_correcciones')
const inputplaza_correcciones = document.getElementById('plaza_correcciones')
const inputgrado_correcciones = document.getElementById('grado_correcciones')
const inputempleo_correcciones = document.getElementById('empleo_correcciones')
const inputfech_alta_correcciones = document.getElementById('fech_alta_correcciones')

//DATOS GENERALES
const inputestado_civil_correcciones = document.getElementById('estado_civil_correcciones')
const inputtipo_sangre_correcciones = document.getElementById('tipo_sangre_correcciones')
const inputdireccion_correcciones = document.getElementById('direccion_correcciones')
const inputzona_correcciones = document.getElementById('zona_correcciones')
const inputdepto_residencia_correcciones = document.getElementById('depto_residencia_correcciones')
const inputmunicipio_residencia_correcciones = document.getElementById('municipio_residencia_correcciones')
const inputtelefono_correcciones = document.getElementById('telefono_correcciones')
const inputsexo_correcciones = document.getElementById('sexo_correcciones')
const inputfech_nac_correcciones = document.getElementById('fech_nac_correcciones')
const inputdepto_nacimiento_correcciones = document.getElementById('depto_nacimiento_correcciones')
const inputmunicipio_nacimiento_correcciones = document.getElementById('municipio_nacimiento_correcciones')
const inputnit_correcciones = document.getElementById('nit_correcciones')
const inputcorreo_correcciones = document.getElementById('correo_correcciones')

//DATOS BENEFICIARIO
const inputben_nombre_correcciones = document.getElementById('ben_nombre_correcciones')
const inputdpi_ben_correcciones = document.getElementById('dpi_ben_correcciones')
const inputben_genero_correcciones = document.getElementById('ben_genero_correcciones')
const inputtel_ben_correcciones = document.getElementById('tel_ben_correcciones')
const inputparentesco_correcciones = document.getElementById('parentesco_correcciones')
const inputben_est_civil_correcciones = document.getElementById('ben_est_civil_correcciones')
const inputben_fech_nacimiento_correcciones = document.getElementById('ben_fech_nacimiento_correcciones')
const inputben_depto_nacimiento_correcciones = document.getElementById('ben_depto_nacimiento_correcciones')
const inputben_mun_nacimiento_correcciones = document.getElementById('ben_mun_nacimiento_correcciones')
const inputdirecc_ben_correcciones = document.getElementById('direcc_ben_correcciones')

//SITUACIONES CORRECCIONES
const inputsituacion_correcciones = document.getElementById('situacion_correcciones')
const inputsituacion_ben_correcciones = document.getElementById('situacion_ben_correcciones')

const BtnSearchVerificar = document.getElementById('searchVerificar');
const BtnAlta = document.getElementById('btnDarAlta');
const BtnLimpiar = document.getElementById('btnLimpiarAlta');
const BtnCancelar = document.getElementById('btnCancelarAlta');

TablaTropa.classList.add('d-none');

BtnAlta.classList.add('d-none');
BtnLimpiar.classList.add('d-none');
BtnCancelar.classList.add('none');

formAlta.classList.add('d-none');
formVerificar.classList.add('none');
formCorrrecciones.classList.add('none');

const buscar = async () => {
    const url = '/Altas_Bajas/API/tropa/buscarTropa';
    const config = {
        method: 'GET'
    }

    const respuesta = await fetch(url, config);
    const data = await respuesta.json();

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
    pageLength: 5,
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
            render: function(data, type, row) {
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
            render: function(data, type, row) {
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
            render: function(data, type, row) {
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
                    <button class='btn btn-danger baja' data-plaza=${row.plaza} data-bs-toggle="modal" data-bs-target="#modalBajas"><i class="bi bi-person-fill-dash"></i></button>
                    
                    <button class='btn btn-primary correcciones' data-catalogo=${row.catalogo} data-bs-toggle="modal" data-bs-target="#modalCorrecciones"><i class="bi bi-person-vcard-fill"></i></button>
                    `;

                } else {
                    html =

                        `
                    <button class='btn btn-warning alta' data-bs-toggle="modal" data-bs-target="#modalAltas"><i class="bi bi-person-fill-add"></i></button>

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
                BtnLimpiar.classList.remove('d-none');
                BtnCancelar.classList.remove('d-none')

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
    const departamento = selectDepartamentoAltas.value.trim();

    try {
        const url = `/Altas_Bajas/API/tropa/buscarMunicipio?municipio=${departamento}`;
        const config = {
            method: 'GET'
        };

        const respuesta = await fetch(url, config);
        const data = await respuesta.json();

        selectMunicipioAltas.innerHTML = '';

        const defaultOption = document.createElement('option');
        defaultOption.value = '';
        defaultOption.textContent = 'Seleccione...';
        selectMunicipioAltas.appendChild(defaultOption);

        if (data) {

            data.slice(1).forEach(municipio => {
                const option = document.createElement('option');
                option.value = municipio.dm_codigo;
                option.textContent = municipio.dm_desc_lg.trim();
                selectMunicipioAltas.appendChild(option);
            });

        }
    } catch (error) {

        console.log(error);

    }
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

        console.log(data);

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



inputDpi.addEventListener('change', mostrarFormularioAltas);

selectDepartamentoAltas.addEventListener('change', buscarMunicipio);

datatable.on('click', '.baja', ObtenerDatosBajas)
datatable.on('click', '.correcciones', obtenerDatosCorrecciones)

BtnSearchVerificar.addEventListener('click', mostrarFormularioAltas)
BtnLimpiar.addEventListener('click', function () {

    formVerificar.reset();
    formAlta.reset();
    formVerificar.classList.add('d-none');
    BtnAlta.classList.remove('d-none');
    BtnLimpiar.classList.remove('d-none');
    BtnCancelar.classList.add('d-none');

});

modalAltas.addEventListener('hidden.bs.modal', function () {

    formVerificar.reset();
    formAlta.reset();
    formVerificar.classList.remove('d-none');
    formAlta.classList.add('d-none');
    BtnAlta.classList.add('d-none');
    BtnLimpiar.classList.add('d-none');
    BtnCancelar.classList.remove('d-none');

});

buscar();