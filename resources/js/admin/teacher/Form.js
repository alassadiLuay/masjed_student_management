import AppForm from '../app-components/Form/AppForm';

Vue.component('teacher-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                teacher_name:  '' ,
                teacher_address:  '' ,
                teacher_study:  '' ,
                teacher_speciality:  '' ,
                teacher_work:  '' ,
                teacher_extras:  '' ,
                teacher_note:  '' ,
                teacher_mobile:  '' ,
                teacher_phone:  '' ,
                birthdate:  '' ,
                username: '',
                password: ''
            }
        }
    }

});