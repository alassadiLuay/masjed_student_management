import AppForm from '../app-components/Form/AppForm';

Vue.component('listened-subject-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                student_id:  '' ,
                student_course_id:  '' ,
                subject_id:  '' ,
                subject_type:  '' ,
                
            },
            options: [],
            students_data: [],
            subjects_data:[]
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
                        this.studentsFetcher({target:{value:res.data[0]['id']}})
                });
            },
            studentsFetcher:function(event) {
                fetch(`http://127.0.0.1:8000/admin/students/student_json?course_id=`+event.target.value)
                .then(res => res.json())
                .then(res => {
                    this.students_data = res.data;
                });
            },
            nameWithAddress: function({ id,student_fname,student_lname,student_address,father_phone,s_id }) {
              return `${student_fname} ${student_lname} — ${student_address}[${father_phone}]`
            },
            subjectDetailsFetcher:function(event) {
                fetch(`http://127.0.0.1:8000/admin/subjects?subject_id=`+event.target.value)
                .then(res => res.json())
                .then(res => {
                    this.subjects_data = res.data;
                });
            },
            subjectNames: function({ id,juza_name,surah_name,page_number}) {
                if(juza_name)
                    return `${juza_name}`
                if(surah_name)
                    return `${surah_name}`
                if(page_number)
                    return `${page_number}`
            },
        }
});