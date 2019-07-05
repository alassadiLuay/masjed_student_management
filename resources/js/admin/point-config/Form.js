import AppForm from '../app-components/Form/AppForm';

Vue.component('point-config-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                point_type_id:  '' ,
                point_name:  '' ,
                point_value:  '' ,
                notes:  '' ,
                
            }
        }
    }

});