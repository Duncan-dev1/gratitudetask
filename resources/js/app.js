import './bootstrap';

import Vue from 'vue';

import axios from 'axios'
window.axios =axios

import { Form } from 'vform';
window.Form = Form;

import {Button,HasError,AlertError,AlertErrors,AlertSuccess} from 'vform/src/components/bootstrap4'

import Assignments from './components/Assignments.vue'

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

export const eventBus = new Vue();

const app = new Vue({
    components :{
        Assignments:Assignments
    },
    el: '#main-application',
});
