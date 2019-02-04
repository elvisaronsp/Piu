import Vue from 'vue';
import GradeComponent from './forms/GradeComponent';
import VModal from 'vue-js-modal'

Vue.use(VModal, {dynamic: true, injectModalsContainer: true});

const entities = new Vue({});

Vue.prototype.$entities = {
    students: [
      {
          label: 'Lançar notas',
          click: (id, parentId) => {
            entities.$modal.show(GradeComponent, {studentId: id, groupId: parentId}, {
              draggable: true,
              classes: 'p-4 v--modal',
              height: '400'
            });
          },
          style: 'primary'
      }
    ]
};
