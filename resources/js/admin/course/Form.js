import AppForm from '../app-components/Form/AppForm';

Vue.component('course-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                semester_id:  '' ,
                course_name:  '' ,
                description:  '' ,
                started_at:  '' ,
                end_at:  '' ,
                session_number:  '' ,
                enabled:  false ,
                
            }
        }
    }

});