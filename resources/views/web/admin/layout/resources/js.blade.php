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
<script src="{{ asset('dist/js/app.js') }}"></script>

@include('sweetalert::alert')
@stack('scripts')