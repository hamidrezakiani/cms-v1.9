!function(e){"use strict";var a,t,r,n,i=(a=e(window).width(),t=function(){jQuery(".dzload").each((function(){var a=""+e(this).attr("dzsrc");jQuery(this).hide((function(){jQuery(this).load(a,(function(){jQuery(this).fadeIn("slow")}))}))})),a<=991&&jQuery(".navbar-nav > li > a, .sub-menu > li > a").unbind().on("click",(function(e){jQuery(this).parent().hasClass("open")?jQuery(this).parent().removeClass("open"):(jQuery(this).parent().parent().find("li").removeClass("open"),jQuery(this).parent().addClass("open"))})),jQuery(".sidenav-nav .navbar-nav > li > a").next(".sub-menu,.mega-menu").slideUp(),jQuery(".sidenav-nav .sub-menu > li > a").next(".sub-menu").slideUp(),jQuery(".sidenav-nav .navbar-nav > li > a, .sidenav-nav .sub-menu > li > a").unbind().on("click",(function(e){jQuery(this).hasClass("dz-open")?(jQuery(this).removeClass("dz-open"),jQuery(this).parent("li").children(".sub-menu,.mega-menu").slideUp()):(jQuery(this).addClass("dz-open"),jQuery(this).parent("li").children(".sub-menu,.mega-menu").length>0?(e.preventDefault(),jQuery(this).next(".sub-menu,.mega-menu").slideDown(),jQuery(this).parent("li").siblings("li").find("a").removeClass("dz-open"),jQuery(this).parent("li").siblings("li").children(".sub-menu,.mega-menu").slideUp()):jQuery(this).next(".sub-menu,.mega-menu").slideUp())}))},r=function(){var e=jQuery(this),a=e.find(".modal-dialog");e.css("display","block"),a.css("margin-top",Math.max(0,(jQuery(window).height()-a.height())/2))},n=function(){var a=new Date;a.setMonth(a.getMonth()+1),a=a.getDate()+" "+["January","February","March","April","May","June","July","August","September","October","November","December"][a.getMonth()]+" "+a.getFullYear();var t=jQuery(".countdown-timer").data("date");if(null!=t&&""!=t&&(a=t),jQuery(".countdown-timer").length>0){var r=new Date;r=r.getTime();var n=new Date;n=n.getTime();var i=new Date(a);i=i.getTime(),e(".countdown-timer").final_countdown({start:r/1e3,end:i/1e3,now:n/1e3,selectors:{value_seconds:".clock-seconds .val",canvas_seconds:"canvas-seconds",value_minutes:".clock-minutes .val",canvas_minutes:"canvas-minutes",value_hours:".clock-hours .val",canvas_hours:"canvas-hours",value_days:".clock-days .val",canvas_days:"canvas-days"},seconds:{borderColor:e(".type-seconds").attr("data-border-color"),borderWidth:"5"},minutes:{borderColor:e(".type-minutes").attr("data-border-color"),borderWidth:"5"},hours:{borderColor:e(".type-hours").attr("data-border-color"),borderWidth:"5"},days:{borderColor:e(".type-days").attr("data-border-color"),borderWidth:"5"}})}},{init:function(){var a,i;a=jQuery("#quik-search-btn"),i=jQuery("#quik-search-remove"),a.on("click",(function(){jQuery(".dz-quik-search").fadeIn(500),jQuery(".dz-quik-search").addClass("On")})),i.on("click",(function(){jQuery(".dz-quik-search").fadeOut(500),jQuery(".dz-quik-search").removeClass("On")})),jQuery(".box-hover").on("mouseenter",(function(){jQuery(this).parent().parent().find(".box-hover").removeClass("active"),jQuery(this).addClass("active")})),t(),jQuery(".mfp-gallery").length>0&&jQuery(".mfp-gallery").magnificPopup({delegate:".mfp-link",type:"image",tLoading:"Loading image #%curr%...",mainClass:"mfp-img-mobile",gallery:{enabled:!0,navigateByImgClick:!0,preload:[0,1]},image:{tError:'<a href="%url%">The image #%curr%</a> could not be loaded.',titleSrc:function(e){return e.el.attr("title")+"<small></small>"}}}),jQuery(".mfp-video").length>0&&jQuery(".mfp-video").magnificPopup({type:"iframe",iframe:{markup:'<div class="mfp-iframe-scaler"><div class="mfp-close"></div><iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe><div class="mfp-title">Some caption</div></div>'},callbacks:{markupParse:function(e,a,t){a.title=t.el.attr("title")}}}),jQuery(".popup-youtube, .popup-vimeo, .popup-gmaps").length>0&&e(".popup-youtube, .popup-vimeo, .popup-gmaps").magnificPopup({disableOn:700,type:"iframe",mainClass:"mfp-fade",removalDelay:160,preloader:!1,fixedContentPos:!1}),jQuery("button.scroltop").on("click",(function(){return jQuery("html, body").animate({scrollTop:0},1e3),!1})),jQuery(window).bind("scroll",(function(){jQuery(window).scrollTop()>900?jQuery("button.scroltop").fadeIn(1e3):jQuery("button.scroltop").fadeOut(1e3)})),jQuery(window).on("scroll",(function(){if(jQuery(".sticky-header").length>0){var a=jQuery(".sticky-header");e(window).scrollTop()>a.offset().top?a.addClass("is-fixed"):a.removeClass("is-fixed")}})),jQuery(".default-select").length>0&&jQuery(".default-select").selectpicker(),jQuery('iframe[src*="youtube.com"]').wrap('<div class="embed-responsive embed-responsive-16by9"></div>'),jQuery('iframe[src*="vimeo.com"]').wrap('<div class="embed-responsive embed-responsive-16by9"></div>'),jQuery(".dz-form").length>0&&(e("input, textarea").focus((function(){e(this).parents(".input-area").addClass("focused")})),""!=e("#input_search").val()&&(e("#input_search").addClass("filled"),e("#input_search").parents(".input-area").addClass("focused")),e("input, textarea").blur((function(){""==e(this).val()?(e(this).removeClass("filled"),e(this).parents(".input-area").removeClass("focused")):e(this).addClass("filled")}))),jQuery("#image-gallery-mix").length&&(jQuery(".gallery-filter").find("li").each((function(){e(this).addClass("filter")})),jQuery("#image-gallery-mix").mixItUp()),jQuery(".gallery-filter.masonary").length&&jQuery(".gallery-filter.masonary").on("click","span",(function(){var a=e(this).parent().attr("data-filter");return jQuery(".gallery-filter.masonary span").parent().removeClass("active"),jQuery(this).parent().addClass("active"),jQuery("#image-gallery-isotope").isotope({filter:a}),!1})),n(),jQuery(window).on("resize",(function(){jQuery(".modal:visible").each(r)})),e("#lightgallery, .lightgallery").length>0&&e("#lightgallery, .lightgallery").lightGallery({selector:".lightimg",loop:!0,download:!1,thumbnail:!0,share:!1,exThumbImage:"data-exthumbimage"}),jQuery(".modal").on("show.bs.modal",r),jQuery(".icon-dropdown").on("click",(function(){e(this).hasClass("show")?e(this).removeClass("show"):(jQuery(".icon-dropdown").removeClass("show"),e(this).addClass("show"))})),function(){for(var a=window.location,t=e("ul.navbar a").filter((function(){return this.href==a})).addClass("active").parent().addClass("active");t.is("li");)t=t.parent().addClass("show").parent("li").addClass("active")}(),jQuery(".deznav-scroll").length>0&&(new PerfectScrollbar(".deznav-scroll").isRtl=!1),function(){if(e(".wow").length>0){var a=new WOW({boxClass:"wow",animateClass:"animated",offset:0,mobile:!1});setTimeout((function(){a.init()}),2100)}}(),jQuery("#BmiCalculator").length>0&&jQuery("#BmiCalculator").on("submit",(function(){event.preventDefault();var e=jQuery("#age").val(),a=jQuery("#height").val(),t=jQuery("#weight").val(),r=jQuery("#gender").val(),n=jQuery(this);if(""==e||""==a||""==t||""==r||0==r)return alert("All fields are required!"),!1;n[0].reset();var i=Number(t)/(Number(a)/100*Number(a)/100),s="";i<18.5?s="Underweight":18.5<=i&&i<=24.9?s="Healthy":25<=i&&i<=29.9?s="Overweight":30<=i&&i<=34.9?s="Obese":35<=i&&(s="Extremely obese"),jQuery(".dzFormBmi").html('<div class="dzFormInner"><h4 class="title text-white">'+s+'</h4><h5 class="bmi-result text-primary m-b0">BMI: '+parseFloat(i).toFixed(2)+"</h5></div>")})),e(".heart").on("click",(function(){e(this).toggleClass("heart-blast")})),jQuery(".w3-comment-reply").on("click",(function(){event.preventDefault();var a=e(this).data("commentid"),t=(e(this).data("postid"),e(this).data("replyto")),r=e(this).parents(".comment .comment-body:first");e("#comment_parent").val(a),e("#commentform").trigger("reset"),e("#cancel-comment-reply").removeClass("d-none"),e("#reply-title").html(t),e("#ReplyFormContainer").insertAfter(r)})),jQuery("#cancel-comment-reply").on("click",(function(){event.preventDefault(),e("#comment_parent").val(0),e("#reply-title").empty(),e("#cancel-comment-reply").addClass("d-none"),e("#ReplyFormContainer").appendTo("#comments-div")}))},load:function(){jQuery(".counter").length&&jQuery(".counter").counterUp({delay:10,time:3e3}),function(){if(jQuery("#masonry, .masonry").length>0){var a=jQuery("#masonry, .masonry");if(jQuery(".card-container").length>0){a.data("gutter");var t=void 0===a.data("gutter")?0:a.data("gutter");t=parseInt(t);var r=void 0===a.attr("data-column-width")?"":a.attr("data-column-width");""!=r&&(r=parseInt(r)),a.imagesLoaded((function(){a.masonry({gutterWidth:15,isAnimated:!0,itemSelector:".card-container"})}))}}jQuery(".filters").length&&(jQuery(".filters li:first").addClass("active"),jQuery(".filters").on("click","li",(function(){jQuery(".filters li").removeClass("active"),jQuery(this).addClass("active");var t=e(this).attr("data-filter");a.isotope({filter:t})})))}()},resize:function(){a=e(window).width(),n(),t()}});jQuery(document).ready((function(){i.init(),e('a[data-bs-toggle="tab"]').on("click",(function(){e('a[data-bs-toggle="tab"]').on("click",(function(){e(e(this).attr("href")).show().addClass("show active").siblings().hide()}))})),jQuery(".navicon").on("click",(function(){e(this).toggleClass("open")}))})),jQuery(window).on("load",(function(){i.load(),setTimeout((function(){jQuery("#loading-area").fadeOut()}),2e3)})),jQuery(window).on("resize",(function(){i.resize()}))}(jQuery);