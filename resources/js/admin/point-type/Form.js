import AppForm from '../app-components/Form/AppForm';

Vue.component('point-type-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                type_name:  '' ,
                notes:  '' ,
                
            }
        }
    }

});