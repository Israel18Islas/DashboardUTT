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
            <Carousel :settings="settings" :breakpoints="breakpoints" :wrap-around="true">
                <Slide  v-for="usuario in usuariosArray" :key="usuario" class="mb-3">
                <div class="carousel__item">
                    <div class="card border-0 p-2" style="width: 180px; height: 220px;" @click="onClickData(usuario)">
                        <img src="https://static3.depositphotos.com/1004996/215/i/600/depositphotos_2155791-stock-photo-glowing-font-shiny-letter-l.jpg" height="127" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-title">{{ usuario.username }}</p>
                            <p class="card-text">{{ usuario.name }}</p>
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

        <div v-show="activeOption == 'Dashboard'" class="d-flex justify-content-between">

            <div class="card border-0" style="width:1000px; height:500px;" v-show="activeOption == 'Dashboard'">
                <canvas id="barChar"></canvas>
            </div>

            <div  class=" border-0" v-show="activeOption == 'Dashboard'">
                <div class="card border-0 mb-3 d-flex " style="width:300px; height:200px;">
                    245
                    <i class="fa-solid fa-house"></i>
                </div>
                <div class="card border-0" style="width:300px; height:300px;">
                    <canvas id="myChart"></canvas>
                </div>
                
            </div>

        </div>

        <div class="card border-0" v-show="activeOption == 'Registro general del alumno'">

            <ul class="nav nav-tabs">
                <li class="nav-item card-title" v-for="step in steps" :key="step.id" >
                    <a class="nav-link text-secondary" :class="{ 'bg-utt text-white fw-border': step == activeStep}" href="#" @click.prevent="onClickStep(step)">
                        {{ step }}
                    </a>
                </li>
            </ul>

            <div class="container my-3" v-show="activeStep == 'Datos Personales'">
                <div class="container d-flex row">

                    <div class="avatar m-5 col-sm-2">
                        <img src="https://static3.depositphotos.com/1004996/215/i/600/depositphotos_2155791-stock-photo-glowing-font-shiny-letter-l.jpg" alt="" width="200" height="200">
                    </div>

                    <div class="container d-flex justify-content-between col-sm-9 row ">

                        <div class="right col-4 mt-4">

                            <div class="d-grid row mt-4">
                                <label for="date">Fecha de Nacimiento:</label>
                                <input type="text" name="date" id="date" v-model="user.name"/>
                            </div>

                            <div class="d-grid mt-4">
                                <div>Estado civil: </div>
                                <div class="d-flex">
                                    <input type="checkbox" id="casado" value="casado">
                                    <label for="casado">Casado</label>

                                    <input type="checkbox" id="divorciado" value="divorciado">
                                    <label for="divorciado">Divorciado</label>
                                </div>
                            </div>

                            <div class="d-grid mt-4">
                                <label for="calleNumero">Calle y numero:</label>
                                <input type="text" name="calleNumero" id="calleNumero" />
                            </div>

                            <div class="d-grid mt-4">
                                <label for="email">Correo electronico (personal):</label>
                                <input type="text" name="email" id="email" />
                            </div>

                            <div class="d-grid mt-4">
                                <label for="movil">Movil:</label>
                                <input type="text" name="movil" id="movil" />
                            </div>

                        </div>
                        <div class="center col-4 mt-4">

                            <div class="d-grid mt-4">
                                <label for="date">Edad:</label>
                                <input type="text" name="date" id="date" />
                            </div>

                            <div class="mt-4">
                                <input type="checkbox" id="mike" value="Mike">
                                <label for="mike">Soltero</label>
                            </div>
                            <div class="d-grid mt-4">
                                <label for="colonia">Colonia:</label>
                                <input type="text" name="colonia" id="colonia" />
                            </div>
                            <div class="d-grid mt-4">
                                <label for="institucional">Correo electronico (institucional):</label>
                                <input type="text" name="institucional" id="institucional" />
                            </div>
                        </div>
                        <div class="left col-4 mt-4">
                            <div class="d-grid mt-4">
                                <div>Genero: </div>
                                <div class="d-flex">
                                    <div class="container d-flex">
                                        <input type="checkbox" id="Femenino"  value="true" >
                                        <label for="Femenino">Femenino</label>
                                    </div>

                                    <div class="container d-flex">
                                        <input type="checkbox" id="masculino"  >
                                        <label for="masculino">Masculino</label>
                                    </div>
                                    <div class="container d-flex">
                                        <input type="checkbox" id="mike" >
                                        <label for="mike">Otro/No </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <input type="checkbox" id="mike" value="Mike" >
                                <label for="mike">Union libre</label>
                            </div>
                            <div class="d-grid mt-4">
                                <label for="municipio">Municipio:</label>
                                <input type="text" name="municipio" id="municipio" />
                            </div>
                            <div class="d-grid mt-4">
                                <label for="telefono">Telefono:</label>
                                <input type="text" name="telefono" id="telefono" />
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="container my-3" v-show="activeStep == 'Datos Familiares'">
                <div class="container d-flex row">

                    <div class="avatar m-5 col-sm-2">
                        <img src="https://static3.depositphotos.com/1004996/215/i/600/depositphotos_2155791-stock-photo-glowing-font-shiny-letter-l.jpg" alt="" width="200" height="200">
                    </div>

                    <div class="container d-flex justify-content-between col-sm-9 row">

                        <div class="right col-3 mt-4">

                            <div class="d-grid row mt-4">
                                <label for="date">Nombre del padre:</label>
                                <input type="text" name="date" id="date"/>
                            </div>
                            <div class="d-grid row mt-4">
                                <label for="date">Nombre de la madre:</label>
                                <input type="text" name="date" id="date"/>
                            </div>
                            <div class="d-grid row mt-4">
                                <label for="date">Nombre del conyuge:</label>
                                <input type="text" name="date" id="date"/>
                            </div>
                            <h5>En caso de emergencia</h5>
                            <div class="d-grid row mt-4">
                                <label for="date">Nombre:</label>
                                <input type="text" name="date" id="date"/>
                            </div>


                        </div>
                        <div class="center col-3 mt-4">

                            <div class="d-grid row mt-4">
                                <label for="date">Telefono:</label>
                                <input type="text" name="date" id="date"/>
                            </div>
                            <div class="d-grid row mt-4">
                                <label for="date">Telefono:</label>
                                <input type="text" name="date" id="date"/>
                            </div>
                            <div class="d-grid row mt-4">
                                <label for="date">Telefono:</label>
                                <input type="text" name="date" id="date"/>
                            </div>
                            <div class="d-grid row mt-4">
                                <label for="date">Telefono:</label>
                                <input type="text" name="date" id="date"/>
                            </div>
                        </div>
                        <div class="left col-3 mt-4">

                            <div class="d-grid row mt-4">
                                <label for="date">Parentesco:</label>
                                <input type="text" name="date" id="date"/>
                            </div>
                            <div class="d-grid row mt-4">
                                <label for="date">Parentesco:</label>
                                <input type="text" name="date" id="date"/>
                            </div>
                            <div class="d-grid row mt-4">
                                <label for="date">Parentesco:</label>
                                <input type="text" name="date" id="date"/>
                            </div>
                            <div class="d-grid row mt-4">
                                <label for="date">Parentesco:</label>
                                <input type="text" name="date" id="date"/>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="container my-3" v-show="activeStep == 'Datos Laborales'">
                <div class="container d-flex row">

                    <div class="avatar m-5 col-sm-2">
                        <img src="https://static3.depositphotos.com/1004996/215/i/600/depositphotos_2155791-stock-photo-glowing-font-shiny-letter-l.jpg" alt="" width="200" height="200">
                    </div>

                    <div class="container d-flex justify-content-between col-sm-9 row ">

                        <div class="right col-4 mt-4">

                            <div class="d-grid mt-4">
                                <div>Trabajas: </div>
                                <div class="continer d-flex">
                                    <input type="checkbox" id="trabajas-si" value="trabajas-si" >
                                    <label for="trabajas-si">Si</label>

                                </div>
                            </div>

                            <div class="d-grid mt-4">
                                <div>Razón por la que Trabajas : </div>
                                <div class="d-flex">
                                    <input type="checkbox" id="apoyo-eco" value="apoyo-eco" >
                                    <label for="apoyo-eco">Apoyar Económicamente a la Familia</label>

                                </div>
                            </div>

                            <p>Empresa</p>

                            <div class="d-grid mt-4">
                                <label for="name">Nombre:</label>
                                <input type="text" name="name" id="name"  />
                            </div>

                            <div class="d-grid mt-4">
                                <label for="telefono">Telefono:</label>
                                <input type="text" name="telefono" id="telefono"  />
                            </div>

                        </div>
                        <div class="center col-4 mt-4">

                            <div class="d-grid mt-4 container">
                                <input type="checkbox" id="mike" value="Mike" >
                                <label for="mike">No</label>
                            </div>

                            <div class="mt-4">
                                <input type="checkbox" id="familia" value="familia" >
                                <label for="familia">Apoyar Totalmente a la Familia</label>

                                <input type="checkbox" id="familia" value="familia" >
                                <label for="familia">Apoyar Totalmente a la Familia</label>

                            </div>
                            <div class="d-grid mt-4">
                                <label for="domicilio">Domicilio:</label>
                                <input type="text" name="domicilio" id="domicilio" />
                            </div>
                            <div class="d-grid mt-4">
                                <label for="puesto">Puesto:</label>
                                <input type="text" name="puesto" id="puesto" />
                            </div>

                        </div>
                        <div class="left col-4 mt-4">
                            <div class="d-grid mt-4">
                                <div>¿Tu trabajo actual esta relacionado con tu carrera?: </div>
                                <div class="d-flex">

                                    <input type="checkbox" id="tabajas-si" value="tabajas-si" >
                                    <label for="tabajas-si">Si</label>

                                    <input type="checkbox" id="trabajo-no" value="trabajo-no" >
                                    <label for="trabajo-no">No</label>

                                </div>
                            </div>
                            <div class="mt-4">
                                <input type="checkbox" id="sostenerme" value="sostenerme" >
                                <label for="sostenerme">Sostenerme Totalmente</label>
                            </div>
                            <div class="d-grid mt-4">
                                <input type="text" name="total" id="total" />
                            </div>
                            <div class="d-grid mt-4">
                                <label for="departamento">Departamento:</label>
                                <input type="text" name="departamento" id="departamento" />
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="container my-3" v-show="activeStep == 'Datos Economicos'">
                <div class="container d-flex row">

                    <div class="avatar m-5 col-sm-2">
                        <img src="https://static3.depositphotos.com/1004996/215/i/600/depositphotos_2155791-stock-photo-glowing-font-shiny-letter-l.jpg" alt="" width="200" height="200">
                    </div>

                    <div class="container d-flex justify-content-between col-sm-9 row ">

                        <div class="right col-4 mt-4">

                            <div class="d-grid mt-4">
                                <div>Vive con: </div>
                                <div class="continer">
                                    <input type="checkbox" id="padres+" value="padres+" >
                                    <label for="padres+">Ambos Padres</label>
                                </div>
                            </div>

                            <div class="mt-4">
                                <div>Vivienda: </div>
                                <div class="d-flex">
                                    <div class="container">
                                        <div class="container-body p-0">
                                            <input class="p-0" type="checkbox" id="propia" value="propia" >
                                            <label for="propia">Propia</label>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <input type="checkbox" id="renta" value="renta" >
                                        <label for="renta">Rentada</label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid mt-4">
                                <div>¿Quien es tu principal apoyo econimico?: </div>
                                <div class="d-flex">
                                    <div class="continer">
                                        <input type="checkbox" id="padre" value="padre" >
                                        <label for="padre">Padre</label>
                                    </div>
                                    <div class="continer">
                                        <input type="checkbox" id="madre" value="madre" >
                                        <label for="madre">Madre</label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid mt-4">
                                <div>Ingresos Familiares: </div>
                                <div class="d-flex">
                                    <div class="continer">
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

                            <div class="d-grid mt-4 d-flex">
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
                            <div class="d-grid mt-4 d-flex">
                                <div class="continer">
                                    <input type="checkbox" id="huermano" value="huermano" >
                                    <label for="huermano">Hermano(a)</label>
                                </div>
                            </div>
                            <div class="d-grid mt-4 d-flex">
                                <div class="continer">
                                    <input type="checkbox" id="10-15" value="10-15" >
                                    <label for="10-15">$10,000 A $15,000</label>
                                </div>
                            </div>

                        </div>
                        <div class="left col-4 mt-4">
                            <div class="d-grid mt-4 d-flex">
                                <div class="container">
                                    <input type="checkbox" id="solo" value="solo" >
                                    <label for="solo">Solo(a)</label>
                                </div>
                                <div class="container">
                                    <input type="checkbox" id="otro" value="otro" >
                                    <label for="otro">Otro Familiar</label>
                                </div>
                            </div>
                            <div class="d-grid mt-4">
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
                            <div class="d-grid mt-4 d-flex">
                                <div class="container">
                                    <input type="checkbox" id="conyuge" value="conyuge" >
                                    <label for="conyuge">Cónyuge</label>
                                </div>
                                <div class="container">
                                    <input type="checkbox" id="otro" value="otro" >
                                    <label for="otro">Otro Familiar</label>
                                </div>
                            </div>
                            <div class="d-grid mt-4 d-flex">
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
            </div>
            <div v-show="activeStep == 'Datos Escolares'">
                <p>Escolares</p>
            </div>
            <div v-show="activeStep == 'Promedios'">
                <p>Promedios    </p>
            </div>
        </div>

    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
    chartId: {
      type: String,
      default: 'bar-chart'
    },
    datasetIdKey: {
      type: String,
      default: 'label'
    },
    width: {
      type: Number,
      default: 50
    },
    height: {
      type: Number,
      default: 50
    },
    cssClasses: {
      default: '',
      type: String
    },
    styles: {
      type: Object,
      default: () => {}
    },
    plugins: {
      type: Object,
      default: () => {}
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
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)'
            ],
            hoverOffset: 4
        }]
    };

    const myChart = new Chart(ctx, {
        type: 'doughnut',
        data: data,
    });

    myChart;

    const ctx2 = document.getElementById('barChar').getContext('2d');

    const barChar = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
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

    return{
        steps,
        activeStep,
        onClickStep,
        options,
        activeOption,
        onClickOption
    }

  },

  data() {
    return {
      chartData: {
        labels: [ 'January', 'February', 'March' ],
        datasets: [ { 
            data: [40, 20, 12], 
            backgroundColor: '#691A2D',
            width: {
                type: Number,
                default: 400
            },
            height: {
                type: Number,
                default: 400
            },
        } ]
      },
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
        // 1024 and up
        1024: {
            itemsToShow: 6,
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
        this.user = data
        this.activeOption = 'Registro general del alumno'
        console.log(this.activeOption)
    }
  },
};
</script>
