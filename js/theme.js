(function($){

    $(function(){

        // fit footer
        (function(main, meta, fn){

            if (!main.length) return;

            fn = function() {

                main.css('min-height','');

                meta = document.body.getBoundingClientRect();

                if (meta.height < window.innerHeight) {
                    main.css('min-height', (main.outerHeight() + (window.innerHeight - meta.height))+'px');
                }

                return fn;
            };

            UIkit.$win.on('load resize', fn());

        })($('#tm-main'));

      // Vertical Dropdown menu
      $('.tm-sidebar-nav').verticalDropdown();

      // Parallax Scrolling
      UIkit.$doc.on('scrolling.uk.document', (function(){

          var wrapper = $('.tm-sidebar-parallax .tm-sidebar-wrapper').css('background-position', (UIkit.langdirection == 'right' ? '100%':'0%') +' 0px');

          return function() {

              if(window.innerWidth <= 1024) return;

              var x = UIkit.$win.scrollTop();
              wrapper.css('background-position', (UIkit.langdirection == 'right' ? '100%':'0%') +' '+ parseInt(-x / 4) + 'px');

          };

      })());

      // Ripple Effect (by http://codepen.io/440design/pen/iEztk), modified by YOOtheme
      (function(){
          var ink, d, x, y;
          $(".uk-navbar-nav li > a, .uk-button, .uk-subnav-pill > li > a, .uk-nav-side > li > a, .uk-nav-offcanvas > li > a").click(function(e){

              var ele = $(this);

              if(ele.find(".tm-ripple").length === 0){
                  ele.prepend("<span class='tm-ripple'></span>");
              }

              ink = ele.find(".tm-ripple");
              ink.removeClass("tm-animate-ripple");

              if(!ink.height() && !ink.width()){
                  d = Math.max(ele.outerWidth(), ele.outerHeight());
                  ink.css({height: d, width: d});
              }

              x = e.pageX - ele.offset().left - ink.width()/2;
              y = e.pageY - ele.offset().top - ink.height()/2;

              ink.css({top: y+'px', left: x+'px'}).addClass("tm-animate-ripple");
          });
      })();

    });

})(jQuery);
