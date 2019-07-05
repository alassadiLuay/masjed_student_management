import AppForm from '../app-components/Form/AppForm';

Vue.component('teacher-course-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                teacher_id:  '' ,
                course_id:  '' 
            },
            options: [],
            semesters: [],
            semester_id: '',
        }
    },
    semesters: function() {
    	return []
    },
    methods:{
		semester_courses:function(event) {
			fetch(`semester_courses?semester_id=`+event.target.value)
			.then(res => res.json())
			.then(res => {
				console.log(">>>>>>>> :",res.data)
				this.options = res.data;
			});
		},
		semesters_data:function(event) {
			fetch(`http://127.0.0.1:8000/admin/semesters/all`)
			.then(res => res.json())
			.then(res => {
				console.log(">>>>>>>>",res.data)
				this.semesters = res.data;
				var event = {}
			    event.target = {value : $("#semester_id_value").val()}
			    this.semester_id = $("#semester_id_value").val();
			    console.log(">>>>>>>> || ",event)
				this.semester_courses(event)
			});
		}
	},
	created: function(){
		console.log(this.semesters);
		console.log(this.data);
		console.log(":::::::::::::::::::::");
		this.semesters_data();
		console.log("sss",$("#semester_name").val())
		if($("#semester_name").children(":selected")){
			var event = {}
			    event.target = {value:$("#semester_name").children(":selected").attr("id")}
			    console.log($("#semester_name").children(":selected").attr("id"))
	        this.semester_courses(event)
		}
    }
});