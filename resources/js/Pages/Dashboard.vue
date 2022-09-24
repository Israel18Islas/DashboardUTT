<template>
<head>
    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg" style="background-color:#691A2D">
        <div class="container-md d-flex justify-content-between">
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->
            <div>
                One of two columns
            </div>
            <div>
                Login
            </div>

        </div>
    </nav>

    <div class="card mx-5 my-5">
        <div class="card-body">
            <h5 class="card-title">Datos del grupo</h5>
            <div class="card-text mt-4">
               <div class="row">
                    <div class="col-sm-5 col-lg-6">
                        <div class="d-lg-flex text-sm-center">
                            <div>Carrera:</div>
                            <div>Ingeniería en Tecnologías de la Información</div>
                        </div>
                        <div class="d-lg-flex">
                            <div>Especilidad:</div>
                            <div>Desarrollo y Gestión de Software</div>
                        </div>
                    </div>
                    <div class="col-sm-5 col-lg-6">
                        <div class="d-lg-flex">
                            <div>Periodo:</div>
                            <div>Septiembre - Diciembre 2022</div>
                        </div>
                        <div class="d-lg-flex">
                            <div>Grupo:</div>
                            <div>9° A</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mx-5">
        <div class="card-body">
            <h5 class="card-title">Alumnos</h5>
            <Carousel :items-to-show="2.5" :wrap-around="true">
                <Slide  v-for="slide in 10" :key="slide">
                <div class="carousel__item bg-primary">{{ slide }}</div>
                </Slide>

                <template #addons>
                <Navigation />
                </template>
            </Carousel>

        </div>
    </div>

    <div class="card mx-5  mt-5">
        <div class="card-body">
           <h5 class="card-title">Registro general del alumno</h5>
        </div>

       <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Active</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>

        </ul>

    </div>
    


</body>

</template>
<script>
import { Head,Link } from "@inertiajs/inertia-vue3";
import 'vue3-carousel/dist/carousel.css';
import { Carousel, Navigation, Slide } from 'vue3-carousel';



export default {
    name: 'App',
    components: {
        Link,
        Head,
        Carousel,
        Slide,
        Navigation,
    },
};
</script>