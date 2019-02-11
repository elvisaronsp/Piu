import Vue from 'vue';
import GradeComponent from './forms/GradeComponent';
import StudentGradesComponent from './specified/students/StudentGradesComponent';
import SelectUnitChartComponent from './specified/units/SelectUnitChartComponent';
import VModal from 'vue-js-modal';

Vue.use(VModal, {dynamic: true, injectModalsContainer: true, dialog: true});

const entities = new Vue({});

Vue.prototype.$entities = {
    students: [
      {
          label: 'Lançar notas',
          click: (id, parentId) => {
            entities.$modal.show(GradeComponent, {studentGroupId: id}, {
              draggable: true,
              classes: 'p-4 v--modal',
              height: '450'
            });
          },
          style: 'primary'
      },
      {
        label: 'Ver notas',
        click: (id, parentId) => {
          entities.$modal.show(StudentGradesComponent, {studentGroupId: id}, {
            draggable: true,
            classes: 'p-4 v--modal',
            height: 'auto',
            width: '65%',
            scrollable: true
          });
        },
        style: 'warning'
      }
    ],
    groups: [
      {
        label: 'Gráfico de rendimento',
        click: (id, parentId) => {
          entities.$modal.show(SelectUnitChartComponent,
            {groupId: id},
            {
              draggable: true,
              classes: 'p-4 v--modal',
              height: '300px',
              width: '40%'
            }
          );
        },
        style: 'info'
      }
    ]
};
