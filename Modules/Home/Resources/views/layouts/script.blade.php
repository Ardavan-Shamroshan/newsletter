<script src="{{ asset('modules/home/assets/ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js') }}"></script>
<script src="{{ asset('modules/home/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('modules/home/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('modules/home/assets/js/video.min.js') }}"></script>
<script src="{{ asset('modules/home/assets/js/all.min.js') }}"></script>
<script src="{{ asset('modules/home/assets/js/themejs.js') }}"></script>
<script src="{{ asset('modules/home/assets/js/getNotification.js') }}"></script>
<script src="{{ asset('modules/home/assets/js/carousel.js') }}"></script>
<script src="{{ asset('modules/home/assets/js/tooltip.js') }}"></script>


<script type="text/javascript">
    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        // add a zero in front of numbers < 10
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('txt').innerHTML = h + ":" + m + ":" + s;
        t = setTimeout('startTime()', 500);
    }

    function checkTime(i) {
        if (i < 10)
            i = "0" + i;
        return i;
    }
</script>
