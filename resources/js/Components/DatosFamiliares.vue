<template>
    <div class="container d-flex justify-content-between my-4 row">

        <div class="right col-lg-4 col-sm-2 ">

            <div class="d-grid mb-3 ">
                <label for="date">Nombre del padre:</label>
                <input type="text" name="date" id="padre_nombre" v-model="usuario.datosFamiliares.padre.nombre" />
            </div>
            <div class="d-grid mb-3 ">
                <label for="date">Nombre de la madre:</label>
                <input type="text" name="date" id="madre_nombre" v-model="usuario.datosFamiliares.madre.nombre"/>
            </div>
            <p>En caso de emergencia</p>
            <div class="d-grid mb-3 ">
                <label for="date">Nombre:</label>
                <input type="text" name="date" id="emergencia_nombre" v-model="usuario.datosFamiliares.emergencia.nombre"/>
            </div>

        </div>

        <div class="center col-lg-4 col-sm-2">

            <div class="d-grid mb-3 ">
                <label for="date">Telefono:</label>
                <input type="text" name="date" id="date" v-model="usuario.datosFamiliares.padre.telefono"/>
            </div>
            <div class="d-grid mb-3 ">
                <label for="date">Telefono:</label>
                <input type="text" name="date" id="date" v-model="usuario.datosFamiliares.madre.telefono"/>
            </div>
            <!-- <div class="d-grid mb-3 ">
                <label for="date">Telefono:</label>
                <input type="text" name="date" id="date" v-model="usuario.datosFamiliares.conyuge.telefono"/>
            </div> -->
            <div class="d-grid mb-3 ">
                <div>.</div>
                <label for="date">Telefono:</label>
                <input type="text" name="date" id="date" v-model="usuario.datosFamiliares.emergencia.telefono"/>
            </div>
        </div>

        <div class="left col-lg-4 col-sm-2">

            <div class="d-grid mb-3 ">
                <label for="date">Ocupación:</label>
                <input type="text" name="date" id="date" v-model="usuario.datosFamiliares.padre.ocupacion"/>
            </div>
            <div class="d-grid mb-3 ">
                <label for="date">Ocupación:</label>
                <input type="text" name="date" id="date" v-model="usuario.datosFamiliares.madre.ocupacion"/>
            </div>
            <!-- <div class="d-grid mb-3 ">
                <label for="date">Ocupación:</label>
                <input type="text" name="date" id="date" v-model="usuario.datosFamiliares.conyuge.ocupacion"/>
            </div> -->
            <div>.</div>
            <div class="d-grid row ">
                <label for="date">Parentesco:</label>
                <input type="text" name="date" id="date" v-model="usuario.datosFamiliares.emergencia.parentezco"/>
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
