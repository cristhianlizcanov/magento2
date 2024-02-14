define([
     'ko',
     'uiComponent',
     'jquery'
], function (ko, Component, $){
    'use strict';

    return Component.extend({
        initialize: function() {    
            // this.salirInput();      
            //initialize parent Component
            this._super();
            this.qty = ko.observable(this.defaultQty);
        },

        decreaseQty: function() {
            var newQty = this.qty() - 1;
            if(newQty < 1){
                newQty = 1;
            }
            this.qty(newQty);
        },

        increaseQty: function() {
            var newQty = this.qty() + 1;
            this.qty(newQty);
        },
        salirInput: function(){
            // var ele = $('#qty');
            console.log("Hola Magento2 " + $('#qty').val());

            // $('#remarks').focusin(function(){
            //     console.log("fosusin");
            // })
             
            // ele.focusout(function(){
            //     console.log("Focus");
            // })

            // ele.on('focusout', function(){
            // console.log("Saliendo");
            // });
        }
    });
});