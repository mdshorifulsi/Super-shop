import Vue from 'vue'
require('./bootstrap');
import VueRouter from 'vue-router'
Vue.use(VueRouter)

// start sweetalert2
import Swal from 'sweetalert2'
window.Swal=Swal;

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
})
window.Toast=Toast;

// end sweetalert2

//with out relode start

window.Reload =new Vue();

//with out relode end

//routes  start
import {routes} from './routes'
//routes end

const router=new VueRouter({

    routes,
    mode:'history'

})



const app = new Vue({
    el: '#app',
    router
});
