import Vue from 'vue';
import GradeComponent from './forms/GradeComponent';
import StudentGradesComponent from './specified/students/StudentGradesComponent';
import StudentBoletimComponent from './specified/students/StudentBoletimComponent';
import SelectUnitChartComponent from './specified/units/SelectUnitChartComponent';
import VModal from 'vue-js-modal';

Vue.use(VModal, {dynamic: true, injectModalsContainer: true, dialog: true});

const entities = new Vue({});

Vue.prototype.$entities = {
    students: [
      {
          label: 'Lançar notas',
          click: (id, parentId) => {
            entities.$modal.show(GradeComponent, {studentGroupId: id, groupId: parentId}, {
              draggable: true,
              classes: 'p-4 v--modal',
              height: '450'
            });
          },
          style: 'primary'
      },
      {
        label: 'Notas lançadas',
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
      },
      {
        label: 'Boletim',
        click: (id, parentId) => {
          entities.$modal.show(StudentBoletimComponent, {studentGroupId: id}, {
            draggable: true,
            classes: 'p-4 v--modal',
            height: 'auto',
            width: '70%',
            scrollable: true
          });
        },
        style: 'success'
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
        style: 'primary'
      },
      {
        label: 'ATA',
        click: (id, parentId) => {
          window.location = entities.$routes.groups.ata.replace(':id:', id);
        },
        style: 'info'
      }
    ],
};
