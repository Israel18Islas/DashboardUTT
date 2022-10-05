<template>

<head>
    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>


    <nav class="navbar navbar-expand-lg bg-utt">
        <div class="container-md d-flex justify-content-between">
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->
            <div>
                <img src="/images/logo.png" alt="ddd" width="106" >
            </div>
            <div>
                Login
            </div>

        </div>
    </nav>

    <div class="card mx-5 mt-5 border-0">
        <div class="card-body">
            <h5 class="card-title text-utt fw-bolder">Datos del grupo</h5>
            <div class="card-text mt-4">
               <div class="row">
                    <div class="col-sm-5 col-lg-6">
                        <div class="d-lg-flex text-sm-center">
                            <div class="fw-bolder me-3">Carrera:</div>
                            <div>Ingeniería en Tecnologías de la Información</div>
                        </div>
                        <div class="d-lg-flex">
                            <div class="fw-bolder me-3">Especilidad:</div>
                            <div>Desarrollo y Gestión de Software</div>
                        </div>
                    </div>
                    <div class="col-sm-5 col-lg-6">
                        <div class="d-lg-flex ">
                            <div class="fw-bolder me-3">Periodo:</div>
                            <div>Septiembre - Diciembre 2022</div>
                        </div>
                        <div class="d-lg-flex">
                            <div class="fw-bolder me-3">Grupo:</div>
                            <div>9° A</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mx-5 mt-3 border-0">
        <div class="card-body">
            <h5 class="card-title text-utt fw-bolder">Alumnos</h5>
            <Carousel :wrap-around="true" :settings="settings" :breakpoints="breakpoints">
                <Slide class="mb-3" v-for="usuario in usuariosArray" :key="usuario" >
                <div class="carousel__item" >
                    <div class="card border-0 p-2 " id="card-carrusel" style="width: 180px; height: 220px;" @click="onClickData(usuario)">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRFogB3c0aNtnWrl9WPR9VHd4RZXjx5ZAT4Dw&usqp=CAU"  class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-title">{{ usuario.matricula }} </p>
                            <p class="card-text">{{ usuario.nombre }} </p>
                        </div>
                    </div>

                </div>
                </Slide>

                <template #addons>
                    <Navigation  class="bg-utt"/>
                </template>
            </Carousel>
        </div>

    </div>


    <div class="mx-5 mt-4 mb-5">

        <div v-show="activeOption == 'Dashboard'" class="d-lg-flex justify-content-between">

            <div class="card border-0 col-lg-9 mb-2" v-show="activeOption == 'Dashboard'">
                <canvas id="barChar"></canvas>
            </div>

            <div  class=" border-0 col-lg-3 ms-1 mb-2" v-show="activeOption == 'Dashboard'" >

                <div class="card border-0 mb-3" >
                    <canvas id="PieChart"></canvas>
                </div>

                <div class="card border-0" >
                    <canvas id="myChart"></canvas>
                </div>

            </div>

        </div>

        <div class=" card border-0" v-show="activeOption == 'Registro general del alumno'">

            <ul class="nav nav-tabs mt-4">
                <li class="nav-item card-title" v-for="step in steps" :key="step.id" >
                    <a class="nav-link text-secondary" :class="{ 'bg-utt text-white fw-border': step == activeStep}" href="#" @click.prevent="onClickStep(step)">
                        {{ step }}
                    </a>
                </li>
            </ul>

            <div class="d-lg-flex" >

                <div class="avatar col-sm-2 text-center m-auto" style="width:20%;" >
                    <img src="https://static3.depositphotos.com/1004996/215/i/600/depositphotos_2155791-stock-photo-glowing-font-shiny-letter-l.jpg" width="200" height="200">
                    <p class="mt-3">{{ user.matricula }} </p>
                    <p>{{ user.nombre }} </p>
                </div>

                <div class="container-lg mb-3" style="width:80%" v-show="activeStep == 'Datos Personales'">

                    <div class="container d-flex justify-content-between my-4 row">

                        <div class="right col-lg-4 col-sm-2" >

                            <div class="d-grid mb-3">
                                <label for="calleNumero">Fecha de nacimiento:</label>
                                <input type="text" name="calleNumero" id="calleNumero" />
                            </div>

                            <div class="d-grid mb-3">
                                <div>Estado civil: </div>
                                <div class="d-flex justify-content-between">
                                    <div class="checkboxs">
                                        <input type="checkbox" id="casado" value="casado">
                                        <label for="casado">Casado</label>
                                    </div>
                                    <div class="checkboxs">
                                        <input type="checkbox" id="divorciado" value="divorciado">
                                        <label for="divorciado">Divorciado</label>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid mb-3">
                                <label for="calleNumero">Calle y numero:</label>
                                <input type="text" name="calleNumero" id="calleNumero" />
                            </div>

                            <div class="d-grid mb-3">
                                <label for="email">Correo electronico (personal):</label>
                                <input type="text" name="email" id="email" />
                            </div>

                            <div class="d-grid mb-3">
                                <label for="movil">Movil:</label>
                                <input type="text" name="movil" id="movil" />
                            </div>

                        </div>

                        <div class="center col-lg-4 col-sm-2">

                            <div class="d-grid mb-3">
                                <label for="date">Edad:</label>
                                <input type="text" name="date" id="date" />
                            </div>

                            <div class="text-center mb-3">
                                <div>.</div>
                                <div class="checkboxs">
                                    <input type="checkbox" id="mike" value="Mike">
                                    <label for="mike">Soltero</label>
                                </div>
                            </div>
                            <div class="d-grid mb-3" >
                                <label for="colonia">Colonia:</label>
                                <input type="text" name="colonia" id="colonia" />
                            </div>
                            <div class="d-grid mb-3">
                                <label for="institucional">Correo electronico (institucional):</label>
                                <input type="text" name="institucional" id="institucional" />
                            </div>
                        </div>

                        <div class="left col-lg-4 col-sm-2">
                            <div class="d-grid mb-3">
                                <div>Genero: </div>
                                <div class="d-flex justify-content-between">

                                    <div class="checkboxs">
                                        <input type="checkbox" id="Femenino"  value="true">
                                        <label for="Femenino">Femenino</label>
                                    </div>

                                    <div class="checkboxs">
                                        <input type="checkbox" id="masculino"  >
                                        <label for="masculino">Masculino</label>
                                    </div>
                                    <div class="checkboxs">
                                        <input type="checkbox" id="masculino"  >
                                        <label for="masculino">Otro</label>
                                    </div>

                                </div>
                            </div>
                            <div class="d-grid mb-3">
                                <div class="text-center">
                                    <div>.</div>
                                    <div class="checkboxs">
                                        <input type="checkbox" id="UnionLibre"  value="true">
                                        <label for="UnionLibre">Union libre</label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid mb-3">
                                <label for="municipio">Municipio:</label>
                                <input type="text" name="municipio" id="municipio" />
                            </div>
                            <div class="d-grid mb-3">
                                <label for="telefono">Telefono:</label>
                                <input type="text" name="telefono" id="telefono" />
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <button type="button" class="btn bg-utt text-white btn-lg"> Siguiente </button>
                    </div>

                </div>

                <div class="container-lg mb-3" style="width:80%" v-show="activeStep == 'Datos Familiares'">

                    <div class="container d-flex justify-content-between my-4 row">

                        <div class="right col-lg-4 col-sm-2 ">

                            <div class="d-grid mb-3 ">
                                <label for="date">Nombre del padre:</label>
                                <input type="text" name="date" id="date"/>
                            </div>
                            <div class="d-grid mb-3 ">
                                <label for="date">Nombre de la madre:</label>
                                <input type="text" name="date" id="date"/>
                            </div>
                            <div class="d-grid mb-3 ">
                                <label for="date">Nombre del conyuge:</label>
                                <input type="text" name="date" id="date"/>
                            </div>
                            <h5>En caso de emergencia</h5>
                            <div class="d-grid mb-3 ">
                                <label for="date">Nombre:</label>
                                <input type="text" name="date" id="date"/>
                            </div>


                        </div>

                        <div class="center col-lg-4 col-sm-2">

                            <div class="d-grid mb-3 ">
                                <label for="date">Telefono:</label>
                                <input type="text" name="date" id="date"/>
                            </div>
                            <div class="d-grid mb-3 ">
                                <label for="date">Telefono:</label>
                                <input type="text" name="date" id="date"/>
                            </div>
                            <div class="d-grid mb-3 ">
                                <label for="date">Telefono:</label>
                                <input type="text" name="date" id="date"/>
                            </div>
                            <div class="d-grid mb-3 ">
                                <label for="date">Telefono:</label>
                                <input type="text" name="date" id="date"/>
                            </div>
                        </div>

                        <div class="left col-lg-4 col-sm-2">

                            <div class="d-grid mb-3 ">
                                <label for="date">Parentesco:</label>
                                <input type="text" name="date" id="date"/>
                            </div>
                            <div class="d-grid mb-3 ">
                                <label for="date">Parentesco:</label>
                                <input type="text" name="date" id="date"/>
                            </div>
                            <div class="d-grid mb-3 ">
                                <label for="date">Parentesco:</label>
                                <input type="text" name="date" id="date"/>
                            </div>
                            <div class="d-grid row ">
                                <label for="date">Parentesco:</label>
                                <input type="text" name="date" id="date"/>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="container-lg mb-3" style="width:80%" v-show="activeStep == 'Datos Laborales'">

                    <div class="container d-flex justify-content-between my-4 row">

                        <div class="right col-lg-4 col-sm-2">

                            <div class="d-grid mb-3">
                                <div>Trabajas: </div>
                                <div class="checkboxs">
                                    <input type="checkbox" id="trabajas-si" value="trabajas-si" >
                                    <label for="trabajas-si">Si</label>
                                </div>
                            </div>

                            <div class="d-grid mb-3">
                                <div>Razón por la que Trabajas : </div>
                                <div class="checkboxs">
                                    <input type="checkbox" id="apoyo-eco" value="apoyo-eco" >
                                    <label for="apoyo-eco">Apoyar Económicamente a la Familia</label>

                                </div>
                            </div>

                            <p>Empresa</p>

                            <div class="d-grid mb-3">
                                <label for="name">Nombre:</label>
                                <input type="text" name="name" id="name"  />
                            </div>

                            <div class="d-grid mb-3">
                                <label for="telefono">Telefono:</label>
                                <input type="text" name="telefono" id="telefono"  />
                            </div>

                        </div>
                        <div class="center col-lg-4 col-sm-2">

                            <div class="checkboxs">
                                <input type="checkbox" id="mike" value="Mike" >
                                <label for="mike">No</label>
                            </div>

                            <div class="checkboxs">
                                <input type="checkbox" id="familia" value="familia" >
                                <label for="familia">Apoyar Totalmente a la Familia</label>
                            </div>

                            <div class="checkboxs">
                                <input type="checkbox" id="familia" value="familia" >
                                <label for="familia">Apoyar Totalmente a la Familia</label>
                            </div>
                            <div class="d-grid mb-3">
                                <label for="domicilio">Domicilio:</label>
                                <input type="text" name="domicilio" id="domicilio" />
                            </div>
                            <div class="d-grid mb-3">
                                <label for="puesto">Puesto:</label>
                                <input type="text" name="puesto" id="puesto" />
                            </div>

                        </div>
                        <div class="left col-lg-4 col-sm-2">
                            <div class="d-grid mb-3">
                                <div>¿Tu trabajo actual esta relacionado con tu carrera?: </div>
                                <div class="d-flex">
                                    <div class="checkboxs">
                                        <input type="checkbox" id="tabajas-si" value="tabajas-si" >
                                        <label for="tabajas-si">Si</label>
                                    </div>
                                    <div class="checkboxs">
                                        <input type="checkbox" id="trabajo-no" value="trabajo-no" >
                                        <label for="trabajo-no">No</label>
                                    </div>

                                </div>
                            </div>
                            <div class="mt-4 checkboxs">
                                <input type="checkbox" id="sostenerme" value="sostenerme" >
                                <label for="sostenerme">Sostenerme Totalmente</label>
                            </div>
                            <div class="d-grid mb-3">
                                <input type="text" name="total" id="total" />
                            </div>
                            <div class="d-grid mb-3">
                                <label for="departamento">Departamento:</label>
                                <input type="text" name="departamento" id="departamento" />
                            </div>
                        </div>
                    </div>

                </div>

                <div class="container-lg mb-3" style="width:80%" v-show="activeStep == 'Datos Economicos'">

                    <div class="container d-flex justify-content-between  my-4 row">

                        <div class="right col-4 mt-4">

                            <div class="d-grid mb-3">
                                <div>Vive con: </div>
                                <div class="continer checkboxs">
                                    <input type="checkbox" id="padres+" value="padres+" >
                                    <label for="padres+">Ambos Padres</label>
                                </div>
                            </div>

                            <div class="mt-4">
                                <div>Vivienda: </div>
                                <div class="d-flex">
                                    <div class="container">
                                        <div class="container-body p-0 checkboxs">
                                            <input class="p-0" type="checkbox" id="propia" value="propia" >
                                            <label for="propia">Propia</label>
                                        </div>
                                    </div>
                                    <div class="container checkboxs">
                                        <input type="checkbox" id="renta" value="renta" >
                                        <label for="renta">Rentada</label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid mb-3">
                                <div>¿Quien es tu principal apoyo econimico?: </div>
                                <div class="d-flex">
                                    <div class="continer checkboxs">
                                        <input type="checkbox" id="padre" value="padre" >
                                        <label for="padre">Padre</label>
                                    </div>
                                    <div class="continer">
                                        <input type="checkbox" id="madre" value="madre" >
                                        <label for="madre">Madre</label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid mb-3">
                                <div>Ingresos Familiares: </div>
                                <div class="d-flex">
                                    <div class="continer checkboxs">
                                        <input type="checkbox" id="menos" value="menos" >
                                        <label for="menos">Menos de $5,000</label>
                                    </div>
                                    <div class="container">
                                        <input type="checkbox" id="5-10" value="5-10" >
                                        <label for="5-10">$5,000 A $10,000</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="center col-4 mt-4">

                            <div class="d-grid mb-3 d-flex">
                                <div class="container">
                                    <input type="checkbox" id="uno-padre" value="uno-padre" >
                                    <label for="uno-padre">Uno de los Padres</label>
                                </div>
                                <div class="container">
                                    <input type="checkbox" id="pareja" value="pareja" >
                                    <label for="pareja">Pareja</label>
                                </div>
                            </div>

                            <div class="mt-4 d-flex">
                                <div class="container">
                                    <input type="checkbox" id="prestada" value="prestada" >
                                    <label for="prestada">Prestada</label>
                                </div>
                            </div>
                            <div class="d-grid mb-3 d-flex">
                                <div class="continer">
                                    <input type="checkbox" id="huermano" value="huermano" >
                                    <label for="huermano">Hermano(a)</label>
                                </div>
                            </div>
                            <div class="d-grid mb-3 d-flex">
                                <div class="continer">
                                    <input type="checkbox" id="10-15" value="10-15" >
                                    <label for="10-15">$10,000 A $15,000</label>
                                </div>
                            </div>

                        </div>
                        <div class="left col-4 mt-4">
                            <div class="d-grid mb-3 d-flex">
                                <div class="container">
                                    <input type="checkbox" id="solo" value="solo" >
                                    <label for="solo">Solo(a)</label>
                                </div>
                                <div class="container">
                                    <input type="checkbox" id="otro" value="otro" >
                                    <label for="otro">Otro Familiar</label>
                                </div>
                            </div>
                            <div class="d-grid mb-3">
                                <div>Transporte: </div>
                                <div class="d-flex">
                                    <div class="container">
                                        <input type="checkbox" id="propio" value="propio" >
                                        <label for="propio">Propia</label>
                                    </div>
                                    <div class="container">
                                        <input type="checkbox" id="publico" value="publico" >
                                        <label for="publico">Pubico</label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid mb-3 d-flex">
                                <div class="container">
                                    <input type="checkbox" id="conyuge" value="conyuge" >
                                    <label for="conyuge">Cónyuge</label>
                                </div>
                                <div class="container">
                                    <input type="checkbox" id="otro" value="otro" >
                                    <label for="otro">Otro Familiar</label>
                                </div>
                            </div>
                            <div class="d-grid mb-3 d-flex">
                                <div class="container">
                                    <input type="checkbox" id="10-15" value="10-15" >
                                    <label for="10-15">$10,000 A $15,000</label>
                                </div>
                                <div class="container">
                                    <input type="checkbox" id="mas" value="mas" >
                                    <label for="mas">Más de $15,000</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="container-lg mb-3" style="width:80%" v-show="activeStep == 'Datos Escolares'">

                    <div class="container d-flex justify-content-between  my-4 row">

                        <div class="right col-4 mt-4">

                            <div class="d-grid mb-3">
                                <label for="nombreBachillerato">Nombre del bachillerato:</label>
                                <input type="text" name="nombreBachillerato" id="nombreBachillerato" />
                            </div>

                        </div>
                        <div class="center col-4 mt-4">

                            <div class="d-grid mb-3">
                                <label for="tipoBachillerato">Tipo de bachillerato:</label>
                                <input type="text" name="tipoBachillerato" id="tipoBachillerato" />
                            </div>

                        </div>
                        <div class="left col-4 mt-4">

                            <div class="d-grid mb-3">
                                <label for="entidadFederativa">Entidad Federativa:</label>
                                <input type="text" name="entidadFederativa" id="entidadFederativa" />
                            </div>

                        </div>
                    </div>
                    <button>Siguiente</button>

                </div>



                <div class="container-lg mb-3" style="width:75%" v-show="activeStep == 'Promedios'">
                    <p>Promedios    </p>
                </div>
            </div>
        </div>



    </div>


</body>

</template>
<script>
import { ref } from 'vue'
import { Head,Link } from "@inertiajs/inertia-vue3";
import 'vue3-carousel/dist/carousel.css';
import { Carousel, Navigation, Slide } from 'vue3-carousel';
import { Bar } from 'vue-chartjs';
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js';
import Chart from 'chart.js/auto';



ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

export default {
    name: 'App',
    components: {
        Link,
        Head,
        Carousel,
        Slide,
        Navigation,
        Bar
    },
    props: {
    usuariosArray: {
        required: true,
    },
    alumnos:{
        required: true,
    }
  },

  mounted() {

    console.log(this.activeOption);
    console.log('Component mount');
    const ctx = document.getElementById('myChart');

    const data = {
        labels: [
            'Red',
            'Blue',
            'Yellow'
        ],
        datasets: [{
            label: 'My First Dataset',
            data: [200, 50, 100],
            backgroundColor: [
            'rgb(26, 105, 47)',
            'rgb(47, 26, 105)',
            'rgb(86, 26, 105)'
            ],
            hoverOffset: 4
        }],
        user:{
            show:true
        },
        respuesta:{
            show:true
        }
    };

    const myChart = new Chart(ctx, {
        type: 'doughnut',
        data: data,
    });

    myChart;

    const ctx3 = document.getElementById('PieChart');

    const dataPie = {
        labels: [
            'Red',
            'Blue',
            'Yellow'
        ],
        datasets: [{
            label: 'My First Dataset',
            data: [300, 50, 100],
            backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)'
            ],
            hoverOffset: 4
        }]
    };

    const PieChart = new Chart(ctx3, {
        type: 'pie',
        data: dataPie,
    });

    PieChart;

    const ctx2 = document.getElementById('barChar').getContext('2d');

    const barChar = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5],
                backgroundColor: [
                    'rgba(105, 26, 45)',
                    'rgba(166, 41, 71)',
                    'rgba(146, 36, 63)',
                    'rgba(125, 31, 54)',

                ],
                borderColor: [
                    'rgba(105, 26, 45)',
                    'rgba(166, 41, 71)',
                    'rgba(146, 36, 63)',
                    'rgba(125, 31, 54)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    barChar;


  },
  setup(props) {
    const steps = [
        'Datos Personales',
        'Datos Familiares',
        'Datos Laborales',
        'Datos Economicos',
        'Datos Escolares',
        'Promedios',

    ]
    const activeStep = ref(steps[0])

    const onClickStep = (step) => {
        console.log(step)
        activeStep.value = step
    }
    const options = [
        'Dashboard',
        'Registro general del alumno'

    ]
    const activeOption = ref(options[0])

    const onClickOption = (option) => {
        console.log(option)
        onClickOption.value = option
    }
    const myOptions = {
        layout: {
            color: 'black',
            backgroundColor: 'lightgray',
            selectedColor: 'white',
            selectedBackgroundColor: 'green',
            borderColor: 'black',
            fontFamily: 'Arial',
            fontWeight: 'normal',
            fontWeightSelected: 'bold',
            squareCorners: false,
            noBorder: false
        },
        size: {
            fontSize: 14,
            height: 34,
            padding: 7,
            width: 100
        },
        items: {
            delay: .4,
            preSelected: 'unknown',
            disabled: false,
            labels: [
            {name: 'Off', color: 'white', backgroundColor: 'red'},
            {name: 'On', color: 'white', backgroundColor: 'green'}
            ]
        }
    };

    return{
        steps,
        activeStep,
        onClickStep,
        options,
        activeOption,
        onClickOption,
        myOptions
    }

  },

  data() {
    return {
      chartOptions: {
        responsive: true
      },
      settings: {
        itemsToShow: 6,
        snapAlign: 'center',
        },
        // breakpoints are mobile first
        // any settings not specified will fallback to the carousel settings
        breakpoints: {
        // 700px and up
        300: {
            itemsToShow: 1,
            snapAlign: 'center',
        },
        500: {
            itemsToShow: 2,
            snapAlign: 'center',
        },
        // 1024 and up
        1024: {
            itemsToShow: 7,
            snapAlign: 'center',
        },
      },
      user:{
        show:false
      }

    }
  },
  methods: {

    onClickData(data){
        console.log(data)
        // this.user = data
        this.activeOption = 'Registro general del alumno'

        let apiUrl= "http://127.0.0.1:8080/api/alumnos/";
        let requestUrl = apiUrl + data.matricula;

        fetch(requestUrl)
        .then((response) => response.json())
        .then((data) => {
            this.user = data.data
        });

        console.log(this.activeOption)
    }
  },
};
</script>
