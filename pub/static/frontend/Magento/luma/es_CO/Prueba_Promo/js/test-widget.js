define([
    'jquery', 
    'jquery/ui'

], function($){
    "use.strict";
    
    $.widget('mage.bicicletasMilan', {
        
        options: {

        },
        
        _create: function(){
            alert(this.options);

            
        }
    });

    return $.mage.bicicletasMilan;

});