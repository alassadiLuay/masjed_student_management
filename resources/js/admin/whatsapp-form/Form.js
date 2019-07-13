import AppForm from '../app-components/Form/AppForm';
import Autocomplete from 'vuejs-auto-complete'

Vue.component('whatsapp-form', {
    components: {
        Autocomplete,
    },
    mixins: [AppForm],
    data: function() {
        return {
            phone_number : '',
            students : [],
            options: [],
        }
    },
    methods: {
      getStudentsNumbers (input) {
        return 'http://127.0.0.1:8000/admin/students/student_json?student_number=true&studnet_name=' + input
      },
      addDistributionGroup (group) {
        console.log(group);
        this.phone_number = group.selectedObject.father_phone
        var found = false;
        for (var j = 0; j < this.students.length; j++) {
          if(this.students[j].phone_number ==  group.selectedObject.father_phone && this.students[j].student_name == group.selectedObject.student_fname )
            found = true;
        }
        if(!found)
          this.students.push({student_name: group.selectedObject.student_fname, phone_number : group.selectedObject.father_phone});
        // access the autocomplete component methods from the parent
        //this.$refs.autocomplete.clear()
      },
      formattedDisplay (result) {
        return result.student_fname + ' بن '+ result.student_father_name  + ' [' + result.father_phone + ']'
      },
      semester_courses:function(event) {
        fetch(`http://127.0.0.1:8000/admin/course-students/semester_courses?semester_id=`+event.target.value)
        .then(res => res.json())
        .then(res => {
          console.log(res.data)
          this.options = res.data;
          this.options.unshift({id : '-1' , course_name:'اختر حلقة'})
          this.form.options = res.data;
        });
      },
      studentsFetcher:function(event) {
        fetch(`http://127.0.0.1:8000/admin/students/student_json?course_id=`+event.target.value)
        .then(res => res.json())
        .then(res => {
          console.log(res.data)
          for (var i = 0; i < res.data.length; i++) {
            var found = false;
            for (var j = 0; j < this.students.length; j++) {
              if(this.students[j].phone_number == res.data[i].father_phone && this.students[j].student_name == res.data[i].student_fname )
                found = true;
            }
            if(!found)
              this.students.push({student_name:  res.data[i].student_fname, phone_number : res.data[i].father_phone})
          }
          //this.students_data = res.data;
        });
      },
      removeStudent: function (student_number,index,event){
        /*var index = -1;
        if (event) event.preventDefault()
        for (var i = 0; i < this.students.length; i++) {
          console.log(this.students[i].phone_number)
          console.log(student_number)
          console.log(this.students[i])
          if(this.students[i].phone_number == student_number)
            index = i;
        }*/
        alert(index)
        if (event) event.preventDefault()
        if (index > -1) {
          index = index-1
          if(this.students.length > 1)
            this.students = this.students.splice(index, 1);
          else
            this.students = []
        }
      },
      appendSTDName: function(event){
        if (event) event.preventDefault()
        document.getElementById("message").value += '$$student_name$$'
      },
      numbersResults: function(event){
        var temp = []
        for (var i = 0; i < this.students.length; i++) {
          temp.push(this.students[i].student_name + "_::_" + this.students[i].phone_number)
        }
        return temp.join('_,_')
      }
    }
});