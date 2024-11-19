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

const inputDpi = document.getElementById('ver_dpi');
const inputCatalogoBajas = document.getElementById('catalogo')
const inputNombreCompletoBajas = document.getElementById('nombre_completo')
const inputPlazaBajas = document.getElementById('plaza')
const inputEmpleoBajas = document.getElementById('empleo')

const BtnSearchVerificar = document.getElementById('searchVerificar');
const BtnAlta = document.getElementById('btnDarAlta');
const BtnLimpiar = document.getElementById('btnLimpiar');
const BtnCancelar = document.getElementById('btnCancelar');

TablaTropa.classList.add('d-none');

BtnAlta.classList.add('d-none');
BtnLimpiar.classList.add('d-none');
BtnCancelar.classList.add('none');

formAlta.classList.add('d-none');
formVerificar.classList.add('none');

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
        },
        {
            title: 'Grado',
            data: 'grado',
        },
        {
            title: 'Nombre Completo',
            data: 'nombre_completo',
        },
        {
            title: 'Plaza',
            data: 'plaza',
        },
        {
            title: 'Empleo',
            data: 'empleo',
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
                
                if (row.situacion === 'T0'){

                    html = 
                    `
                    <button class='btn btn-danger baja' data-plaza=${row.plaza} data-bs-toggle="modal" data-bs-target="#modalBajas"><i class="bi bi-person-fill-dash"></i></button>
                    
                    <button class='btn btn-primary correcciones' data-bs-toggle="modal" data-bs-target="#modalCorrecciones"><i class="bi bi-person-vcard-fill"></i></button>
                    `;

                }else{
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
                    html: `La situación de <strong>${data.existe.nombre_completo}</strong> es: <strong>${data.existe.situacion}</strong>, por lo tando no puede causar alta.`,
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

// const darAlta = async (e) => {
    
//     e.preventDefault();

//     BtnAlta.disabled = true;

//     if (!validarFormulario(formulario, ['emp_id'])) {
//         Swal.fire({
//             title: "Campos vacios",
//             text: "Debe llenar todos los campos",
//             icon: "question"
//         })
//         BtnAlta.disabled = false;
//         return
//     }

//     try {
//         const body = new FormData(formulario)
//         const url = '/hotel/API/empleado/guardar';

//         const config = {
//             method: 'POST',
//             body
//         }

//         const respuesta = await fetch(url, config);
//         const data = await respuesta.json();
//         const { codigo, mensaje, detalle } = data

//         if (codigo == 1) {

//             Swal.fire({
//                 title: '¡Éxito!',
//                 text: mensaje,
//                 icon: 'success',
//                 showConfirmButton: false,
//                 timer: 1500,
//                 timerProgressBar: true,
//                 background: '#e0f7fa',
//                 customClass: {
//                     title: 'custom-title-class',
//                     text: 'custom-text-class'
//                 }

//             });
//             formulario.reset();
//             Buscar();
//         } else {
//             Swal.fire({
//                 title: '¡Error!',
//                 text: mensaje,
//                 icon: 'error',
//                 showConfirmButton: false,
//                 timer: 1500,
//                 timerProgressBar: true,
//                 background: '#e0f7fa',
//                 customClass: {
//                     title: 'custom-title-class',
//                     text: 'custom-text-class'
//                 }

//             });
//         }

//     } catch (error) {
//         console.log(error)
//     }
//     BtnGuardar.disabled = false;

// }

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
            inputCatalogoBajas.value = `${datos.catalogo}`;
            inputNombreCompletoBajas.value = `${datos.grado} ${datos.nombre_completo}`;
            inputEmpleoBajas.value = `${datos.empleo}`;
            inputPlazaBajas.value = `${datos.plaza}`;
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

inputDpi.addEventListener('change', mostrarFormularioAltas);

selectDepartamentoAltas.addEventListener('change', buscarMunicipio);

datatable.on('click', '.baja', ObtenerDatosBajas)

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