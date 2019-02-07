import Vue from 'vue'

Vue.prototype.$routes = {
    stuffs: {
        index: '/stuffs',
        store: '/stuffs/store',
        destroy: '/stuffs/destroy/:id:',
        edit: '/stuffs/edit/:id:'
    },
    grades: {
        index: '/grades',
        store: '/grades/store',
        destroy: '/grades/destroy/:id:',
        edit: '/grades/edit/:id:'
    },
    employeers: {
        index: '/employeers',
        store: '/employeers/store',
        destroy: '/employeers/destroy/:id:',
        edit: '/employeers/edit/:id:'
    },
    schools: {
        index: '/schools',
        store: '/schools/store',
        destroy: '/schools/destroy/:id:',
        edit: '/schools/edit/:id:'
    },
    students: {
        index: '/students',
        store: '/students/store',
        destroy: '/students/destroy/:id:',
        edit: '/students/edit/:id:'
    },
    units: {
        index: '/units',
        store: '/units/store',
        destroy: '/units/destroy/:id:',
        edit: '/units/edit/:id:'
    }

}