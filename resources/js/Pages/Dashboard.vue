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
                        <p class="mt-3">{{ user.matricula }} </p>
                        <p>{{ user.nombre }} </p>
                    </div>



                    <div class="container-lg mb-3" style="width:80%" v-show="activeStep == 'Datos Personales'">

                        <div class="container d-flex justify-content-between my-4 row">

                            <div class="right col-lg-4 col-sm-2" >

                                <div class="d-grid mb-3">
                                    <label for="FechaNacimiento">Fecha de nacimiento:</label>
                                    <input type="text" name="FechaNacimiento" id="FechaNacimiento" v-model="usuario.datosPersonales.FechaNacimiento" />
                                </div>

                                <div class="d-grid mb-3">
                                    <div>Estado civil: </div>
                                    <div class="d-flex justify-content-between">
                                        <input type="radio" class="btn-check btn-ms" name="options-civil" id="Casado-outlined" autocomplete="off">
                                        <label class="btn btn-outline-secondary"  for="Casado-outlined">Casado</label>

                                        <input type="radio" class="btn-check btn-ms" name="options-civil" id="Divorciado-outlined" autocomplete="off">
                                        <label class="btn btn-outline-secondary" for="Divorciado-outlined">Divorciado</label>

                                    </div>
                                </div>

                                <div class="d-grid mb-3">
                                    <label for="calleNumero">Calle y numero:</label>
                                    <input type="text" name="calleNumero" id="calleNumero" v-model="usuario.datosPersonales.domicilio.calle"/>
                                </div>

                                <div class="d-grid mb-3">
                                    <label for="email">Correo electronico (personal):</label>
                                    <input type="text" name="email" id="email" v-model="usuario.datosPersonales.contacto.correoElectronico.personal" />
                                </div>

                                <div class="d-grid mb-3">
                                    <label for="movil">Movil:</label>
                                    <input type="text" name="movil" id="movil"  v-model="usuario.datosPersonales.contacto.telefono.movil" />
                                </div>

                            </div>

                            <div class="center col-lg-4 col-sm-2">

                                <div class="d-grid mb-3">
                                    <label for="date">Edad:</label>
                                    <input type="text" name="date" id="date" v-model="usuario.datosPersonales.edad" />
                                </div>

                                <div class="text-center mb-3 pt-4">

                                    <input type="radio" class="btn-check btn-ms" name="options-civil" id="Soltero-outlined" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="Soltero-outlined">Soltero</label>

                                </div>
                                <div class="d-grid mb-3" >
                                    <label for="colonia">Colonia:</label>
                                    <input type="text" name="colonia" id="colonia"  v-model="usuario.datosPersonales.domicilio.colonia" />
                                </div>
                                <div class="d-grid mb-3">
                                    <label for="institucional">Correo electronico (institucional):</label>
                                    <input type="text" name="institucional" id="institucional" v-model="usuario.datosPersonales.contacto.correoElectronico.institucional"/>
                                </div>
                            </div>

                            <div class="left col-lg-4 col-sm-2">
                                <div class="d-grid mb-3">
                                    <div>Genero: </div>
                                    <div class="d-flex justify-content-between">

                                        <input type="radio" class="btn-check" checked name="options-genero" id="femenino-outlined" autocomplete="off">
                                        <label class="btn btn-outline-secondary"  for="femenino-outlined">Femenino</label>

                                        <input type="radio" class="btn-check" name="options-genero" id="masculino-outlined" autocomplete="off">
                                        <label class="btn btn-outline-secondary" for="masculino-outlined">Masculino</label>

                                        <input type="radio" class="btn-check" name="options-genero" id="otro-outlined" autocomplete="off">
                                        <label class="btn btn-outline-secondary" for="otro-outlined">Otro</label>

                                    </div>
                                </div>
                                <div class="d-grid mb-3">
                                    <div class="text-center pt-4">
                                        <input type="radio" class="btn-check btn-ms" name="options-civil" id="UnionLibre-outlined" autocomplete="off">
                                        <label class="btn btn-outline-secondary" for="UnionLibre-outlined">Union Libre</label>
                                    </div>
                                </div>
                                <div class="d-grid mb-3">
                                    <label for="municipio">Municipio:</label>
                                    <input type="text" name="municipio" id="municipio" v-model="usuario.datosPersonales.domicilio.municipio.descripcion"/>
                                </div>
                                <div class="d-grid mb-3">
                                    <label for="telefono">Telefono:</label>
                                    <input type="text" name="telefono" id="telefono"  v-model="usuario.datosPersonales.contacto.telefono.casa" />
                                </div>
                            </div>
                        </div>

                        <div class="container d-lg-flex justify-content-lg-end">
                            <button type="button" class="btn bg-utt text-white btn-lg" @click="onClickStep('Datos Familiares')"> Siguiente </button>
                        </div>

                    </div>

                    <div class="container-lg mb-3" style="width:80%" v-show="activeStep == 'Datos Familiares'">

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
                        <div class="container d-lg-flex justify-content-lg-end">
                            <button type="button" class="btn bg-utt text-white btn-lg" @click="onClickStep('Datos Laborales')"> Siguiente </button>
                        </div>
                    </div>

                    <div class="container-lg mb-3" style="width:80%" v-show="activeStep == 'Datos Laborales'">

                        <div class="container d-flex justify-content-between my-4 row">

                            <div class="right col-lg-4 col-sm-2">

                                <div class="d-grid mb-3">
                                    <div>Trabajas: </div>

                                    <input type="radio" class="btn-check"  checked name="options-trabajas" id="Trabajas-si" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="Trabajas-si">Si</label>

                                </div>

                                <div class="d-grid mb-3">
                                    <div>Razón por la que Trabajas : </div>

                                    <input type="radio" class="btn-check" checked name="options-razon" id="Razon-apoyar" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="Razon-apoyar">Apoyar Económicamente a la Familia</label>

                                </div>

                                <p>Empresa</p>

                                <div class="d-grid mb-3">
                                    <label for="name">Nombre:</label>
                                    <input type="text" name="name" id="name"  v-model="usuario.datosLaborales.empresa.nombre"/>
                                </div>

                                <div class="d-grid mb-3">
                                    <label for="telefono">Telefono:</label>
                                    <input type="text" name="telefono" id="telefono" v-model="usuario.datosLaborales.empresa.telefono" />
                                </div>

                            </div>
                            <div class="center col-lg-4 col-sm-2">

                                <div class="d-grid mb-3">
                                    <div>. </div>

                                    <input type="radio" class="btn-check" checked name="options-trabajas" id="Trabajas-No" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="Trabajas-No">No</label>

                                </div>

                                <div>
                                    <div>.</div>
                                    <input type="radio" class="btn-check" name="options-razon" id="Razon-solventar" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="Razon-solventar">Solventar Algunos Gastos Personales</label>

                                </div>

                                <div class="d-grid mb-3">
                                    <label for="domicilio">Domicilio:</label>
                                    <input type="text" name="domicilio" id="domicilio" v-model="usuario.datosLaborales.empresa.domicilio"/>
                                </div>
                                <div class="d-grid mb-3">
                                    <label for="puesto">Puesto:</label>
                                    <input type="text" name="puesto" id="puesto" v-model="usuario.datosLaborales.empresa.puesto"/>
                                </div>

                            </div>
                            <div class="left col-lg-4 col-sm-2">
                                <div class="d-grid mb-3">
                                    <div>¿Tu trabajo actual esta relacionado con tu carrera?: </div>
                                    <div class="d-flex">

                                        <input type="radio" class="btn-check" name="options-relacionado" id="relacionado-Si" autocomplete="off">
                                        <label class="btn btn-outline-secondary" checked for="relacionado-si">Si</label>

                                        <input type="radio" class="btn-check" name="options-relacionado" id="relacionado-No" autocomplete="off">
                                        <label class="btn btn-outline-secondary" for="relacionado-no">No</label>

                                    </div>
                                </div>
                                <div>
                                    <div>.</div>
                                    <input type="radio" class="btn-check" name="options-razon" id="Razon-Sostenerme" autocomplete="off">
                                    <label class="btn btn-outline-secondary" checked for="Razon-Sostenerme">Sostenerme Totalmente</label>
                                </div>
                                <div class="d-grid mb-3">
                                    <label for="departamento">Departamento:</label>
                                    <input type="text" name="departamento" id="departamento" />
                                </div>
                            </div>

                            <div class="container d-lg-flex justify-content-lg-end">
                                <button type="button" class="btn bg-utt text-white btn-lg" @click="onClickStep('Datos Economicos')"> Siguiente </button>
                            </div>
                        </div>

                    </div>
                    <div class="container-lg mb-3" style="width:80%" v-show="activeStep == 'Datos Economicos'">

                        <div class="container d-flex justify-content-between  my-4 row">

                            <div class="right col-4 mt-4">

                                <div class="d-grid mb-3">
                                    <div>Vive con: </div>
                                    <input type="radio" class="btn-check" name="options-vive" id="Ambos-padres" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="Ambos-padres">Ambos Padres</label>

                                </div>

                                <div class="mt-4">
                                    <div>Vivienda: </div>
                                    <div class="d-flex">

                                        <input type="radio" class="btn-check" name="options-vivienda" id="propia-padres" autocomplete="off">
                                        <label class="btn btn-outline-secondary" checked for="rentada-padres">Propia</label>

                                        <input type="radio" class="btn-check" name="options-vivienda" id="rentada-padres" autocomplete="off">
                                        <label class="btn btn-outline-secondary" for="rentada-padres">Rentada</label>

                                    </div>
                                </div>
                                <div class="d-grid mb-3">
                                    <div>¿Quien es tu principal apoyo economico?: </div>
                                    <div class="d-flex">

                                        <input type="radio" class="btn-check" name="options-apoyo" id="apoyo-padres" autocomplete="off">
                                        <label class="btn btn-outline-secondary" for="apoyo-padres">Padre</label>

                                        <input type="radio" class="btn-check" checked name="options-apoyo" id="apoyo-madre" autocomplete="off">
                                        <label class="btn btn-outline-secondary" for="apoyo-madre">Madre</label>

                                    </div>
                                </div>
                                <div class="d-grid mb-3">
                                    <div>Ingresos Familiares: </div>
                                    <div class="d-flex">

                                        <input type="radio" class="btn-check" name="options-Ingresos" id="menos-Ingresos" autocomplete="off">
                                        <label class="btn btn-outline-secondary" for="menos-Ingresos">Menos de $5,000</label>

                                        <input type="radio" class="btn-check" name="options-Ingresos" id="igual-Ingresos" autocomplete="off">
                                        <label class="btn btn-outline-secondary" for="igual-Ingresos">$5,000 A $10,000</label>

                                    </div>
                                </div>

                            </div>
                            <div class="center col-4 mt-4">

                                <div class="d-grid mb-3 d-flex pt-4">

                                    <input type="radio" class="btn-check" name="options-vive" id="uno-padres" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="uno-padres">Uno de los Padres</label>

                                    <input type="radio" class="btn-check" name="options-vive" id="pareja-padres" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="pareja-padres">Pareja</label>
                                </div>

                                <div class="mt-4 d-flex pt-4">

                                    <input type="radio" class="btn-check" name="options-vivienda" id="propia-prestada" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="rentada-prestada">Prestada</label>

                                </div>
                                <div class="d-grid mb-3 d-flex pt-4">
                                    <input type="radio" class="btn-check" name="options-apoyo" id="apoyo-hermano" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="apoyo-hermano">Hermano</label>
                                </div>

                                <div class="d-grid mb-3 d-flex pt-4">
                                    <input type="radio" class="btn-check" name="options-Ingresos" id="menosigual-Ingresos" autocomplete="off">
                                    <label class="btn btn-outline-secondary" checked for="menosigual-Ingresos">$10,000 A $15,000</label>

                                </div>

                            </div>
                            <div class="left col-4 mt-4">
                                <div class="d-grid mb-3 d-flex pt-4">
                                    <input type="radio" class="btn-check" name="options-vive" id="solo-padres" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="solo-padres">Solo</label>

                                    <input type="radio" class="btn-check" name="options-vive" id="otro-padres" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="otro-padres">Otro Familiar</label>

                                </div>
                                <div class="d-grid mb-3">
                                    <div>Transporte: </div>
                                    <div class=" d-grid d-flex">
                                        <input type="radio" class="btn-check" name="options-trasporte" id="trasporte-propio" autocomplete="off">
                                        <label class="btn btn-outline-secondary" for="solo-padres">Propio</label>

                                        <input type="radio" class="btn-check" name="options-trasporte" id="trasporte-publico" autocomplete="off">
                                        <label class="btn btn-outline-secondary" for="trasporte-publico">Publico</label>

                                    </div>
                                </div>
                                <div class="d-grid mb-3 d-flex">

                                    <input type="radio" class="btn-check" name="options-vive" id="conyuge-padres" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="conyuge-padres">Conyuge</label>

                                    <input type="radio" class="btn-check" name="options-vive" id="otro-padres" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="Ambos-padres">Otro familiar</label>

                                </div>
                                <div class="d-grid mb-3 d-flex">

                                    <input type="radio" class="btn-check" name="options-Ingresos" id="10-15" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="10-15">$10,000 A $15,000</label>

                                    <input type="radio" class="btn-check" name="options-Ingresos" id="mas-15" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="mas-15">Más de $15,000</label>

                                </div>
                            </div>
                        </div>
                        <div class="container d-lg-flex justify-content-lg-end">
                            <button type="button" class="btn bg-utt text-white btn-lg" @click="onClickStep('Datos Escolares')"> Siguiente </button>
                        </div>
                    </div>

                    <div class="container-lg mb-3" style="width:80%" v-show="activeStep == 'Datos Escolares'">

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

                        <div class="container d-lg-flex justify-content-lg-end">
                            <button type="button" class="btn bg-utt text-white btn-lg" @click="onClickStep('Promedios')"> Siguiente </button>
                        </div>

                    </div>

                    <div class="container-lg mb-3" style="width:75%" v-show="activeStep == 'Promedios'">
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

                        <div class="container d-lg-flex justify-content-lg-end">
                            <button type="button" class="btn bg-utt text-white btn-lg" > Guardar </button>
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
    },
    contadorEdades:{
       show:false
    },
    carrera:{
      show:false
    },
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
            labels: [],
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
