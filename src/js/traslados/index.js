import { Dropdown, Tab, Modal } from "bootstrap";
import { Toast, validarFormulario } from "../funciones";
import Swal from "sweetalert2";
import DataTable from "datatables.net-bs5";
import { lenguaje } from "../lenguaje";

const TablaTropa = document.getElementById('TablaTropa');
const inputCatalogo = document.getElementById('catalogo')
const inputNombreCompleto = document.getElementById('nombre_completo')
const inputPlaza = document.getElementById('plaza')
const inputEmpleo = document.getElementById('empleo')

TablaTropa.classList.add('d-none');


const buscar = async () => {
    const url = '/Altas_Bajas/API/traslados/buscarTropa';
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
            title: 'Traslados',
            data: 'per_catalogo',
            searchable: false,
            orderable: false,
            render: (data, type, row, meta) => {
                let html = `

                <button class='btn btn-success traslados' data-bs-toggle="modal" data-bs-target="#modalTraslados"><i class="bi bi-people-fill"></i></button>

                `
                return html;
            }
        }        
    ]
});

const ObtenerDatosTraslados = async (e) => {
    let catalogo = inputCatalogo.value

    if (catalogo.length < 6) {
        catalogoValido = false
        return;
    }

    Swal.fire({
        title: 'Cargando',
        text: 'Buscando...',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const url = `/Altas_Bajas/API/traslados/obtenerDatos?catalogo=${catalogo}`;
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

            catalogoValido = true

            inputNombreCompleto.value = `${datos.grado} ${datos.nombre_completo}`;
            inputEmpleo.value = `${datos.empleo}`;
            inputPlaza.value = `${datos.plaza}`;

        } else {
            console.log('Código inválido');

            inputNombreCompleto.value = '';
            inputPlaza.value = '';
            inputEmpleo.value = '';

            catalogoValido = false

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


BtnSearch.addEventListener('click', ObtenerDatosTraslados)

buscar();