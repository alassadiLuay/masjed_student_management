import AppForm from '../app-components/Form/AppForm';

Vue.component('student-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                student_fname:  '' ,
                student_lname:  '' ,
                student_father_name:  '' ,
                student_address:  '' ,
                student_father_job:  '' ,
                student_nationality:  '' ,
                father_phone:  '' ,
                student_phone:  '' ,
                home_phone:  '' ,
                transportation:  '' ,
                student_photo:  'defualt.jpg' ,
                note:  '' ,
                status:  false ,
                has_id:  false ,
                student_birthdate:  '' ,
                
            }
        }
    }

});