import Vue from 'vue';

Vue.prototype.$routes = {
    base: 'http://'+window.location.host, //hack to work on codeanywhere
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
        edit: '/grades/edit/:id:',
        datachart: '/grades/data-chart/:group_id:/:unit_id:'
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
    },
    responsability: {
        index: '/responsabilities',
        store: '/responsabilities/store',
        destroy: '/responsabilities/destroy/:id:',
        edit: '/responsabilities/edit/:id:'
    },
    groups: {
        index: '/groups',
        store: '/groups/store',
        destroy: '/groups/destroy/:id:',
        edit: '/groups/edit/:id:',
        ata: '/groups/ata/:id:'
    },
    images: {
        show: '/images/:fileName:'
    },
    options: {
        index: '/options',
        store: '/options/store',
        update: '/options/update/:name:',
        destroy: '/options/destroy/:id:'

    }

};
