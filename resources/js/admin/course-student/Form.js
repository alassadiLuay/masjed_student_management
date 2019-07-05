import AppForm from '../app-components/Form/AppForm';
import Multiselect from 'vue-multiselect'
//Vue.component('multiselect', Multiselect)
Vue.component('course-student-form', {
    mixins: [AppForm],
    components: {
	    Multiselect
	  },
	props: [
            'students'
        ],  
    data: function() {
        return {
            form: {
                note:  '' ,
                student_id:  '' ,
                course_id:  '' ,
                class_id:  '' 
            },
            options: [],
            students_data: [],
            semesters: [],
            semester_id: '',
            select_value : []
        }
    },
    methods:{
		semester_courses:function(event) {
			fetch(`semester_courses?semester_id=`+event.target.value)
			.then(res => res.json())
			.then(res => {
				console.log(res.data)
				this.options = res.data;
				this.form.options = res.data;
			});
		},
		studentsFetcher:function() {
			fetch(`http://127.0.0.1:8000/admin/students/student_json`)
			.then(res => res.json())
			.then(res => {
				this.students_data = res.data;
				console.log("____________________________")
				for (var i = 0; i < res.data.length; i++) {
					console.log(res.data[i])
					console.log(res.data[i].student_id + " :: "+ this.form.student_id )
					if(res.data[i].id == this.form.student_id){
						var selected_v = {}
						selected_v['id'] = res.data[i].id
						selected_v['student_id'] = res.data[i].student_id
						selected_v['student_fname'] = res.data[i].student_fname
						selected_v['student_lname'] = res.data[i].student_lname
						selected_v['student_address'] = res.data[i].student_address
						selected_v['father_phone'] = res.data[i].father_phone
						this.select_value.push(selected_v)
						console.log("ddo")
					}
				}
				console.log("____________________________")
				console.log("ddo",this.select_value)
			});
		},
		nameWithAddress: function({ id,student_id,student_fname,student_lname,student_address,father_phone }) {
	      return `${student_fname} ${student_lname} — ${student_address}[${father_phone}]`
	    },
		semesters_data:function(event) {
			fetch(`http://127.0.0.1:8000/admin/semesters/all`)
			.then(res => res.json())
			.then(res => {
				this.semesters = res.data;
				var event = {}
			    event.target = {value : $("#semester_id_value").val()}
			    this.semester_id = $("#semester_id_value").val();
				this.semester_courses(event)
			});
		}
	},
	created: function(){
		this.studentsFetcher();
		this.semesters_data();
    }

});