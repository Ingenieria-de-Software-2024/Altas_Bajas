import { Dropdown, Tab, Modal } from "bootstrap";
import { Toast, validarFormulario } from "../funciones";
import Swal from "sweetalert2";
import DataTable from "datatables.net-bs5";
import { lenguaje } from "../lenguaje";

const formTraslados = document.getElementById('formTraslados');

const inputCatalogo_1 = document.getElementById('catalogo_1');
const inputNombreCompleto_1 = document.getElementById('nombre_completo_1');
const inputPlaza_1 = document.getElementById('plaza_1');
const inputGrado_1 = document.getElementById('grado_1');
const inputEmpleo_1 = document.getElementById('empleo_1');
const inputCatalogo_2 = document.getElementById('catalogo_2');
const inputNombreCompleto_2 = document.getElementById('nombre_completo_2');
const inputGrado_2 = document.getElementById('grado_2');
const inputPlaza_2 = document.getElementById('plaza_2');
const inputEmpleo_2 = document.getElementById('empleo_2');
const inputBuscarPlaza = document.getElementById('PLazaBuscar');
const BtnSearch1 = document.getElementById('BtnSearch_1');
const BtnSearch2 = document.getElementById('BtnSearch_2');

const BtnTrasladar = document.getElementById('BtnTrasladar');
const BtnTrasladoPlaza = document.getElementById('BtnTrasladoPlaza');
const BtnBuscarPlaza = document.getElementById('BtnBuscarPlaza');
const BtnCancelar = document.getElementById('BtnCancelar')


BtnTrasladoPlaza.parentElement.classList.add('d-none');


formTraslados.classList.add('none');

const ObtenerDatosTraslados_1 = async () => {

    if (VerificarCatalogos()) {
        return
    }

    const catalogo = inputCatalogo_1.value

    if (!/^\d{7}$/.test(catalogo)) {

        Swal.fire({
            icon: 'error',
            title: 'Catálogo inválido',
            text: 'El catálogo ingresado no es de Tropa',
        });

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
        const url = `/Altas_Bajas/API/traslados/ObtenerDatosTraslados_1?catalogo=${catalogo}`;
        const headers = new Headers();
        headers.append('X-Requested-With', 'fetch');
        const config = {
            method: 'GET',
            headers,
        };

        const respuesta = await fetch(url, config);
        const data = await respuesta.json();

        // console.log(data)

        const { mensaje, codigo, datos } = data;

        Swal.close();

        if (codigo === 1) {

            // console.log(datos.situacion_1)

            if (datos.situacion_1 == '11' || datos.situacion_1 == 'T0') {

                inputNombreCompleto_1.value = `${datos.nombre_completo_1}`;
                inputGrado_1.value = `${datos.grado_1}`;
                inputEmpleo_1.value = `${datos.empleo_1}`;
                inputPlaza_1.value = `${datos.plaza_1}`;
                document.getElementById('per_grado_1').value = datos.per_grado_1
            } else {

                Swal.fire({
                    icon: 'warning',
                    title: 'Situación no válida',
                    html: `El catálogo <strong>${datos.catalogo_1}</strong> tiene la situación: <strong>${datos.situacion}</strong> <br> por lo tanto no puede ser trasladado`,
                });

                return;
            }

        } else {
            console.log('Código inválido');

            inputNombreCompleto_1.value = '';
            inputPlaza_1.value = '';
            inputEmpleo_1.value = '';
            inputGrado_1.value = '';

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

const ObtenerDatosTraslados_2 = async () => {

    if (VerificarCatalogos()) {
        return
    }
    const catalogo = inputCatalogo_2.value

    if (!/^\d{7}$/.test(catalogo)) {
        catalogoValido = false;

        Swal.fire({
            icon: 'error',
            title: 'Catálogo inválido',
            text: 'El catálogo ingresado no es de Tropa',
        });

        return;
    }
    BtnTrasladoPlaza.parentElement.classList.add('d-none');
    BtnTrasladar.parentElement.classList.remove('d-none');
    Swal.fire({
        title: 'Cargando',
        text: 'Buscando...',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const url = `/Altas_Bajas/API/traslados/ObtenerDatosTraslados_2?catalogo=${catalogo}`;
        const headers = new Headers();
        headers.append('X-Requested-With', 'fetch');
        const config = {
            method: 'GET',
            headers,
        };

        const respuesta = await fetch(url, config);
        const data = await respuesta.json();

        // console.log(data)

        const { mensaje, codigo, datos } = data;

        Swal.close();

        if (codigo === 1) {

            // console.log(datos.situacion_1)

            if (datos.situacion_2 == '11' || datos.situacion_2 == 'T0') {

                inputNombreCompleto_2.value = `${datos.nombre_completo_2}`;
                inputGrado_2.value = `${datos.grado_2}`;
                inputEmpleo_2.value = `${datos.empleo_2}`;
                inputPlaza_2.value = `${datos.plaza_2}`;
                document.getElementById('per_grado_2').value = datos.per_grado_2

            } else {

                Swal.fire({
                    icon: 'warning',
                    title: 'Situación no válida',
                    html: `El catálogo <strong>${datos.catalogo_1}</strong> tiene la situación: <strong>${datos.situacion}</strong> <br> por lo tanto no puede ser trasladado`,
                });

                return;
            }

        } else {
            console.log('Código inválido');

            inputNombreCompleto_2.value = '';
            inputPlaza_2.value = '';
            inputEmpleo_2.value = '';
            inputGrado_2.value = '';

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

const Traslado = async (e) => {
    e.preventDefault();

    BtnTrasladar.disabled = true

    if (!validarFormulario(formTraslados, ['PLazaBuscar'])) {
        Swal.fire({
            title: "Campos vacíos",
            text: "Debe llenar todos los campos",
            icon: "info"
        });
        BtnTrasladar.disabled = false
        return;
    }

    try {
        const body = new FormData(formTraslados);
        const url = '/Altas_Bajas/API/tropa/traslados';

        const config = {
            method: 'POST',
            body
        };

        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        const { codigo, mensaje } = data;

        if (codigo === 1) {
            Swal.fire({
                title: '¡Éxito!',
                text: mensaje,
                icon: 'success',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                background: '#e0f7fa',
                customClass: {
                    title: 'custom-title-class',
                    text: 'custom-text-class'
                }
            });

        } else {
            Swal.fire({
                title: '¡Error!',
                text: mensaje,
                icon: 'error',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                background: '#e0f7fa',
                customClass: {
                    title: 'custom-title-class',
                    text: 'custom-text-class'
                }
            });
        }
    } catch (error) {
        console.log(error);
    }

    BtnTrasladar.disabled = false
    formTraslados.reset();

}

const VerificarCatalogos = () => {

    if (inputCatalogo_1.value === inputCatalogo_2.value) {

        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No puede ingresar dos catalogos iguales',
            showConfirmButton: true
        });

        formTraslados.reset();
    }
}

const BuscarPlaza = async (e) => {

    if (inputBuscarPlaza.value != '') {

        e.preventDefault();
        BtnBuscarPlaza.disabled = true;

        BtnTrasladoPlaza.parentElement.classList.remove('d-none');
        BtnTrasladar.parentElement.classList.add('d-none');
        inputCatalogo_2.value = '';
        inputNombreCompleto_2.value = '';
        inputGrado_2.value = '';
        inputPlaza_2.value = '';
        inputEmpleo_2.value = '';

        try {
            const plaza = inputBuscarPlaza.value;
            const url = `/Altas_Bajas/API/buscar/plaza?plaza=${plaza}`;
            const config = { method: 'GET' };

            const respuesta = await fetch(url, config);
            const datos = await respuesta.json();
            const { codigo, mensaje, data } = datos;

            if (codigo === 1) {
                if (data && typeof data === 'object' && Object.keys(data).length > 0) {

                    if (data.nombre_completo && data.nombre_completo !== '' && data.nombre_completo !== 'null') {
                        Swal.fire({
                            title: '¡Error!',
                            text: `${data.nombre_completo} está ocupando esta plaza`,
                            icon: 'error',
                            showConfirmButton: true,
                            timerProgressBar: false,
                            background: '#e0f7fa',
                            customClass: {
                                title: 'custom-title-class',
                                text: 'custom-text-class'
                            }
                        });

                        document.getElementById('per_grado_2').value = data.grado_org;
                        inputNombreCompleto_2.value = data.nombre_completo;
                        inputGrado_2.value = data.grado_morg;
                        inputPlaza_2.value = plaza;
                        inputEmpleo_2.value = data.descripcion_plaza;

                        BtnTrasladoPlaza.disabled = true;
                    } else {
                        
                        BtnTrasladoPlaza.disabled = false;
                        document.getElementById('per_grado_2').value = data.grado_org;
                        inputNombreCompleto_2.value = data.nombre_completo;
                        inputGrado_2.value = data.grado_morg;
                        inputPlaza_2.value = plaza;
                        inputEmpleo_2.value = data.descripcion_plaza;

                    }
                } else {
                    BtnTrasladoPlaza.disabled = true;
                    Swal.fire({
                        title: '¡Error!',
                        text: 'No existe esta plaza registrada en la Base de Datos',
                        icon: 'error',
                        showConfirmButton: true,
                        timer: 1500,
                        timerProgressBar: false,
                        background: '#e0f7fa',
                        customClass: {
                            title: 'custom-title-class',
                            text: 'custom-text-class'
                        }
                    });
                }
            } else {
                Swal.fire({
                    title: '¡Error!',
                    text: mensaje,
                    icon: 'error',
                    showConfirmButton: true,
                    timer: 1500,
                    timerProgressBar: false,
                    background: '#e0f7fa',
                    customClass: {
                        title: 'custom-title-class',
                        text: 'custom-text-class'
                    }
                });
            }
        } catch (error) {
            console.log(error);
        }
        BtnBuscarPlaza.disabled = false;
    }
}

const CambiarPlaza = async (e) => {
    e.preventDefault();

    BtnTrasladoPlaza.disabled = true

    if (!validarFormulario(formTraslados, ['catalogo_2', 'nombre_completo_2'])) {
        Swal.fire({
            title: "Campos vacíos",
            text: "Debe llenar todos los campos",
            icon: "info"
        });
        BtnTrasladar.disabled = false
        return;
    }

    try {
        const body = new FormData(formTraslados);
        const url = '/Altas_Bajas/API/tropa/cambiarPuesto';

        const config = {
            method: 'POST',
            body
        };

        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        const { codigo, mensaje } = data;

        if (codigo === 1) {
            Swal.fire({
                title: '¡Éxito!',
                text: mensaje,
                icon: 'success',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                background: '#e0f7fa',
                customClass: {
                    title: 'custom-title-class',
                    text: 'custom-text-class'
                }
            });

        } else {
            Swal.fire({
                title: '¡Error!',
                text: mensaje,
                icon: 'error',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                background: '#e0f7fa',
                customClass: {
                    title: 'custom-title-class',
                    text: 'custom-text-class'
                }
            });
        }
    } catch (error) {
        console.log(error);
    }

    BtnTrasladoPlaza.disabled = true
    Cancelar();

}

const Cancelar = () => {
    formTraslados.reset();
    BtnTrasladoPlaza.parentElement.classList.add('d-none');
    BtnTrasladar.parentElement.classList.remove('d-none');
}


BtnTrasladoPlaza.addEventListener('click', CambiarPlaza)
BtnCancelar.addEventListener('click', Cancelar)
BtnBuscarPlaza.addEventListener('click', BuscarPlaza)
BtnSearch1.addEventListener('click', ObtenerDatosTraslados_1)
BtnSearch2.addEventListener('click', ObtenerDatosTraslados_2)
BtnTrasladar.addEventListener('click', Traslado);
