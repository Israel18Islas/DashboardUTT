<template lang="pug">
Head(title="Dashboard")
main
    nav(class="navbar navbar-inverse")
        div(class="container-fluid")
            div(class="navbar-header")
                button(type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar")
                    span(class="icon-bar")
                    span(class="icon-bar")
                    span(class="icon-bar")                    
                a(class="navbar-brand" href="#")Logo
            div(class="collapse navbar-collapse" id="myNavbar")
                ul(class="nav navbar-nav")
                    li(class="active")
                        a(href="#")Home
                    li(class="active")
                        a(href="#")About
                    li(class="active")
                        a(href="#")Projects
                ul(class="nav navbar-nav navbar-right")
                    li
                        a(href="#") Login
    
</template>

<script>
import { Head,Link } from "@inertiajs/inertia-vue3";

export default {
    components: {
        Link,
        Head
    },
};
</script>