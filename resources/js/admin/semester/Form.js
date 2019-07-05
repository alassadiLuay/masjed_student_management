import AppForm from '../app-components/Form/AppForm';

Vue.component('semester-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                semester_name:  '' ,
                description:  '' ,
                started_at:  '' ,
                end_at:  '' ,
                enabled:  false ,
                
            }
        }
    }

});