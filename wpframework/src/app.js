require('bootstrap');
require('./js/app-script.js');

window.Vue = require('vue');

Vue.component('vue-message', require('./components/MessageComponent.vue').default);

if(document.getElementById("vue-code")){
    const app = new Vue({
        el: '#vue-code'
    });
}
