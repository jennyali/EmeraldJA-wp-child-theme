
/**
 * CHILD THEMES MAIN SCRIPT FILE
 */

(function($) {

/**
 *      MODEL
 */



 /**
  *     VIEW
  */

    

    // SELECTORS

    var $childPortArchiveContent    = $('#archive-portfolio-post-content');
    var $childPortArchiveNavLinks   = $('.archive-nav-wrapper .navbar li a');
    var $childPortarchivePagination = $('.post-type-archive-portfolio_post .pagination-wrapper');


    // EVENTS

    $childPortArchiveNavLinks.on({
        'click' : function(event) {

            //event.preventDefault();


            //var $current_topic_term = $(this).attr('title');

            //childPortArchiveHandler($current_topic_term);

        }
    });


  /**
   *    CONTROLLER
   */

   function childPortArchiveHandler(current_topic) {

        var $topic_term = current_topic;

       $.ajax({
            url: ajaxportfolio.ajaxurl,
            type: 'post',
            data: {
                action: 'ajax_archive_portfolio',
                query_vars: ajaxportfolio.query_vars,
                topic_term: $topic_term,
            },
            success: function( result ) {

                $childPortArchiveContent.empty();
                //$childPortarchivePagination.empty();

                $childPortArchiveContent.append( result );

            }
       });

   }


})( jQuery );