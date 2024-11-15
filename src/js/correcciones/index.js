import { Dropdown, Tab, Modal } from "bootstrap";
import { Toast, validarFormulario } from "../funciones";
import Swal from "sweetalert2";
import DataTable from "datatables.net-bs5";
import { lenguaje } from "../lenguaje";

const TablaTropa = document.getElementById('TablaTropa');
const selectDepartamento = document.getElementById('per_departamento');
const selectDepartamento2 = document.getElementById('per_departamento2');
const selectDepartamento3 = document.getElementById('per_departamento3');
const selectDepartamento4 = document.getElementById('per_departamento4');
const selectMunicipio = document.getElementById('per_ext_ced_lugar');
const selectMunicipio2 = document.getElementById('per_dir_lugar');
const selectMunicipio3 = document.getElementById('ben_nac_lugar');
const selectMunicipio4 = document.getElementById('per_nac_lugar');

TablaTropa.classList.add('d-none');


const buscar = async () => {
    const url = '/Altas_Bajas/API/correcciones/buscarTropa';
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
            title: 'Correcciones',
            data: 'per_catalogo',
            searchable: false,
            orderable: false,
            render: (data, type, row, meta) => {
                let html = `
                <button class='btn btn-primary correcciones' data-bs-toggle="modal" data-bs-target="#modalCorrecciones"><i class="bi bi-person-fill-exclamation"></i></button>

                `
                return html;
            }
        }        
    ]
});

const buscarMunicipio = async () => {
    const departamento = selectDepartamento.value.trim();

    try {
        const url = `/Altas_Bajas/API/correcciones/buscarMunicipio?municipio=${departamento}`;
        const config = {
            method: 'GET'
        };

        const respuesta = await fetch(url, config);
        const data = await respuesta.json();

        selectMunicipio.innerHTML = '';

        const defaultOption = document.createElement('option');
        defaultOption.value = '';
        defaultOption.textContent = 'Seleccione...';
        selectMunicipio.appendChild(defaultOption);

        if (data) {
            data.slice(1).forEach(municipio => {
                const option = document.createElement('option');
                option.value = municipio.dm_codigo;
                option.textContent = municipio.dm_desc_lg.trim();
                selectMunicipio.appendChild(option);
            });
            
        }
    } catch (error) {
        console.log(error);
    }
};

const buscarMunicipio2 = async () => {
    const departamento2 = selectDepartamento2.value.trim();

    try {
        const url = `/Altas_Bajas/API/correcciones/buscarMunicipio2?municipio=${departamento2}`;
        const config = {
            method: 'GET'
        };

        const respuesta = await fetch(url, config);
        const data = await respuesta.json();

        selectMunicipio2.innerHTML = '';

        const defaultOption = document.createElement('option');
        defaultOption.value = '';
        defaultOption.textContent = 'Seleccione...';
        selectMunicipio2.appendChild(defaultOption);

        if (data) {
            data.slice(1).forEach(municipio2 => {
                const option = document.createElement('option');
                option.value = municipio2.dm_codigo;
                option.textContent = municipio2.dm_desc_lg.trim();
                selectMunicipio2.appendChild(option);
            });
            
        }
    } catch (error) {
        console.log(error);
    }
};

const buscarMunicipio3 = async () => {
    const departamento3 = selectDepartamento3.value.trim();

    try {
        const url = `/Altas_Bajas/API/correcciones/buscarMunicipio3?municipio=${departamento3}`;
        const config = {
            method: 'GET'
        };

        const respuesta = await fetch(url, config);
        const data = await respuesta.json();

        selectMunicipio3.innerHTML = '';

        const defaultOption = document.createElement('option');
        defaultOption.value = '';
        defaultOption.textContent = 'Seleccione...';
        selectMunicipio3.appendChild(defaultOption);

        if (data) {
            data.slice(1).forEach(municipio3 => {
                const option = document.createElement('option');
                option.value = municipio3.dm_codigo;
                option.textContent = municipio3.dm_desc_lg.trim();
                selectMunicipio3.appendChild(option);
            });
            
        }
    } catch (error) {
        console.log(error);
    }
};

const buscarMunicipio4 = async () => {
    const departamento4 = selectDepartamento4.value.trim();

    try {
        const url = `/Altas_Bajas/API/altas/buscarMunicipio4?municipio=${departamento4}`;
        const config = {
            method: 'GET'
        };

        const respuesta = await fetch(url, config);
        const data = await respuesta.json();

        selectMunicipio4.innerHTML = '';

        const defaultOption = document.createElement('option');
        defaultOption.value = '';
        defaultOption.textContent = 'Seleccione...';
        selectMunicipio4.appendChild(defaultOption);

        if (data) {
            data.slice(1).forEach(municipio4 => {
                const option = document.createElement('option');
                option.value = municipio4.dm_codigo;
                option.textContent = municipio4.dm_desc_lg.trim();
                selectMunicipio4.appendChild(option);
            });
            
        }
    } catch (error) {
        console.log(error);
    }
};

selectDepartamento.addEventListener ('change' , buscarMunicipio4);
selectDepartamento.addEventListener ('change' , buscarMunicipio3);
selectDepartamento.addEventListener ('change' , buscarMunicipio2);
selectDepartamento.addEventListener ('change' , buscarMunicipio);
buscar();