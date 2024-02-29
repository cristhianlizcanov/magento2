define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (
        Component,
        rendererList
    ) {
        'use strict';
        rendererList.push(  
            {
                type: 'payment_method',
                component: 'Prueba_PaymentMethod/js/view/payment/method-renderer/payment_method'
            }
        );
        /** Add view logic here if needed */
        return Component.extend({});
    }
);

// define('ui_component', 'Magento_Checkout/js/model/payment/render-list'),
// function (Component, rendererList){
//     'uso_strict';

//     rendererList.push(
//         {
//             type: 'payment_method',
//             component: 'Prueba_PaymentMethod/js/view/payment/method-renderer/payment_method'
//         }
//     );

//     return Component.extend({});
// }