import AppForm from '../app-components/Form/AppForm';
import Autocomplete from 'vuejs-auto-complete'

Vue.component('whatsapp-form', {
    components: {
        Autocomplete,
    },
    mixins: [AppForm],
    data: function() {
        return {
            phone_number : ''
        }
    },
    methods: {
      getStudentsNumbers (input) {
        return 'http://127.0.0.1:8000/admin/students/student_json?student_number=true&studnet_name=' + input
      },
      addDistributionGroup (group) {
        console.log(group);
        this.phone_number = group.selectedObject.father_phone
        // access the autocomplete component methods from the parent
        //this.$refs.autocomplete.clear()
      },
      formattedDisplay (result) {
        return result.student_fname + ' بن '+ result.student_father_name  + ' [' + result.father_phone + ']'
      }
    }
});