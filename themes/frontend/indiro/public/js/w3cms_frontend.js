(function ($) {
    "use strict";

    var w3cms = function () {
        /* Countdown ============ */
        /* Countdown Timer ============ */
		var handleFinalCountDown = function(WebsiteLaunchDate){

			if(jQuery('.countdown-timer').length > 0 )
			{
				var startTime = new Date(); // Put your website start time here
				startTime = startTime.getTime();
				
				var currentTime = new Date();
				currentTime = currentTime.getTime();
				
				var endTime = new Date(WebsiteLaunchDate); // Put your website end time here			
				endTime = endTime.getTime();		
				
				$('.countdown-timer').final_countdown({
					
					'start': (startTime/1000),
					'end': (endTime/1000), 
					'now': (currentTime/1000), 
					selectors: {
						value_seconds:'.clock-seconds .val',
						canvas_seconds:'canvas-seconds',
						value_minutes:'.clock-minutes .val',
						canvas_minutes:'canvas-minutes',
						value_hours:'.clock-hours .val',
						canvas_hours:'canvas-hours',
						value_days:'.clock-days .val',
						canvas_days:'canvas-days'
					},
					seconds: {
						borderColor:$('.type-seconds').attr('data-border-color'),
						borderWidth:'5',
					},
					minutes: {
						borderColor:$('.type-minutes').attr('data-border-color'),
						borderWidth:'5'
					},
					hours: {
						borderColor:$('.type-hours').attr('data-border-color'),
						borderWidth:'5'
					},
					days: {
						borderColor:$('.type-days').attr('data-border-color'),
						borderWidth:'5'
					}
				});
			}
		}

        /* Website Launch Date */
        var WebsiteLaunchDate = new Date();
        var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        WebsiteLaunchDate.setMonth(WebsiteLaunchDate.getMonth() + 1);
        var dateParts = dynamicDate.split('-');
        WebsiteLaunchDate = new Date(dateParts[0], dateParts[1] - 1, dateParts[2]);
        WebsiteLaunchDate = WebsiteLaunchDate.getDate() + " " + monthNames[WebsiteLaunchDate.getMonth()] + " " + WebsiteLaunchDate.getFullYear();
        /* Website Launch Date END */


        /* Handle Support ============ */
        var handleCommentReply = function () {
            jQuery('.w3-comment-reply').on('click', function (event) {
                event.preventDefault();

                var parent_id = $(this).data("commentid")
                var blog_id = $(this).data('postid');
                var replyto = $(this).data('replyto');
                var parent = $(this).parents('.comment .comment-body:first');

                $("#comment_parent").val(parent_id);
                $('#commentform').trigger("reset");
                $("#cancel-comment-reply").removeClass('d-none');
                $("#reply-title").parent().removeClass('d-none').addClass('d-block');
                $("#reply-title").html(replyto);
                $("#ReplyFormContainer").insertAfter(parent);

            });

            jQuery('#cancel-comment-reply').on('click', function (event) {

                event.preventDefault();

                $("#comment_parent").val(0);
                $("#reply-title").empty();
                $("#reply-title").parent().removeClass('d-block').addClass('d-none');
                $("#cancel-comment-reply").addClass('d-none');
                $("#ReplyFormContainer").appendTo('#comments-div');
            });
        }


        /* handleFooterBlogs ============ */
		/*For changing the design of this recent blogs in footer*/
		var handleFooterBlogs = function(){
			var ft = $('.footer-top');
			ft.find('.recent-posts-entry').removeClass('style-1');
            ft.find('h4.title').addClass('footer-title text-uppercase').removeClass('title');
            ft.find('h6.title a').addClass('text-white');
		}

        /* Function ============ */
        return {
            init: function () {
                handleFinalCountDown(WebsiteLaunchDate);
                handleCommentReply();
                handleFooterBlogs();
            },
        }
    }();

    /* Document.ready Start */
    jQuery(document).ready(function () {
        w3cms.init();
    });

})(jQuery);