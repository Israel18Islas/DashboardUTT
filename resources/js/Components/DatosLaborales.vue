<template>
    <div class="container d-flex justify-content-between my-4 row">

        <div class="right col-lg-4 col-sm-2">

            <div class="d-grid mb-3">
                <div>Trabajas: </div>

                <input type="radio" class="btn-check"  checked name="options-trabajas" id="Trabajas-si" autocomplete="off">
                <label class="btn btn-outline-secondary" for="Trabajas-si">Si</label>

            </div>

            <div class="d-grid mb-3">
                <div>Razón por la que Trabajas : </div>

                <input type="radio" class="btn-check" checked name="options-razon" id="Razon-apoyar" autocomplete="off">
                <label class="btn btn-outline-secondary" for="Razon-apoyar">Apoyar Económicamente a la Familia</label>

            </div>

            <p>Empresa</p>

            <div class="d-grid mb-3">
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name"  v-model="usuario.datosLaborales.empresa.nombre"/>
            </div>

            <div class="d-grid mb-3">
                <label for="telefono">Telefono:</label>
                <input type="text" name="telefono" id="telefono" v-model="usuario.datosLaborales.empresa.telefono" />
            </div>

        </div>
        <div class="center col-lg-4 col-sm-2">

            <div class="d-grid mb-3">
                <div>. </div>

                <input type="radio" class="btn-check" checked name="options-trabajas" id="Trabajas-No" autocomplete="off">
                <label class="btn btn-outline-secondary" for="Trabajas-No">No</label>

            </div>

            <div>
                <div>.</div>
                <input type="radio" class="btn-check" name="options-razon" id="Razon-solventar" autocomplete="off">
                <label class="btn btn-outline-secondary" for="Razon-solventar">Solventar Algunos Gastos Personales</label>

            </div>

            <div class="d-grid mb-3">
                <label for="domicilio">Domicilio:</label>
                <input type="text" name="domicilio" id="domicilio" v-model="usuario.datosLaborales.empresa.domicilio"/>
            </div>
            <div class="d-grid mb-3">
                <label for="puesto">Puesto:</label>
                <input type="text" name="puesto" id="puesto" v-model="usuario.datosLaborales.empresa.puesto"/>
            </div>

        </div>
        <div class="left col-lg-4 col-sm-2">
            
            <div class="d-grid mb-3">

                <div>¿Tu trabajo actual esta relacionado con tu carrera?: </div>
                <ContentInput class="d-flex justify-content-between">
                    <input type="radio" class="btn-check" style="width:10rem!important;" checked name="options-relacionado" id="relacionado-Si" autocomplete="off">
                    <label class="btn btn-outline-secondary" checked for="relacionado-si">Si</label>

                    <input type="radio" class="btn-check" style="width:10rem!important;" name="options-relacionado" id="relacionado-No" autocomplete="off">
                    <label class="btn btn-outline-secondary" for="relacionado-no">No</label>

                </ContentInput>

            </div>

            <div>
                <div>.</div>
                <input type="radio" class="btn-check" name="options-razon" id="Razon-Sostenerme" autocomplete="off">
                <label class="btn btn-outline-secondary" checked for="Razon-Sostenerme">Sostenerme Totalmente</label>
            </div>
            <div class="d-grid mb-3">
                <label for="departamento">Departamento:</label>
                <input type="text" name="departamento" id="departamento" />
            </div>
        </div>

    </div>

</template>


<script>
import ContentInput from '../Components/ContentInput.vue'


export default {
    name:'DatosPersonales',
    component:{
        ContentInput
    },
    props: {
        usuario: {
            type: String,
        },
    },

    setup() {

    },
    }
</script>
