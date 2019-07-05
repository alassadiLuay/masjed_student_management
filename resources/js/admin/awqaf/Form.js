import AppForm from '../app-components/Form/AppForm';

Vue.component('awqaf-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                test_name:  '' ,
                date:  '' ,
                place:  '' ,
                /*tester_name:  '' ,*/
                
            }
        }
    }

});