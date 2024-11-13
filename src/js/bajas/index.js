import { Dropdown, Tab, Modal } from "bootstrap";
import { Toast, validarFormulario } from "../funciones";
import Swal from "sweetalert2";
import DataTable from "datatables.net-bs5";
import { lenguaje } from "../lenguaje";

const TablaTropa = document.getElementById('TablaTropa');

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
                <button class='btn btn-danger Baja' data-bs-toggle="modal" data-bs-target="#modalBajas"><i class="bi bi-person-fill-dash"></i></button>

                <button class='btn btn-secondary pdf'><i class="bi bi-file-pdf-fill"></i></button>
                `
                return html;
            }
        }        
    ]
});

buscar();