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
            <Carousel :settings="settings"  :breakpoints="breakpoints" :wrap-around="true">
                <Slide  v-for="usuarios in usuariosArray" :key="usuarios">
                <div class="carousel__item">
                    <div class="card" style="width: 12rem;">
                        <img src="https://static3.depositphotos.com/1004996/215/i/600/depositphotos_2155791-stock-photo-glowing-font-shiny-letter-l.jpg" height="80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-title">{{ usuarios.username }}</p>
                            <p class="card-text">{{ usuarios.name }}</p>
                        </div>
                    </div>
                    
                </div>
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

              
        <ul class="nav nav-tabs" v-for="step in steps" :key="step.id">
            <li class="nav-item">
                <a class="nav-link" :class="{ 'bg-primary': step == activeStep}" href="#" @click.prevent="onClickStep(step)">
                    {{ step }}
                </a>
            </li>
        </ul>
        <div class="container my-3" v-show="activeStep == 'Dashboard'">
            <Bar
                :chart-options="chartOptions"
                :chart-data="chartData"
                :chart-id="chartId"
                :dataset-id-key="datasetIdKey"
                :plugins="plugins"
                :css-classes="cssClasses"
                :styles="styles"
                :width="width"
                :height="height"
            />
        </div>
        <div class="container my-3" v-show="activeStep == 'Datos Personales'">
            <form action="">
                <div class="container d-flex row">
                    <div class="avatar m-5 col-sm-2"> 
                        <img src="https://static3.depositphotos.com/1004996/215/i/600/depositphotos_2155791-stock-photo-glowing-font-shiny-letter-l.jpg" alt="" width="200" height="200">
                    </div>
                    <div class="container d-flex justify-content-between col-sm-9 row">

                        <div class="right col-4 mt-4">

                            <div class="d-grid row mt-4">
                                <label for="date">Fecha de Nacimiento:</label>
                                <input type="text" name="date" id="date" v-model="date"/>
                            </div>

                            <div class="d-grid mt-4">
                                <div>Estado civil: {{ checkedNames }}</div>
                                <div class="d-flex">
                                    <input type="checkbox" id="jack" value="Jack" v-model="checkedNames">
                                    <label for="jack">Casado</label>

                                    <input type="checkbox" id="john" value="John" v-model="checkedNames">
                                    <label for="john">Divorciado</label>
                                </div>
                            </div>

                            <div class="d-grid mt-4">
                                <label for="age">Calle y numero:</label>
                                <input type="text" name="age" id="age" v-model="age" />
                            </div>

                            <div class="d-grid mt-4">
                                <label for="age">Correo electronico (personal):</label>
                                <input type="text" name="age" id="age" v-model="age" />
                            </div>

                            <div class="d-grid mt-4">
                                <label for="age">Movil:</label>
                                <input type="text" name="age" id="age" v-model="age" />
                            </div>
                            
                        </div>
                        <div class="center col-4 mt-4">

                            <div class="d-grid mt-4">
                                <label for="date">Edad:</label>
                                <input type="text" name="date" id="date" v-model="date" />
                            </div>

                            <div class="mt-4">
                                <input type="checkbox" id="mike" value="Mike" v-model="checkedNames">
                                <label for="mike">Soltero</label>
                            </div>
                            <div class="d-grid mt-4">
                                <label for="age">Colonia:</label>
                                <input type="text" name="age" id="age" v-model="age" />
                            </div>
                            <div class="d-grid mt-4">
                                <label for="age">Correo electronico (institucional):</label>
                                <input type="text" name="age" id="age" v-model="age" />
                            </div>
                        </div>
                        <div class="left col-4 mt-4">
                            <div class="d-grid mt-4">
                                <div>Genero: {{ checkedNames }}</div>
                                <div class="d-flex">

                                    <input type="checkbox" id="jack" value="Jack" v-model="checkedNames">
                                    <label for="jack">Femenino</label>

                                    <input type="checkbox" id="john" value="John" v-model="checkedNames">
                                    <label for="john">Masculino</label>

                                    <input type="checkbox" id="mike" value="Mike" v-model="checkedNames">
                                    <label for="mike">Otro/No </label>
                                </div>
                            </div>
                            <div class="mt-4">
                                <input type="checkbox" id="mike" value="Mike" v-model="checkedNames">
                                <label for="mike">Union libre</label>
                            </div>
                            <div class="d-grid mt-4">
                                <label for="age">Municipio:</label>
                                <input type="text" name="age" id="age" v-model="age" />
                            </div>
                            <div class="d-grid mt-4">
                                <label for="age">Telefono:</label>
                                <input type="text" name="age" id="age" v-model="age" />
                            </div>
                        </div>
                    </div>
                </div>

            </form>
            

        </div>
        <div v-show="activeStep == 'Datos Familiares'">
            <div class="container d-flex row">
                    <div class="avatar m-5 col-sm-2"> 
                        <img src="https://static3.depositphotos.com/1004996/215/i/600/depositphotos_2155791-stock-photo-glowing-font-shiny-letter-l.jpg" alt="" width="200" height="200">
                    </div>
                    <div class="container d-flex justify-content-between col-sm-9 row">

                        <div class="right col-4 mt-4">

                            <div class="d-grid row mt-4">
                                <label for="date">Fecha de Nacimiento:</label>
                                <input type="text" name="date" id="date" v-model="date"/>
                            </div>

                            <div class="d-grid mt-4">
                                <div>Estado civil: {{ checkedNames }}</div>
                                <div class="d-flex">
                                    <input type="checkbox" id="jack" value="Jack" v-model="checkedNames">
                                    <label for="jack">Casado</label>

                                    <input type="checkbox" id="john" value="John" v-model="checkedNames">
                                    <label for="john">Divorciado</label>
                                </div>
                            </div>

                            <div class="d-grid mt-4">
                                <label for="age">Calle y numero:</label>
                                <input type="text" name="age" id="age" v-model="age" />
                            </div>

                            <div class="d-grid mt-4">
                                <label for="age">Correo electronico (personal):</label>
                                <input type="text" name="age" id="age" v-model="age" />
                            </div>

                            <div class="d-grid mt-4">
                                <label for="age">Movil:</label>
                                <input type="text" name="age" id="age" v-model="age" />
                            </div>
                            
                        </div>
                        <div class="center col-4 mt-4">

                            <div class="d-grid mt-4">
                                <label for="date">Edad:</label>
                                <input type="text" name="date" id="date" v-model="date" />
                            </div>

                            <div class="mt-4">
                                <input type="checkbox" id="mike" value="Mike" v-model="checkedNames">
                                <label for="mike">Soltero</label>
                            </div>
                            <div class="d-grid mt-4">
                                <label for="age">Colonia:</label>
                                <input type="text" name="age" id="age" v-model="age" />
                            </div>
                            <div class="d-grid mt-4">
                                <label for="age">Correo electronico (institucional):</label>
                                <input type="text" name="age" id="age" v-model="age" />
                            </div>
                        </div>
                        <div class="left col-4 mt-4">
                            <div class="d-grid mt-4">
                                <div>Genero: {{ checkedNames }}</div>
                                <div class="d-flex">

                                    <input type="checkbox" id="jack" value="Jack" v-model="checkedNames">
                                    <label for="jack">Femenino</label>

                                    <input type="checkbox" id="john" value="John" v-model="checkedNames">
                                    <label for="john">Masculino</label>

                                    <input type="checkbox" id="mike" value="Mike" v-model="checkedNames">
                                    <label for="mike">Otro/No </label>
                                </div>
                            </div>
                            <div class="mt-4">
                                <input type="checkbox" id="mike" value="Mike" v-model="checkedNames">
                                <label for="mike">Union libre</label>
                            </div>
                            <div class="d-grid mt-4">
                                <label for="age">Municipio:</label>
                                <input type="text" name="age" id="age" v-model="age" />
                            </div>
                            <div class="d-grid mt-4">
                                <label for="age">Telefono:</label>
                                <input type="text" name="age" id="age" v-model="age" />
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div v-show="activeStep == 'Datos Laborales'">
            <p>LABORALES</p>

        </div>
        <div v-show="activeStep == 'Datos Economicos'">
            <p>Economicos</p>
        </div>
        <div v-show="activeStep == 'Datos Escolares'">
            <p>Escolares</p>
        </div>
        <div v-show="activeStep == 'Promedios'">
            <p>Promedios    </p>
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
      default: 400
    },
    height: {
      type: Number,
      default: 400
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
  setup(props) {
    const steps = [
            'Dashboard',
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
    return{
        steps,
        activeStep,
        onClickStep
    }
    
  },
  
  data() {
    return {
      chartData: {
        labels: [ 'January', 'February', 'March' ],
        datasets: [ { data: [40, 20, 12], backgroundColor: '#691A2D', } ]
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
      
    }
  },
};
</script>