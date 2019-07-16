import AppForm from '../app-components/Form/AppForm';
import Multiselect from 'vue-multiselect'
Vue.component('student-point-form', {
    mixins: [AppForm],
    components: {
	    Multiselect
	  },
    data: function() {
        return {
            form: {
                student_id:  '',
                point_id:  '' 
            },
            options: [],
            students_data: [],
            points_data: []
        }
    },
    methods:{
    		semester_courses:function(event) {
				fetch(`http://127.0.0.1:8000/admin/course-students/semester_courses?semester_id=`+event.target.value)
				.then(res => res.json())
				.then(res => {
					console.log(res.data)
					this.options = res.data;
					this.form.options = res.data;
					this.students_data = []
					if(res.data.length > 0)
						studentsFetcher({target:{value:res.data[0]['id']}})
				});
			},
			studentsFetcher:function(event) {
				fetch(`http://127.0.0.1:8000/admin/students/student_json?course_id=`+event.target.value)
				.then(res => res.json())
				.then(res => {
					this.students_data = res.data;
				});
			},
			pointConfigFetcher:function() {
				fetch(`http://127.0.0.1:8000/admin/point-configs/point_json`)
				.then(res => res.json())
				.then(res => {
					console.log(res.data)
					this.points_data = res.data;
				});
			},
			nameWithAddress: function({ id,student_fname,student_lname,student_address,father_phone,s_id }) {
		      return `${student_fname} ${student_lname} — ${student_address}[${father_phone}]`
		    },
		    nameWithpointConf: function({id,point_name,point_value,point_type}){
		    	if(point_type)
		    		return `${point_name} = ${point_value} — [${point_type.type_name}]`
		    	else
		    		return `${point_name} = ${point_value} — []`
		    }
		},
	created: function(){
		//this.studentsFetcher();
		this.pointConfigFetcher();
    }

});

Vue.component('student-report-form', {
    mixins: [AppForm],
    components: {
	    Multiselect
	  },
    data: function() {
        return {
            options: [],
            students_data: [],
            points_data: []
        }
    }
});