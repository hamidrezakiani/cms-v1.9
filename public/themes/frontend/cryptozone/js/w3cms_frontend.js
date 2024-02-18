(function ($) {
    "use strict";

    var w3cms = function () {
        /* Countdown ============ */
        var handleCountDown = function () {
            
            /* Website Launch Date */
            var WebsiteLaunchDate = new Date();
            var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            WebsiteLaunchDate.setMonth(WebsiteLaunchDate.getMonth() + 1);
            var dateParts = dynamicDate.split('-');
            WebsiteLaunchDate = new Date(dateParts[0], dateParts[1] - 1, dateParts[2]);
            WebsiteLaunchDate = WebsiteLaunchDate.getDate() + " " + monthNames[WebsiteLaunchDate.getMonth()] + " " + WebsiteLaunchDate.getFullYear();
            /* Website Launch Date END */

            if ($(".countdown").length) {
                    $('.countdown').countdown({ date: WebsiteLaunchDate + ' 00:00' }, function () {
                        $('.countdown').text('we are live');
                    });
            }
            /* Time Countr Down Js End */
        }


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

        // handleAjaxLoadMore
        var handleAjaxLoadMore = function() {
			jQuery('.el-ajax-load-more').on('click', function() {
				var ajax_url = baseUrl+'/admin/magic_editors/ajax_load_more';
				var order = jQuery(this).data('order');
				var orderby = jQuery(this).data('orderby');	
				var no_of_posts = jQuery(this).data('no-of-posts');	
				var post_with_images = jQuery(this).data('post_with_images');	
				var post_category_ids = jQuery(this).data('post_category_ids');	
				var ajax_container = jQuery(this).data('ajax-container');
				var ajax_view = jQuery(this).data('ajax-view');
				var data_current_page = jQuery(this).data('current-page');
				var thisObj = jQuery(this);
				var indexOf = jQuery('.el-ajax-load-more[data-ajax-container="'+ajax_container+'"]').index(this);
				var data = {};
				
				if (order != undefined) { data.order = order;	}
				if (orderby != undefined) { data.orderby = orderby;	}
				if (ajax_view != undefined) { data.ajax_view = ajax_view;	}
				if (no_of_posts != undefined) { data.no_of_posts = no_of_posts;	}
				if (post_with_images != undefined) { data.post_with_images = post_with_images;	}
				if (post_category_ids != undefined) { data.post_category_ids = post_category_ids;	}
				if (data_current_page != undefined) { data.page = data_current_page;	}
				jQuery.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					type: 'Post',
					url: ajax_url,
					data: data,
					success : function(response)
					{
						if (response.html) {

							jQuery('.' + ajax_container).eq(indexOf).append(response.html);
							
					        // Check if there are more pages to load
					        if (response.has_more_pages) {
								data_current_page++;
					            thisObj.data('current-page',data_current_page);
								
					        } else {
					            // No more posts to load
					            $(thisObj).text('No More Posts');
					            $(thisObj).prop('disabled', true).addClass('disabled');
					        }

						}
						else {
				          	alert('Failed to load more posts.');
				        }
					}
				});
			});
		}

        /* Function ============ */
        return {
            init: function () {
                if($('.countdown').length > 0){
                    handleCountDown();
                }
                handleCommentReply();
                handleAjaxLoadMore();
            },
        }
    }();

    /* Document.ready Start */
    jQuery(document).ready(function () {
        w3cms.init();
    });

})(jQuery);