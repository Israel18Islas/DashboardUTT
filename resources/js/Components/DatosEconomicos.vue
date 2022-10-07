<template>
    <div class="container d-flex justify-content-between  my-4 row">

        <div class="right col-4 mt-4">

            <div class="d-grid mb-3">
                <div>Vive con: </div>
                <input type="radio" class="btn-check" style="width:10rem!important;" checked name="options-vive" id="Ambos-padres" autocomplete="off">
                <label class="btn btn-outline-secondary" for="Ambos-padres">Ambos Padres</label>

            </div>

            <div class="mt-4">
                <div>Vivienda: </div>
                <div class="d-flex">

                    <input type="radio" class="btn-check" style="width:10rem !important;" name="options-vivienda" id="propia-padres" autocomplete="off">
                    <label class="btn btn-outline-secondary" checked for="rentada-padres">Propia</label>

                    <input type="radio" class="btn-check" style="width:10rem !important;" name="options-vivienda" id="rentada-padres" autocomplete="off">
                    <label class="btn btn-outline-secondary" for="rentada-padres">Rentada</label>

                </div>
            </div>
            <div class="d-grid mb-3">
                <div>¿Quien es tu principal apoyo economico?: </div>
                <div class="d-flex">

                    <input type="radio" class="btn-check" style="width:10rem !important;" name="options-apoyo" id="apoyo-padres" autocomplete="off">
                    <label class="btn btn-outline-secondary" for="apoyo-padres">Padre</label>

                    <input type="radio" class="btn-check" style="width:10rem !important;" checked name="options-apoyo" id="apoyo-madre" autocomplete="off">
                    <label class="btn btn-outline-secondary" for="apoyo-madre">Madre</label>

                </div>
            </div>
            <div class="d-grid mb-3">
                <div>Ingresos Familiares: </div>
                <div class="d-flex">

                    <input type="radio" class="btn-check" style="width:10rem !important;" name="options-Ingresos" id="menos-Ingresos" autocomplete="off">
                    <label class="btn btn-outline-secondary"  for="menos-Ingresos">Menos de $5,000</label>

                    <input type="radio" class="btn-check" style="width:10rem !important;" name="options-Ingresos" id="igual-Ingresos" autocomplete="off">
                    <label class="btn btn-outline-secondary" for="igual-Ingresos">$5,000 A $10,000</label>

                </div>
            </div>

        </div>
        <div class="center col-4 mt-4">

            <div class="d-grid mb-3 d-flex pt-4">

                <input type="radio" class="btn-check" style="width:10rem !important;" name="options-vive" id="uno-padres" autocomplete="off">
                <label class="btn btn-outline-secondary" for="uno-padres">Uno de los Padres</label>

                <input type="radio" class="btn-check" style="width:10rem!important" name="options-vive" id="pareja-padres" autocomplete="off">
                <label class="btn btn-outline-secondary" for="pareja-padres">Pareja</label>
            </div>

            <div class="mt-4 d-flex pt-4">

                <input type="radio" class="btn-check" style="width:10rem !important;" name="options-vivienda" id="propia-prestada" autocomplete="off">
                <label class="btn btn-outline-secondary" for="rentada-prestada">Prestada</label>

            </div>
            <div class="d-grid mb-3 d-flex pt-4">
                <input type="radio" class="btn-check" style="width:10rem !important;" name="options-apoyo" id="apoyo-hermano" autocomplete="off">
                <label class="btn btn-outline-secondary" for="apoyo-hermano">Hermano</label>
            </div>

            <div class="d-grid mb-3 d-flex pt-4">
                <input type="radio" class="btn-check" style="width:10rem !important;" name="options-Ingresos" id="menosigual-Ingresos" autocomplete="off">
                <label class="btn btn-outline-secondary" checked for="menosigual-Ingresos">$10,000 A $15,000</label>

            </div>

        </div>
        <div class="left col-4 mt-4">
            <div class="d-grid mb-3 d-flex pt-4">
                <input type="radio" class="btn-check" style="width:10rem !important;" name="options-vive" id="solo-padres" autocomplete="off">
                <label class="btn btn-outline-secondary" for="solo-padres">Solo</label>

                <input type="radio" class="btn-check" style="width:10rem !important;" name="options-vive" id="otro-padres" autocomplete="off">
                <label class="btn btn-outline-secondary" for="otro-padres">Otro Familiar</label>

            </div>
            <div class="d-grid mb-3">
                <div>Transporte: </div>
                <div class=" d-grid d-flex">
                    <input type="radio" class="btn-check" style="width:10rem !important;" name="options-trasporte" id="trasporte-propio" autocomplete="off">
                    <label class="btn btn-outline-secondary" for="solo-padres">Propio</label>

                    <input type="radio" class="btn-check" style="width:10rem !important;" name="options-trasporte" id="trasporte-publico" autocomplete="off">
                    <label class="btn btn-outline-secondary" for="trasporte-publico">Publico</label>

                </div>
            </div>
            <div class="d-grid mb-3 d-flex">

                <input type="radio" class="btn-check" style="width:10rem !important;" name="options-vive" id="conyuge-padres" autocomplete="off">
                <label class="btn btn-outline-secondary" for="conyuge-padres">Conyuge</label>

                <input type="radio" class="btn-check" style="width:10rem !important;" name="options-vive" id="otro-padres" autocomplete="off">
                <label class="btn btn-outline-secondary" for="Ambos-padres">Otro familiar</label>

            </div>
            <div class="d-grid mb-3 d-flex">

                <input type="radio" class="btn-check" style="width:10rem !important;" name="options-Ingresos" id="10-15" autocomplete="off">
                <label class="btn btn-outline-secondary" for="10-15">$10,000 A $15,000</label>

                <input type="radio" class="btn-check" style="width:10rem !important;" name="options-Ingresos" id="mas-15" autocomplete="off">
                <label class="btn btn-outline-secondary" for="mas-15">Más de $15,000</label>

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

