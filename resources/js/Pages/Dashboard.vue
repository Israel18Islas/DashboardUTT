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
                            <div>{{carrera.Carrera}}</div>
                        </div>
                        <div class="d-lg-flex">
                            <div class="fw-bolder me-3">Especilidad:</div>
                            <div>{{carrera.Especialidad}}</div>
                        </div>
                    </div>
                    <div class="col-sm-5 col-lg-6">
                        <div class="d-lg-flex ">
                            <div class="fw-bolder me-3">Periodo:</div>
                            <div>{{carrera.Periodo}}</div>
                        </div>
                        <div class="d-lg-flex">
                            <div class="fw-bolder me-3">Grupo:</div>
                            <div>{{carrera.Grupo}}</div>
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
                <Slide class="mb-3" v-for="(usuario, index) in usuariosArray" :key="index" >
                <div class="carousel__item" >
                    <div class="card border-0 p-2 " id="card-carrusel" style="width: 180px; height: 220px;" @click="onClickData(usuario)">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRFogB3c0aNtnWrl9WPR9VHd4RZXjx5ZAT4Dw&usqp=CAU"  class="card-img-top" alt="..."> 
                        <!-- <img src="{{usuario.foto}}" class="card-img-top"> -->
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
                <div class="card-header text-center fs-3 fw-bolder">Grafica de edades</div>
                <canvas id="barChar" class="mt-5"></canvas>
            </div>

            <div  class=" border-0 col-lg-3 ms-1 mb-2" v-show="activeOption == 'Dashboard'" >

                <div class="card border-0 mb-3" >
                    <div class="card-header text-center fs-3 fw-bolder">Grafica de genero</div>
                    <canvas id="PieChart"></canvas>
                </div>

                <div class="card border-0" >
                    <div class="card-header text-center fs-3 fw-bolder">Grafica de ingresos</div>
                    <canvas id="myChart"></canvas>
                </div>

            </div>

        </div>


        <div class=" card border-0" v-for="usuario in alumnos" :key="usuario" v-show="activeOption == 'Registro general del alumno'">

            <div v-if="usuario.matricula == user">

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
                        <!-- <img src="{{usuario.foto}}" class="card-img-top"> -->

                        <p>{{ usuario.matricula }} </p>
                        <p>{{ usuario.Nombre }} </p>
                    </div>

                    <div class="container-lg mb-3" style="width:80%" v-show="activeStep == 'Datos Personales'">

                        <DatosPersonales
                        :usuario="usuario">
                        </DatosPersonales>

                        <div class="container d-lg-flex justify-content-lg-end">
                            <button type="button" class="btn bg-utt text-white btn-lg" @click="onClickStep('Datos Familiares')"> Siguiente </button>
                        </div>

                    </div>

                    <div class="container-lg mb-3" style="width:80%" v-show="activeStep == 'Datos Familiares'">

                        <DatosFamiliares
                        :usuario="usuario">
                        </DatosFamiliares>

                        <div class="container d-lg-flex justify-content-lg-end">
                            <button type="button" class="btn bg-utt text-white btn-lg" @click="onClickStep('Datos Laborales')"> Siguiente </button>
                        </div>

                    </div>

                     <div class="container-lg mb-3" style="width:80%" v-show="activeStep == 'Datos Laborales'">

                        <DatosLaborales
                        :usuario="usuario">
                        </DatosLaborales>

                        <div class="container d-lg-flex justify-content-lg-end">
                            <button type="button" class="btn bg-utt text-white btn-lg" @click="onClickStep('Datos Escolares')"> Siguiente </button>
                        </div>

                    </div> 

                    <!-- <div class="container-lg mb-3" style="width:80%" v-show="activeStep == 'Datos Economicos'">

                        <DatosEconomicos
                        :usuario="usuario">
                        </DatosEconomicos>

                        <div class="container d-lg-flex justify-content-lg-end">
                            <button type="button" class="btn bg-utt text-white btn-lg" @click="onClickStep('Datos Escolares')"> Siguiente </button>
                        </div>

                    </div> -->

                    <div class="container-lg mb-3" style="width:80%" v-show="activeStep == 'Datos Escolares'">

                        <DatosEscolares
                        :usuario="usuario">
                        </DatosEscolares>

                        <div class="container d-lg-flex justify-content-lg-end">
                            <button type="button" class="btn bg-utt text-white btn-lg" @click="onClickStep('Promedios')"> Siguiente </button>
                        </div>

                    </div>

                    <div class="container-lg mb-3" style="width:75%" v-show="activeStep == 'Promedios'">

                        <Promedios
                        :usuario="usuario">
                        </Promedios>

                        <div class="container d-lg-flex justify-content-lg-end">
                            <button type="button" class="btn bg-utt text-white btn-lg"> Guardar </button>
                        </div>

                    </div>

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
import DatosPersonales from '../Components/DatosPersonales.vue'
import DatosFamiliares from '../Components/DatosFamiliares.vue'
import DatosEscolares from '../Components/DatosEscolares.vue'
import DatosEconomicos from '../Components/DatosEconomicos.vue'
import DatosLaborales from '../Components/DatosLaborales.vue'
import Promedios from '../Components/Promedios.vue'



ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

export default {
    name: 'App',
    components: {
        Link,
        Head,
        Carousel,
        Slide,
        Navigation,
        Bar,
        DatosPersonales,
        DatosFamiliares,
        DatosEscolares,
        DatosLaborales,
        DatosEconomicos ,
        Promedios,
    },

    props: {
    usuariosArray: {
        required: true,
    },
    alumnos:{
        required: true,
    },
    contadorEdades:{
       show:false
    },
    carrera:{
      show:false
    },
    edades: {
    required: true,
    },
    cantidades: {
        required: true,
    },
  },

  mounted() {

    console.log(this.activeOption);
    console.log('Component mount');
    const ctx = document.getElementById('myChart');

    const data = {
        labels: [
            '10,000 - 15,000',
            'Mas - 15,000',
            'Menos- 15,000'
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
            'Femmenino',
            'Masculino',
            'Otro'
        ],
        datasets: [{
            label: 'My First Dataset',
            data: [3, 15, 1],
            backgroundColor: [
            'rgb(255, 99, 132)',
            'rgba(105, 26, 45)',
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
            labels: this.edades,
            datasets: [{
                label: '# of Votes',
                data: this.cantidades,
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
        // 'Datos Economicos',
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

    onClickData(usuario, index){
        console.log(usuario , index)
        this.user = usuario.matricula
        this.activeOption = 'Registro general del alumno'
    }

    //     let apiUrl= "http://127.0.0.1:8080/api/alumnos/";
    //     let requestUrl = apiUrl + data.matricula;

    //     fetch(requestUrl)
    //     .then((response) => response.json())
    //     .then((data) => {
    //         this.user = data.data
    //     });

    //     console.log(this.activeOption)
    // }
  },
};
</script>
