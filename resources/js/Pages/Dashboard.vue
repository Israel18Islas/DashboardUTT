<template>

<head>
    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- Styles -->
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
            <h5 class="card-title text-utt">Datos del grupo</h5>
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

    <div class="card mx-5 mt-5 border-0">
        <div class="card-body">
            <h5 class="card-title text-utt">Alumnos</h5>
            <Carousel :settings="settings" class=""  :breakpoints="breakpoints" :wrap-around="true">
                <Slide  v-for="usuarios in usuariosArray" :key="usuarios">
                <div class="carousel__item">
                    <div class="card border-0" style="width: 180px; height: 220px;">
                        <img src="https://static3.depositphotos.com/1004996/215/i/600/depositphotos_2155791-stock-photo-glowing-font-shiny-letter-l.jpg" height="127" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-title">{{ usuarios.username }}</p>
                            <p class="card-text">{{ usuarios.name }}</p>
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
    <!-- <div class="card mx-5  mt-3" v-show="activeStep == 'Dashboard'">
        <div class="card-body">
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
    </div> -->

    <div class="card mx-5  mt-5 border-0"  v-show="activeStep != 'Dashboard'">
        <div class="card-body">
           <h5 class="card-title text-utt">Registro general del alumno</h5>
        </div>

              
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

        <div class="container my-3" v-show="activeStep == 'Datos Familiares'">
            <div class="container d-flex row">

                <div class="avatar m-5 col-sm-2"> 
                    <img src="https://static3.depositphotos.com/1004996/215/i/600/depositphotos_2155791-stock-photo-glowing-font-shiny-letter-l.jpg" alt="" width="200" height="200">
                </div>

                <div class="container d-flex justify-content-between col-sm-9 row">

                    <div class="right col-3 mt-4">

                        <div class="d-grid row mt-4">
                            <label for="date">Nombre del padre:</label>
                            <input type="text" name="date" id="date" v-model="date"/>
                        </div>
                        <div class="d-grid row mt-4">
                            <label for="date">Nombre de la madre:</label>
                            <input type="text" name="date" id="date" v-model="date"/>
                        </div>
                        <div class="d-grid row mt-4">
                            <label for="date">Nombre del conyuge:</label>
                            <input type="text" name="date" id="date" v-model="date"/>
                        </div>
                        <h5>En caso de emergencia</h5>
                        <div class="d-grid row mt-4">
                            <label for="date">Nombre:</label>
                            <input type="text" name="date" id="date" v-model="date"/>
                        </div>

                        
                    </div>
                    <div class="center col-3 mt-4">

                        <div class="d-grid row mt-4">
                            <label for="date">Telefono:</label>
                            <input type="text" name="date" id="date" v-model="date"/>
                        </div>
                        <div class="d-grid row mt-4">
                            <label for="date">Telefono:</label>
                            <input type="text" name="date" id="date" v-model="date"/>
                        </div>
                        <div class="d-grid row mt-4">
                            <label for="date">Telefono:</label>
                            <input type="text" name="date" id="date" v-model="date"/>
                        </div>
                        <div class="d-grid row mt-4">
                            <label for="date">Telefono:</label>
                            <input type="text" name="date" id="date" v-model="date"/>
                        </div>
                    </div>
                    <div class="left col-3 mt-4">
                        
                        <div class="d-grid row mt-4">
                            <label for="date">Parentesco:</label>
                            <input type="text" name="date" id="date" v-model="date"/>
                        </div>
                        <div class="d-grid row mt-4">
                            <label for="date">Parentesco:</label>
                            <input type="text" name="date" id="date" v-model="date"/>
                        </div>
                        <div class="d-grid row mt-4">
                            <label for="date">Parentesco:</label>
                            <input type="text" name="date" id="date" v-model="date"/>
                        </div>
                        <div class="d-grid row mt-4">
                            <label for="date">Parentesco:</label>
                            <input type="text" name="date" id="date" v-model="date"/>
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
                            <div>Trabajas: {{ checkedNames }}</div>
                            <div class="d-flex">
                                <input type="checkbox" id="jack" value="Jack" v-model="checkedNames">
                                <label for="jack">Si</label>

                                <input type="checkbox" id="john" value="John" v-model="checkedNames">
                                <label for="john">No</label>
                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <div>Razón por la que Trabajas : {{ checkedNames }}</div>
                            <div class="d-flex">
                                <input type="checkbox" id="jack" value="Jack" v-model="checkedNames">
                                <label for="jack">Apoyar Económicamente a la Familia</label>

                            </div>
                        </div>

                        <p>Empresa</p>

                        <div class="d-grid mt-4">
                            <label for="age">Nombre:</label>
                            <input type="text" name="age" id="age" v-model="age" />
                        </div>

                        <div class="d-grid mt-4">
                            <label for="age">Telefono:</label>
                            <input type="text" name="age" id="age" v-model="age" />
                        </div>
                        
                    </div>
                    <div class="center col-4 mt-4">

                        <div class="d-grid mt-4">
                            <input type="checkbox" id="mike" value="Mike" v-model="checkedNames">
                            <label for="mike">No</label>
                        </div>

                        <div class="mt-4">
                            <input type="checkbox" id="john" value="John" v-model="checkedNames">
                            <label for="john">Apoyar Totalmente a la Familia</label>
                            
                            <input type="checkbox" id="john" value="John" v-model="checkedNames">
                            <label for="john">Apoyar Totalmente a la Familia</label>
                            
                        </div>
                        <div class="d-grid mt-4">
                            <label for="age">Domicilio:</label>
                            <input type="text" name="age" id="age" v-model="age" />
                        </div>
                        <div class="d-grid mt-4">
                            <label for="age">Puesto:</label>
                            <input type="text" name="age" id="age" v-model="age" />
                        </div>
            
                    </div>
                    <div class="left col-4 mt-4">
                        <div class="d-grid mt-4">
                            <div>¿Tu trabajo actual esta relacionado con tu carrera?: {{ checkedNames }}</div>
                            <div class="d-flex">

                                <input type="checkbox" id="jack" value="Jack" v-model="checkedNames">
                                <label for="jack">Si</label>

                                <input type="checkbox" id="john" value="John" v-model="checkedNames">
                                <label for="john">No</label>

                            </div>
                        </div>
                        <div class="mt-4">
                            <input type="checkbox" id="john" value="John" v-model="checkedNames">
                            <label for="john">Sostenerme Totalmente</label>
                        </div>
                        <div class="d-grid mt-4">
                            <input type="text" name="age" id="age" v-model="age" />
                        </div>
                        <div class="d-grid mt-4">
                            <label for="age">Departamento:</label>
                            <input type="text" name="age" id="age" v-model="age" />
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
                            <div>Vive con: {{ checkedNames }}</div>
                            <div class="d-flex">
                                <input type="checkbox" id="jack" value="Jack" v-model="checkedNames">
                                <label for="jack">Ambos Padres</label>

                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <div>Vivienda: {{ checkedNames }}</div>
                            <div class="d-flex">
                                <input type="checkbox" id="jack" value="Jack" v-model="checkedNames">
                                <label for="jack">Propia</label>
                                <input type="checkbox" id="jack" value="Jack" v-model="checkedNames">
                                <label for="jack">Rentada</label>
                            </div>
                        </div>
                        <div class="d-grid mt-4">
                            <div>¿Quien es tu principal apoyo econimico?: {{ checkedNames }}</div>
                            <div class="d-flex">
                                <input type="checkbox" id="jack" value="Jack" v-model="checkedNames">
                                <label for="jack">Padre</label>
                                <input type="checkbox" id="jack" value="Jack" v-model="checkedNames">
                                <label for="jack">Madre</label>
                            </div>
                        </div>
                        <div class="d-grid mt-4">
                            <div>Ingresos Familiares: {{ checkedNames }}</div>
                            <div class="d-flex">
                                <input type="checkbox" id="jack" value="Jack" v-model="checkedNames">
                                <label for="jack">Menos de $5,000</label>
                                <input type="checkbox" id="jack" value="Jack" v-model="checkedNames">
                                <label for="jack">$5,000 A $10,000</label>
                            </div>
                        </div>
                        
                    </div>
                    <div class="center col-4 mt-4">

                        <div class="d-grid mt-4">
                            <input type="checkbox" id="john" value="John" v-model="checkedNames">
                            <label for="john">Uno de los Padres</label>
                            <input type="checkbox" id="john" value="John" v-model="checkedNames">
                            <label for="john">Pareja</label>
                        </div>

                        <div class="mt-4">
                            <input type="checkbox" id="john" value="John" v-model="checkedNames">
                            <label for="john">Prestada</label>
                        </div>
                        <div class="d-grid mt-4">
                            <input type="checkbox" id="john" value="John" v-model="checkedNames">
                            <label for="john">Hermano(a)</label>
                        </div>
                        <div class="d-grid mt-4">
                            <input type="checkbox" id="john" value="John" v-model="checkedNames">
                            <label for="john">$10,000 A $15,000</label>
                        </div>
            
                    </div>
                    <div class="left col-4 mt-4">
                         <div class="d-grid mt-4">
                            <input type="checkbox" id="john" value="John" v-model="checkedNames">
                            <label for="john">Solo(a)</label>
                            <input type="checkbox" id="john" value="John" v-model="checkedNames">
                            <label for="john">Otro Familiar</label>
                        </div>
                        <div class="d-grid mt-4">
                            <div>Transporte: {{ checkedNames }}</div>
                            <div class="d-flex">
                                <input type="checkbox" id="jack" value="Jack" v-model="checkedNames">
                                <label for="jack">Propia</label>
                                <input type="checkbox" id="jack" value="Jack" v-model="checkedNames">
                                <label for="jack">Pubico</label>
                            </div>
                        </div>
                        <div class="d-grid mt-4">
                            <input type="checkbox" id="john" value="John" v-model="checkedNames">
                            <label for="john">Cónyuge</label>
                            <input type="checkbox" id="john" value="John" v-model="checkedNames">
                            <label for="john">Otro Familiar</label>
                        </div>
                        <div class="d-grid mt-4">
                            <input type="checkbox" id="john" value="John" v-model="checkedNames">
                            <label for="john">$10,000 A $15,000</label>
                            <input type="checkbox" id="john" value="John" v-model="checkedNames">
                            <label for="john">Más de $15,000</label>
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
            'Datos Personales',
			'Datos Familiares',
			'Datos Laborales',
            'Datos Economicos',
            'Datos Escolares',
            'Promedios',
            
		]
		const activeStep = ref(steps[1])

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
        itemsToShow: 7,
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
            itemsToShow: 7,
            snapAlign: 'center',
        },
      },
      
    }
  },
};
</script>