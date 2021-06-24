<script>
    paceOptions = {
        catchupTime: 100,
        initialRate: .03,
        minTime: 250,
        ghostTime: 100,
        maxProgressPerFrame: 20,
        easeFactor: 1.25,
        startOnPageLoad: true,
        restartOnPushState: true,
        restartOnRequestAfter: 500,
        target: 'body',
        elements: {
            checkInterval: 100,
            selectors: ['body']
        },
        eventLag: {
            minSamples: 10,
            sampleCount: 3,
            lagThreshold: 3
        },
        ajax: {
            trackMethods: ['GET'],
            trackMethods: ['POST'],
            trackWebSockets: true,
            ignoreURLs: []
        }
    }
</script>
<script src="{{ mix('dist/js/app.js') }}"></script>
@include('sweetalert::alert')

<script>
    $(document).ready(function() {
            $(window).scroll(function() {
            // checks if window is scrolled more than 500px, adds/removes solid class
                if($(this).scrollTop()) { 
                    $('.navbar').addClass('navbar-white');
                    $('.navbar').addClass('navbar-light');
                    $('.navbar').removeClass('navbar-transparent');
                } else {
                    $('.navbar').addClass('navbar-transparent');
                    $('.navbar').removeClass('navbar-white');
                    $('.navbar').removeClass('navbar-light');
                }
            });
        });

        (function($) {
        /** change value here to adjust parallax level */
        var parallax = -0.5;

        var $bg_images = $(".page-header");
        var offset_tops = [];
        $bg_images.each(function(i, el) {
            offset_tops.push($(el).offset().top);
        });

        $(window).scroll(function() {
            var dy = $(this).scrollTop();
            $bg_images.each(function(i, el) {
            var ot = offset_tops[i];
            $(el).css("background-position", "50% " + (dy - ot) * parallax + "px");
            });
        });
        })(jQuery);
    
</script>
@stack('scripts')