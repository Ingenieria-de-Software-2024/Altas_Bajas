import { Dropdown, Tab, Modal } from "bootstrap";
import { Toast, validarFormulario } from "../funciones";
import Swal from "sweetalert2";
import DataTable from "datatables.net-bs5";
import { lenguaje } from "../lenguaje";
import { error } from "jquery";

const TablaTropa = document.getElementById('TablaTropa');
const inputCatalogo = document.getElementById('catalogo')
const inputNombreCompletoBajas = document.getElementById('nombre_completo')
const inputPlazaBajas = document.getElementById('plaza')
const inputEmpleoBajas = document.getElementById('empleo')

TablaTropa.classList.add('d-none');


const buscar = async () => {
    const url = '/Altas_Bajas/API/bajas/buscarTropa';
    const config = {
        method: 'GET'
    }

    const respuesta = await fetch(url, config);
    const data = await respuesta.json();

    // console.log(data)
    // return;

    datatable.clear().draw();
    if(data && data.length > 0){
        TablaTropa.classList.remove('d-none');
        datatable.rows.add(data).draw();
    }
}

let contador = 1;
const datatable = new DataTable('#TablaTropa', {
    data: null,
    language: lenguaje,
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
            data: 'catalogo'
        },
        {
            title: 'Grado',
            data: 'grado'
        },
        {
            title: 'Nombre Completo',
            data: 'nombre_completo'
        },
        {
            title: 'Plaza',
            data: 'plaza'
        },
        {
            title: 'Empleo',
            data: 'empleo'
        },
        {
            title: 'Ceom',
            data: 'ceom'
        },
        {
            title: 'Baja',
            data: 'per_catalogo',
            searchable: false,
            orderable: false,
            render: (data, type, row, meta) => {
                let html = `
                <button class='btn btn-danger baja' data-plaza=${row.plaza} data-bs-toggle="modal" data-bs-target="#modalBajas"><i class="bi bi-person-fill-dash"></i></button>

                <button class='btn btn-secondary pdf'><i class="bi bi-file-pdf-fill"></i></button>
                `
                return html;
            }
        }        
    ]
});


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
        const url = `/Altas_Bajas/API/bajas/obtenerDatos?plaza=${plaza}`;
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
            inputCatalogo.value = `${datos.catalogo}`;
            inputNombreCompletoBajas.value = `${datos.grado} ${datos.nombre_completo}`;
            inputEmpleoBajas.value = `${datos.empleo}`;
            inputPlazaBajas.value = `${datos.plaza}`;
        } else {
            console.log('Código inválido');

            inputCatalogo.value = '';
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


datatable.on('click', '.baja', ObtenerDatosBajas)

buscar();