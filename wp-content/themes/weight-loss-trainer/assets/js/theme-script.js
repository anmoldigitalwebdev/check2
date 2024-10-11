function weight_loss_trainer_openNav() {
  jQuery(".sidenav").addClass('show');
}
function weight_loss_trainer_closeNav() {
  jQuery(".sidenav").removeClass('show');
}

( function( window, document ) {
  function weight_loss_trainer_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const weight_loss_trainer_nav = document.querySelector( '.sidenav' );

      if ( ! weight_loss_trainer_nav || ! weight_loss_trainer_nav.classList.contains( 'show' ) ) {
        return;
      }
      const elements = [...weight_loss_trainer_nav.querySelectorAll( 'input, a, button' )],
        weight_loss_trainer_lastEl = elements[ elements.length - 1 ],
        weight_loss_trainer_firstEl = elements[0],
        weight_loss_trainer_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;

      if ( ! shiftKey && tabKey && weight_loss_trainer_lastEl === weight_loss_trainer_activeEl ) {
        e.preventDefault();
        weight_loss_trainer_firstEl.focus();
      }

      if ( shiftKey && tabKey && weight_loss_trainer_firstEl === weight_loss_trainer_activeEl ) {
        e.preventDefault();
        weight_loss_trainer_lastEl.focus();
      }
    } );
  }
  weight_loss_trainer_keepFocusInMenu();
} )( window, document );

var weight_loss_trainer_btn = jQuery('#button');

jQuery(window).scroll(function() {
  if (jQuery(window).scrollTop() > 300) {
    weight_loss_trainer_btn.addClass('show');
  } else {
    weight_loss_trainer_btn.removeClass('show');
  }
});

weight_loss_trainer_btn.on('click', function(e) {
  e.preventDefault();
  jQuery('html, body').animate({scrollTop:0}, '300');
});

jQuery(document).ready(function() {
    var owl = jQuery('#top-slider .owl-carousel');
    owl.owlCarousel({
    margin: 0,
    nav:false,
    autoplay : true,
    lazyLoad: true,
    autoplayTimeout: 5000,
    loop: false,
    dots: false,
    navText : ['<i class="fa fa-lg fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-lg fa-chevron-right" aria-hidden="true"></i>'],
    responsive: {
      0: {
        items: 1
      },
      576: {
        items: 1
      },
      768: {
        items: 1
      },
      1000: {
        items: 1
      },
      1200: {
        items: 1
      }
    },
    autoplayHoverPause : false,
    mouseDrag: true
  });
})

window.addEventListener('load', (event) => {
  jQuery(".loading").delay(2000).fadeOut("slow");
});
