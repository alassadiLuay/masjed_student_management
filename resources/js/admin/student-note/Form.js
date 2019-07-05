import AppForm from '../app-components/Form/AppForm';
import Multiselect from 'vue-multiselect'
Vue.component('student-note-form', {
    mixins: [AppForm],
    components: {
	    Multiselect
	  },
    data: function() {
        return {
            form: {
                notes:  '' ,
                student_id:  '' 
            },
            options: [],
            students_data: []
        }
    },
	methods:{
			studentsFetcher:function() {
				fetch(`http://127.0.0.1:8000/admin/students/student_json`)
				.then(res => res.json())
				.then(res => {
					this.students_data = res.data;
				});
			},
			nameWithAddress: function({ id,student_fname,student_lname,student_address,father_phone }) {
		      return `${student_fname} ${student_lname} — ${student_address}[${father_phone}]`
		    }
		},
	created: function(){
		this.studentsFetcher();
    }
});