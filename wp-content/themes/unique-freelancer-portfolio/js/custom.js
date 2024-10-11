jQuery(function($){
  "use strict";
    jQuery('.gb_navigation > ul').superfish({
    delay:       500,
    animation:   {opacity:'show',height:'show'},
    speed:       'fast'
  });
});

function unique_freelancer_portfolio_gb_Menu_open() {
  jQuery(".side_gb_nav").addClass('show');
}
function unique_freelancer_portfolio_gb_Menu_close() {
  jQuery(".side_gb_nav").removeClass('show');
}

jQuery('.gb_toggle').click(function () {
  unique_freelancer_portfolio_Keyboard_loop(jQuery('.side_gb_nav'));
});

function unique_freelancer_portfolio_search_show() {
	jQuery(".external-search").addClass('show');
	jQuery(".external-search").fadeIn();
}
jQuery( ".search-container-button").on("click", unique_freelancer_portfolio_search_show);

function unique_freelancer_portfolio_search_hide() {
	jQuery(".external-search").removeClass('show');
	jQuery(".external-search").fadeOut();
}
jQuery( ".search-container-button-close").on("click", unique_freelancer_portfolio_search_hide);

// Search header

jQuery('.search-container-button-close').on('keydown', function (es) {
  if (jQuery("this:focus") && (es.which === 9)) {
    es.preventDefault();
    jQuery(this).blur();
    jQuery('.internal-search form input').focus();
  }
});

jQuery('.internal-search form input').on('keydown', function (eventser) {
  if (eventser.shiftKey && eventser.keyCode == 9) {
    eventser.preventDefault();
    jQuery(this).blur();
    jQuery('.search-container-button-close').focus()
  }
});

var unique_freelancer_portfolio_Keyboard_loop = function (elem) {
  var unique_freelancer_portfolio_tabbable = elem.find('select, input, textarea, button, a').filter(':visible');
  var unique_freelancer_portfolio_firstTabbable = unique_freelancer_portfolio_tabbable.first();
  var unique_freelancer_portfolio_lastTabbable = unique_freelancer_portfolio_tabbable.last();
  unique_freelancer_portfolio_firstTabbable.focus();

  unique_freelancer_portfolio_lastTabbable.on('keydown', function (e) {
    if ((e.which === 9 && !e.shiftKey)) {
      e.preventDefault();
      unique_freelancer_portfolio_firstTabbable.focus();
    }
  });

  unique_freelancer_portfolio_firstTabbable.on('keydown', function (e) {
    if ((e.which === 9 && e.shiftKey)) {
      e.preventDefault();
      unique_freelancer_portfolio_lastTabbable.focus();
    }
  });

  elem.on('keyup', function (e) {
    if (e.keyCode === 27) {
      elem.hide();
    };
  });
};

( function( $ ) {

  jQuery(document).ready(function($){
    // Implement go to top.
    var $scroll_obj = jQuery( '#btn-scrollup' );
    jQuery( window ).on( 'scroll',function(){
      if ( $( this ).scrollTop() > 100 ) {
        $scroll_obj.fadeIn();
      } else {
        $scroll_obj.fadeOut();
      }
    });

    $scroll_obj.on( 'click',function(){
      jQuery( 'html, body' ).animate( { scrollTop: 0 }, 600 );
      return false;
    });
  });

} )( jQuery );

document.addEventListener('DOMContentLoaded', function () {
  var preloader = document.getElementById('preloader');

  if (preloader) {  // Check if the element exists before trying to manipulate it
      var duration = 4000; // 10 seconds

      setTimeout(function () {
          preloader.style.display = 'none';
      }, duration);
  }
});

document.addEventListener('DOMContentLoaded', function () {
  // Get the header element
  var header = document.getElementById('middle-header');

  // Get the initial offset of the header
  var headerOffset = header.offsetTop;

  // Function to handle scroll events
  function handleScroll() {
      var sticky_setting = jQuery('#middle-header').attr('data-sticky');
      if (window.pageYOffset > headerOffset) {
          // Add the "sticky" class when scrolling down
          if(sticky_setting == 1) {
            header.classList.add('sticky');
          }
      } else {
          // Remove the "sticky" class when scrolling up
          if(sticky_setting == 1) {
            header.classList.remove('sticky');
          }
      }
  }

  // Attach the scroll event listener
  window.onscroll = handleScroll;
});
