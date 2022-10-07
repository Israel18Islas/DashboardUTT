<template>

<div class="container d-flex justify-content-between  my-4 row">

    <div class="right col-4 mt-4">

        <div class="d-grid mb-3">
            <label for="nombreBachillerato">Nombre del bachillerato:</label>
            <input type="text" name="nombreBachillerato" id="nombreBachillerato" v-model="usuario.datosEscolares.nombreBachillerato"/>
        </div>

    </div>

    <div class="center col-4 mt-4">

        <div class="d-grid mb-3">
            <label for="tipoBachillerato">Tipo de bachillerato:</label>
            <input type="text" name="tipoBachillerato" id="tipoBachillerato" v-model="usuario.datosEscolares.tipoBachillerato.descripcion"/>
        </div>

    </div>

    <div class="left col-4 mt-4">

        <div class="d-grid mb-3">
            <label for="entidadFederativa">Entidad Federativa:</label>
            <input type="text" name="entidadFederativa" id="entidadFederativa" v-model="usuario.datosEscolares.entidadFederativa.nombre" />
        </div>

    </div>


</div>

</template>

<script>
    export default {
        props: {
            usuario: {
                type: String,
            },
        },

        setup() {

        },
    }
</script>
