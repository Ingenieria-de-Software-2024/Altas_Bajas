import { Dropdown, Tab, Modal } from "bootstrap";
import { Toast, validarFormulario } from "../funciones";
import Swal from "sweetalert2";
import DataTable from "datatables.net-bs5";
import { lenguaje } from "../lenguaje";

const TablaTropa = document.getElementById('TablaTropa');

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

buscar();