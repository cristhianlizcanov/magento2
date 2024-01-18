require(['jquery', 'slick'], function($){
    $(document).ready(function(){
        $('.module-slick').slick({
            infinite: true,
            slidesToShow: 4,            
            autoplay: true,
            autoplaySpeed: 3000
        }); 
    });
 });