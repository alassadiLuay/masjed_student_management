import AppForm from '../app-components/Form/AppForm';

Vue.component('exam-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                course_id:  '' ,
                exam_name:  '' ,
                exam_max_num:  '' ,
                exam_min_num:  '' ,
                
            }
        }
    }

});