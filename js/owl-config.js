

jQuery(document).ready(function() {
    console.log('owl-config ok !')

    jQuery('#APCarousel').owlCarousel({
        loop:true,
        margin:30,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                loop:false,
                items:3
            }
        }
    })

    jQuery('#BoostCarousel').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                loop:false,
                items:3
            }
        }
    })

    jQuery('#VacancesCarousel').owlCarousel({
        loop:true,
        margin:30,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                loop:false,
                items:3
            }
        }
    })
})