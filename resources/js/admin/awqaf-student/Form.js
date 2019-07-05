import AppForm from '../app-components/Form/AppForm';
import Multiselect from 'vue-multiselect'
Vue.component('awqaf-student-form', {
    mixins: [AppForm],
    components: {
	    Multiselect
	  },
    data: function() {
        return {
            form: {
                student_id : '',
                awqaf_id : '',
                student_mark : '',
                is_passed : '',
                full_mark : '',
                created_at : '',
                subject_type : '',
                subject_id :''
            },
	        options: [],
	        students_data: [],
	        awqaf_data: [],
	        subjects_data:[]
        }
    },
	methods:{
			awqafFetcher:function() {
				fetch(`http://127.0.0.1:8000/admin/awqafs/awqaf_json`)
				.then(res => res.json())
				.then(res => {
					this.awqaf_data = res.data;
				});
			},
			studentsFetcher:function() {
				fetch(`http://127.0.0.1:8000/admin/students/student_json`)
				.then(res => res.json())
				.then(res => {
					this.students_data = res.data;
				});
			},
			subjectDetailsFetcher:function(event) {
				fetch(`http://127.0.0.1:8000/admin/subjects?subject_id=`+event.target.value)
				.then(res => res.json())
				.then(res => {
					this.subjects_data = res.data;
				});
			},
			nameWithAddress: function({ id,student_fname,student_lname,student_address,father_phone,s_id }) {
		      return `${student_fname} ${student_lname} — ${student_address}[${father_phone}]`
		    },
		    awqafNames: function({ id,test_name,date,place }) {
		      return `${test_name} at ${date} — ${place}`
		    },
		    subjectNames: function({ id,juza_name,surah_name,page_number}) {
		    	if(juza_name)
		     		return `${juza_name}`
		     	if(surah_name)
		     		return `${surah_name}`
		     	if(page_number)
		     		return `${page_number}`
		    },
		},
	created: function(){
		this.studentsFetcher();
		this.awqafFetcher();
    }
});