<template>
<div class="container d-flex justify-content-between  my-4 row">

    <div class="right col-4 mt-4">

        <div class="d-grid mb-3">
            <label for="nombreBachillerato">Promedio de bachillerato:</label>
            <input type="text" name="nombreBachillerato" id="nombreBachillerato" v-model="usuario.promedios.tsu.bachillerato"/>
        </div>

    </div>
    <div class="center col-4 mt-4">

        <div class="d-grid mb-3">
            <label for="tipoBachillerato">Nivel de Ingles:</label>
            <input type="text" name="tipoBachillerato" id="tipoBachillerato" v-model="usuario.promedios.tsu.nivelIngles"/>
        </div>

    </div>
    <div class="left col-4 mt-4">

        <div class="d-grid mb-3">
            <label for="entidadFederativa">Puntos del examen de Ingreso:</label>
            <input type="text" name="entidadFederativa" id="entidadFederativa" v-model="usuario.promedios.tsu.puntosExamenIngreso" />
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
