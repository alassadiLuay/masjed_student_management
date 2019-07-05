import AppForm from '../app-components/Form/AppForm';

Vue.component('teacher-role-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                role_name:  '' ,
                notes:  '' ,
                
            }
        }
    }

});