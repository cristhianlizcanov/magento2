define([
    'jquery', 
    'jquery/ui'

], function($){
    "use.strict";
    
    $.widget('mage.bicicletasMilan', {
        
        options: {

        },
        
        // _init: function(){
           
        // },

        _create: function(){
            alert(this.options);
        }
    });

    return $.mage.bicicletasMilan;

});