
<template>
<div class="container d-flex justify-content-between my-4 row">

    <div class="right col-lg-4 col-sm-2" >

        <div class="d-grid mb-3">
            <label for="FechaNacimiento">Fecha de nacimiento:</label>
            <input type="text" name="FechaNacimiento" id="FechaNacimiento" v-model="usuario.datosPersonales.FechaNacimiento" />
        </div>

        <ContentInput>
        

            <div>Estado civil: </div>
            <div class="d-flex justify-content-between">
                <input type="radio" class="btn-check btn-ms" name="options-civil" id="Casado-outlined" autocomplete="off">
                <label class="btn btn-outline-secondary"  for="Casado-outlined">Casado</label>

                <input type="radio" class="btn-check btn-ms" name="options-civil" id="Divorciado-outlined" autocomplete="off">
                <label class="btn btn-outline-secondary" for="Divorciado-outlined">Divorciado</label>

            </div>
        </ContentInput>

        <div class="d-grid mb-3">
            <label for="calleNumero">Calle y numero:</label>
            <input type="text" name="calleNumero" id="calleNumero" v-model="usuario.datosPersonales.domicilio.calle"/>
        </div>

        <div class="d-grid mb-3">
            <label for="email">Correo electronico (personal):</label>
            <input type="text" name="email" id="email" v-model="usuario.datosPersonales.contacto.correoElectronico.personal" />
        </div>

        <div class="d-grid mb-3">
            <label for="movil">Movil:</label>
            <input type="text" name="movil" id="movil"  v-model="usuario.datosPersonales.contacto.telefono.movil" />
        </div>

    </div>

    <div class="center col-lg-4 col-sm-2">

        <div class="d-grid mb-3">
            <label for="date">Edad:</label>
            <input type="text" name="date" id="date" v-model="usuario.datosPersonales.edad" />
        </div>

        <div class="text-center mb-3 pt-4">

            <input type="radio" class="btn-check btn-ms" checked name="options-civil" id="Soltero-outlined" autocomplete="off">
            <label class="btn btn-outline-secondary" for="Soltero-outlined">Soltero</label>

        </div>
        <div class="d-grid mb-3" >
            <label for="colonia">Colonia:</label>
            <input type="text" name="colonia" id="colonia"  v-model="usuario.datosPersonales.domicilio.colonia" />
        </div>
        <div class="d-grid mb-3">
            <label for="institucional">Correo electronico (institucional):</label>
            <input type="text" name="institucional" id="institucional" v-model="usuario.datosPersonales.contacto.correoElectronico.institucional"/>
        </div>
    </div>

    <div class="left col-lg-4 col-sm-2">
        <div class="d-grid mb-3">
            <div>Genero: </div>
            <div class="d-flex justify-content-between">

                <input type="radio" class="btn-check" checked name="options-genero" id="femenino-outlined" autocomplete="off">
                <label class="btn btn-outline-secondary"  for="femenino-outlined">Femenino</label>

                <input type="radio" class="btn-check" name="options-genero" id="masculino-outlined" autocomplete="off">
                <label class="btn btn-outline-secondary" for="masculino-outlined">Masculino</label>

                <input type="radio" class="btn-check" name="options-genero" id="otro-outlined" autocomplete="off">
                <label class="btn btn-outline-secondary" for="otro-outlined">Otro</label>

            </div>
        </div>
        <div class="d-grid mb-3">
            <div class="text-center pt-4">
                <input type="radio" class="btn-check btn-ms" name="options-civil" id="UnionLibre-outlined" autocomplete="off">
                <label class="btn btn-outline-secondary" for="UnionLibre-outlined">Union Libre</label>
            </div>
        </div>
        <div class="d-grid mb-3">
            <label for="municipio">Municipio:</label>
            <input type="text" name="municipio" id="municipio" v-model="usuario.datosPersonales.domicilio.municipio.descripcion"/>
        </div>
        <div class="d-grid mb-3">
            <label for="telefono">Telefono:</label>
            <input type="text" name="telefono" id="telefono"  v-model="usuario.datosPersonales.contacto.telefono.casa" />
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
