{{--<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}" defer></script>--}}
{{--<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>--}}
{{--<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>--}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
{{--<script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}" defer></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js" integrity="sha512-0QbL0ph8Tc8g5bLhfVzSqxe9GERORsKhIn1IrpxDAgUsbBGz/V7iSav2zzW325XGd1OMLdL4UiqRJj702IeqnQ==" crossorigin="anonymous"></script>
{{--<script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}" defer></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew==" crossorigin="anonymous"></script>
{{--<script src="{{ asset('assets/vendor/venobox/venobox.min.js') }}" defer></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/venobox/1.9.2/venobox.min.js" integrity="sha512-RTKtgpCMMgKKvDrJsyt5wdzR2IjHJiz/b2rsyBgm8qNeB3KPNdCvWkh9ytMcdAwu9qq8OX2fvy5wTyyA8sqXZw==" crossorigin="anonymous"></script>
{{--<script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}" defer></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
{{--<script src="{{ asset('assets/vendor/aos/aos.js') }}" defer></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw==" crossorigin="anonymous"></script>

{{--<script rel="text/javascript" src="{{ asset('assets/js/jquery.event.move.min.js') }}" defer></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.event.move/1.3.6/jquery.event.move.js" integrity="sha512-3BqqLnbFr1fTh7MGjLxRTs7K6t5vTwUWA5bYaGGI30qB599Gr+qCGbH08W66TYo+vwfywaB4ksLZNxN3hnpv9Q==" crossorigin="anonymous"></script>
<script rel="text/javascript" src="{{ asset('assets/js/jquery.twentytwenty.min.js') }}" defer></script>


<script language="javascript" type="text/javascript" src="{{ asset('assets/js/jquery.thooClock.min.js')}}" defer></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}" defer></script>

{{-- time --}}

<script language="javascript">
    var intVal, bd;

    var months=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];



    $(document).ready(function(){

        //clock plugin constructor
        $('#bd').thooClock({
            size:150,
            showNumerals:true,
            brandText:'THOOYORK',
            brandText2:'Germany',
            dialBackgroundColor:'transparent',
            minuteHandColor:'green',
            hourHandColor:'red',
            showNumerals:true,
            hourCorrection:'+0',
            onEverySecond:function(){
                //callback that should be fired every second
            }
        });

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            // add a zero in front of numbers<10
            m = checkTime(m);
            s = checkTime(s);

            var Meridiem=' AM';
            if(h>12)
            {
                h=h-12;
                Meridiem=' PM';
            }

            var month=months[today.getMonth()];
            var day=today.getDate();
            var year=today.getFullYear();

            document.getElementById('timeInBd').innerHTML = month+' '+day+', '+year+',&nbsp&nbsp&nbsp'+h + ":" + m + ":" + s + Meridiem;
            t = setTimeout(function() {
                startTime()
            }, 500);
        }

        startTime();

    });

</script>


<script language="javascript">
    var intVal, myclock;

    var months=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];



    $(document).ready(function(){

        //clock plugin constructor
        $('#myclock').thooClock({
            size:150,
            showNumerals:true,
            brandText:'THOOYORK',
            brandText2:'Germany',
            dialBackgroundColor:'transparent',
            minuteHandColor:'green',
            hourHandColor:'red',
            showNumerals:true,
            hourCorrection:'-5',
            onEverySecond:function(){

                //callback that should be fired every second
            }
        });

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

        function startTime() {

            var today = new Date();
            var time= today.toLocaleString('en-GB', { timeZone: 'Europe/London' });
            var timeArray=time.split(" ");

            var timeArray2=timeArray[1].split(':');

            var h = timeArray2[0];
            var m = timeArray2[1];
            var s = timeArray2[2];

            var Meridiem=' AM';

            if(h>12)
            {
                h=h-12;
                Meridiem=' PM';
            }

            dateArray=timeArray[0].split('/');

            var month=months[(dateArray[1]-1)];

            document.getElementById('timeInUK').innerHTML =month+' '+dateArray[0]+', '+dateArray[2]+'&nbsp&nbsp&nbsp'+h+':'+m+':'+s+Meridiem;

            t = setTimeout(function() {
                startTime()
            }, 500);

        }

        startTime();
    });

</script>

<script language="javascript">
    var intVal, am;

    var months=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];



    $(document).ready(function(){

        //clock plugin constructor
        $('#am').thooClock({
            size:150,
            showNumerals:true,
            brandText:'THOOYORK',
            brandText2:'Germany',
            dialBackgroundColor:'transparent',
            minuteHandColor:'green',
            hourHandColor:'red',
            showNumerals:true,
            hourCorrection:'-4',
            onEverySecond:function(){
                //callback that should be fired every second
            }
        });

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

        function startTime() {
            var today = new Date();
            var time;
            time= today.toLocaleString('en-GB', { timeZone: 'Europe/Rome' });

            var timeArray=time.split(" ");

            var timeArray2=timeArray[1].split(':');

            var h = timeArray2[0];
            var m = timeArray2[1];
            var s = timeArray2[2];

            var meridiem=' AM';

            if(h>12)
            {
                h=h-12;
                meridiem=' PM';
            }

            dateArray=timeArray[0].split('/');

            var month=months[(dateArray[1]-1)];

            document.getElementById('timeInItaly').innerHTML =month+' '+dateArray[0]+', '+dateArray[2]+'&nbsp&nbsp&nbsp'+h+':'+m+':'+s+meridiem;
            t = setTimeout(function() {
                startTime()
            }, 500);

        }

        startTime();
    });
</script>

<script language="javascript">

    var intVal, usa;

    var months=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

    $(document).ready(function(){
        $('#usa').thooClock({
            size:150,
            showNumerals:true,
            brandText:'THOOYORK',
            brandText2:'Germany',
            dialBackgroundColor:'transparent',
            minuteHandColor:'green',
            hourHandColor:'red',
            showNumerals:true,
            hourCorrection:'-10',
            onEverySecond:function(){
                //callback that should be fired every second
            }
        });

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

        function startTime() {
            var today = new Date();
            var time;
            time= today.toLocaleString('en-GB', { timeZone: 'America/New_York' });

            var timeArray=time.split(" ");

            var timeArray2=timeArray[1].split(':');

            var h = timeArray2[0];
            var m = timeArray2[1];
            var s = timeArray2[2];

            var meridiem=' AM';

            if(h>12)
            {
                h=h-12;
                meridiem=' PM';
            }

            dateArray=timeArray[0].split('/');

            var month=months[(dateArray[1]-1)];

            document.getElementById('timeInUSA').innerHTML =month+' '+dateArray[0]+', '+dateArray[2]+'&nbsp&nbsp&nbsp'+h+':'+m+':'+s+meridiem;
            t = setTimeout(function() {
                startTime()
            }, 500);

        }

        startTime();
    });
</script>


<!--Russia time zone-->

<script language="javascript">
    var intVal, Russia;

    var months=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

    $(document).ready(function(){
        $('#Russia').thooClock({
            size:150,
            showNumerals:true,
            brandText:'THOOYORK',
            brandText2:'Germany',
            dialBackgroundColor:'transparent',
            minuteHandColor:'green',
            hourHandColor:'red',
            showNumerals:true,
            hourCorrection:'-3',
            onEverySecond:function(){
                //callback that should be fired every second
            }
        });

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

        function startTime() {
            var today = new Date();
            var time;
            time= today.toLocaleString('en-GB', { timeZone: 'Europe/Moscow' });

            var timeArray=time.split(" ");

            var timeArray2=timeArray[1].split(':');

            var h = timeArray2[0];
            var m = timeArray2[1];
            var s = timeArray2[2];

            var meridiem=' AM';

            if(h>12)
            {
                h=h-12;
                meridiem=' PM';
            }

            dateArray=timeArray[0].split('/');

            var month=months[(dateArray[1]-1)];

            document.getElementById('timeInRussia').innerHTML =month+' '+dateArray[0]+', '+dateArray[2]+'&nbsp&nbsp&nbsp'+h+':'+m+':'+s+meridiem;
            t = setTimeout(function() {
                startTime()
            }, 500);

        }

        startTime();
    });
</script >

<!-- <script>
    $(document).ready(function(){
    $('#Russia').thooClock({
                size:150,
                showNumerals:true,
                brandText:'THOOYORK',
                brandText2:'Germany',
                dialBackgroundColor:'transparent',
                minuteHandColor:'green',
                hourHandColor:'red',
                showNumerals:true,
                hourCorrection:'-3',
                onEverySecond:function(){
                        //callback that should be fired every second
                    }
                });

            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i;
                }
                return i;
            }

            function startTime() {
                var today = new Date();
                var time;
                // time= today.toLocaleString('en-GB', { timeZone: 'Asia/Russia' });
                // console.log(time);

                // var timeArray=time.split(" ");

                // var timeArray2=timeArray[1].split(':');

                // var h = timeArray2[0];
                // var m = timeArray2[1];
                // var s = timeArray2[2];

                // var meridiem=' AM';

                // if(h>12)
                // {
                //      h=h-12;
                //      meridiem=' PM';
                // }

                // dateArray=timeArray[0].split('/');

                // var month=months[(dateArray[1]-1)];

                // document.getElementById('timeInUSA').innerHTML =month+' '+dateArray[0]+', '+dateArray[2]+'&nbsp&nbsp&nbsp'+h+':'+m+':'+s+meridiem;
                // t = setTimeout(function() {
                // startTime()
                // }, 500);

            }

            startTime();
    });
</script> -->

<!--Gurmany-->

<script language="javascript">
    var intVal, Grumany;

    var months=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    $(document).ready(function(){
        $('#Grumany').thooClock({
            size:150,
            showNumerals:true,
            brandText:'THOOYORK',
            brandText2:'Germany',
            dialBackgroundColor:'transparent',
            minuteHandColor:'green',
            hourHandColor:'red',
            showNumerals:true,
            hourCorrection:'-16',
            onEverySecond:function(){
                //callback that should be fired every second
            }
        });

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

        function startTime() {
            var today = new Date();
            var time;
            time= today.toLocaleString('en-GB', { timeZone: 'Europe/Berlin' });
            console.log(time);

            var timeArray=time.split(" ");

            var timeArray2=timeArray[1].split(':');

            var h = timeArray2[0];
            var m = timeArray2[1];
            var s = timeArray2[2];

            var meridiem=' AM';

            if(h>12)
            {
                h=h-12;
                meridiem=' PM';
            }

            dateArray=timeArray[0].split('/');

            var month=months[(dateArray[1]-1)];

            document.getElementById('timeInGrumany').innerHTML =month+' '+dateArray[0]+', '+dateArray[2]+'&nbsp&nbsp&nbsp'+h+':'+m+':'+s+meridiem;
            t = setTimeout(function() {
                startTime()
            }, 500);

        }

        startTime();
    });
</script>

<!--Swedin-->

<script language="javascript">
    var intVal, sweden;

    var months=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    $(document).ready(function(){
        $('#sweden').thooClock({
            size:150,
            showNumerals:true,
            brandText:'THOOYORK',
            brandText2:'Germany',
            dialBackgroundColor:'transparent',
            minuteHandColor:'green',
            hourHandColor:'red',
            showNumerals:true,
            hourCorrection:'-16',
            onEverySecond:function(){
                //callback that should be fired every second
            }
        });

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

        function startTime() {
            var today = new Date();
            var time;
            time= today.toLocaleString('en-GB', { timeZone: 'Europe/Stockholm' });
            console.log(time);

            var timeArray=time.split(" ");

            var timeArray2=timeArray[1].split(':');

            var h = timeArray2[0];
            var m = timeArray2[1];
            var s = timeArray2[2];

            var meridiem=' AM';

            if(h>12)
            {
                h=h-12;
                meridiem=' PM';
            }

            dateArray=timeArray[0].split('/');

            var month=months[(dateArray[1]-1)];

            document.getElementById('timeInsweden').innerHTML =month+' '+dateArray[0]+', '+dateArray[2]+'&nbsp&nbsp&nbsp'+h+':'+m+':'+s+meridiem;
            t = setTimeout(function() {
                startTime()
            }, 500);

        }

        startTime();
    });
</script>

<!--brazil-->

<script language="javascript">
    var intVal, brazil;

    var months=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    $(document).ready(function(){
        $('#brazil').thooClock({
            size:150,
            showNumerals:true,
            brandText:'THOOYORK',
            brandText2:'Germany',
            dialBackgroundColor:'transparent',
            minuteHandColor:'green',
            hourHandColor:'red',
            showNumerals:true,
            hourCorrection:'-9',
            onEverySecond:function(){
                //callback that should be fired every second
            }
        });

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

        function startTime() {
            var today = new Date();
            var time;
            time= today.toLocaleString('en-GB', { timeZone: 'America/Sao_Paulo' });
            console.log(time);

            var timeArray=time.split(" ");

            var timeArray2=timeArray[1].split(':');

            var h = timeArray2[0];
            var m = timeArray2[1];
            var s = timeArray2[2];

            var meridiem=' AM';

            if(h>12)
            {
                h=h-12;
                meridiem=' PM';
            }

            dateArray=timeArray[0].split('/');

            var month=months[(dateArray[1]-1)];

            document.getElementById('timeInbrazil').innerHTML =month+' '+dateArray[0]+', '+dateArray[2]+'&nbsp&nbsp&nbsp'+h+':'+m+':'+s+meridiem;
            t = setTimeout(function() {
                startTime()
            }, 500);

        }

        startTime();
    });
</script>

<!--canada-->
<script language="javascript">
    $(document).ready(function(){
        $('#canada').thooClock({
            size:150,
            showNumerals:true,
            brandText:'THOOYORK',
            brandText2:'Germany',
            dialBackgroundColor:'transparent',
            minuteHandColor:'green',
            hourHandColor:'red',
            showNumerals:true,
            hourCorrection:'-10',
            onEverySecond:function(){
                //callback that should be fired every second
            }
        });

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

        function startTime() {
            var today = new Date();
            var time;
            time= today.toLocaleString('en-GB', { timeZone: 'America/Toronto' });
            console.log(time);

            var timeArray=time.split(" ");

            var timeArray2=timeArray[1].split(':');

            var h = timeArray2[0];
            var m = timeArray2[1];
            var s = timeArray2[2];

            var meridiem=' AM';

            if(h>12)
            {
                h=h-12;
                meridiem=' PM';
            }

            dateArray=timeArray[0].split('/');

            var month=months[(dateArray[1]-1)];

            document.getElementById('timeIncanada').innerHTML =month+' '+dateArray[0]+', '+dateArray[2]+'&nbsp&nbsp&nbsp'+h+':'+m+':'+s+meridiem;
            t = setTimeout(function() {
                startTime()
            }, 500);

        }

        startTime();
    });
</script>

<!--australia-->

<script language="javascript">
    $(document).ready(function(){
        $('#australia').thooClock({
            size:150,
            showNumerals:true,
            brandText:'THOOYORK',
            brandText2:'Germany',
            dialBackgroundColor:'transparent',
            minuteHandColor:'green',
            hourHandColor:'red',
            showNumerals:true,
            hourCorrection:'-8',
            onEverySecond:function(){
                //callback that should be fired every second
            }
        });

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

        function startTime() {
            var today = new Date();
            var time;
            time= today.toLocaleString('en-GB', { timeZone: 'Australia/Sydney' });
            console.log(time);

            var timeArray=time.split(" ");

            var timeArray2=timeArray[1].split(':');

            var h = timeArray2[0];
            var m = timeArray2[1];
            var s = timeArray2[2];

            var meridiem=' AM';

            if(h>12)
            {
                h=h-12;
                meridiem=' PM';
            }

            dateArray=timeArray[0].split('/');

            var month=months[(dateArray[1]-1)];

            document.getElementById('timeInaustralia').innerHTML =month+' '+dateArray[0]+', '+dateArray[2]+'&nbsp&nbsp&nbsp'+h+':'+m+':'+s+meridiem;
            t = setTimeout(function() {
                startTime()
            }, 500);

        }

        startTime();
    });
</script>


<!--french-->

<script language="javascript">
    $(document).ready(function(){
        $('#french').thooClock({
            size:150,
            showNumerals:true,
            brandText:'THOOYORK',
            brandText2:'Germany',
            dialBackgroundColor:'transparent',
            minuteHandColor:'green',
            hourHandColor:'red',
            showNumerals:true,
            hourCorrection:'-4',
            onEverySecond:function(){
                //callback that should be fired every second
            }
        });

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

        function startTime() {
            var today = new Date();
            var time;
            time= today.toLocaleString('en-GB', { timeZone: 'Europe/Paris' });
            console.log(time);

            var timeArray=time.split(" ");

            var timeArray2=timeArray[1].split(':');

            var h = timeArray2[0];
            var m = timeArray2[1];
            var s = timeArray2[2];

            var meridiem=' AM';

            if(h>12)
            {
                h=h-12;
                meridiem=' PM';
            }

            dateArray=timeArray[0].split('/');

            var month=months[(dateArray[1]-1)];

            document.getElementById('timeInfrench').innerHTML =month+' '+dateArray[0]+', '+dateArray[2]+'&nbsp&nbsp&nbsp'+h+':'+m+':'+s+meridiem;
            t = setTimeout(function() {
                startTime()
            }, 500);

        }

        startTime();
    });
</script>

<!--spain-->

<script language="javascript">
    $(document).ready(function(){
        $('#spain').thooClock({
            size:150,
            showNumerals:true,
            brandText:'THOOYORK',
            brandText2:'Germany',
            dialBackgroundColor:'transparent',
            minuteHandColor:'green',
            hourHandColor:'red',
            showNumerals:true,
            hourCorrection:'-4',
            onEverySecond:function(){
                //callback that should be fired every second
            }
        });

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

        function startTime() {
            var today = new Date();
            var time;
            time= today.toLocaleString('en-GB', { timeZone: 'Europe/Madrid' });
            console.log(time);

            var timeArray=time.split(" ");

            var timeArray2=timeArray[1].split(':');

            var h = timeArray2[0];
            var m = timeArray2[1];
            var s = timeArray2[2];

            var meridiem=' AM';

            if(h>12)
            {
                h=h-12;
                meridiem=' PM';
            }

            dateArray=timeArray[0].split('/');

            var month=months[(dateArray[1]-1)];

            document.getElementById('timeInspain').innerHTML =month+' '+dateArray[0]+', '+dateArray[2]+'&nbsp&nbsp&nbsp'+h+':'+m+':'+s+meridiem;
            t = setTimeout(function() {
                startTime()
            }, 500);

        }

        startTime();
    });
</script>

<!--mexico-->

<script language="javascript">
    $(document).ready(function(){
        $('#mexico').thooClock({
            size:150,
            showNumerals:true,
            brandText:'THOOYORK',
            brandText2:'Germany',
            dialBackgroundColor:'transparent',
            minuteHandColor:'green',
            hourHandColor:'red',
            showNumerals:true,
            hourCorrection:'-11',
            onEverySecond:function(){
                //callback that should be fired every second
            }
        });

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

        function startTime() {
            var today = new Date();
            var time;
            time= today.toLocaleString('en-GB', { timeZone: 'America/Mexico_City' });
            console.log(time);

            var timeArray=time.split(" ");

            var timeArray2=timeArray[1].split(':');

            var h = timeArray2[0];
            var m = timeArray2[1];
            var s = timeArray2[2];

            var meridiem=' AM';

            if(h>12)
            {
                h=h-12;
                meridiem=' PM';
            }

            dateArray=timeArray[0].split('/');

            var month=months[(dateArray[1]-1)];

            document.getElementById('timeInmexico').innerHTML =month+' '+dateArray[0]+', '+dateArray[2]+'&nbsp&nbsp&nbsp'+h+':'+m+':'+s+meridiem;
            t = setTimeout(function() {
                startTime()
            }, 500);

        }

        startTime();
    });
</script>
<!--Turkey-->

<script language="javascript">
    $(document).ready(function(){
        $('#Turkey').thooClock({
            size:150,
            showNumerals:true,
            brandText:'THOOYORK',
            brandText2:'Germany',
            dialBackgroundColor:'transparent',
            minuteHandColor:'green',
            hourHandColor:'red',
            showNumerals:true,
            hourCorrection:'-3',
            onEverySecond:function(){
                //callback that should be fired every second
            }
        });

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

        function startTime() {
            var today = new Date();
            var time;
            time= today.toLocaleString('en-GB', { timeZone: 'Europe/Istanbul' });
            console.log(time);

            var timeArray=time.split(" ");

            var timeArray2=timeArray[1].split(':');

            var h = timeArray2[0];
            var m = timeArray2[1];
            var s = timeArray2[2];

            var meridiem=' AM';

            if(h>12)
            {
                h=h-12;
                meridiem=' PM';
            }

            dateArray=timeArray[0].split('/');

            var month=months[(dateArray[1]-1)];

            document.getElementById('timeInTurkey').innerHTML =month+' '+dateArray[0]+', '+dateArray[2]+'&nbsp&nbsp&nbsp'+h+':'+m+':'+s+meridiem;
            t = setTimeout(function() {
                startTime()
            }, 500);

        }

        startTime();
    });
</script>

<!--SouthAfrica-->

<script language="javascript">
    $(document).ready(function(){
        $('#SouthAfrica').thooClock({
            size:150,
            showNumerals:true,
            brandText:'THOOYORK',
            brandText2:'Germany',
            dialBackgroundColor:'transparent',
            minuteHandColor:'green',
            hourHandColor:'red',
            showNumerals:true,
            hourCorrection:'-4',
            onEverySecond:function(){
                //callback that should be fired every second
            }
        });

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

        function startTime() {
            var today = new Date();
            var time;
            time= today.toLocaleString('en-GB', { timeZone: 'Africa/Johannesburg' });
            console.log(time);

            var timeArray=time.split(" ");

            var timeArray2=timeArray[1].split(':');

            var h = timeArray2[0];
            var m = timeArray2[1];
            var s = timeArray2[2];

            var meridiem=' AM';

            if(h>12)
            {
                h=h-12;
                meridiem=' PM';
            }

            dateArray=timeArray[0].split('/');

            var month=months[(dateArray[1]-1)];

            document.getElementById('timeInSouthAfrica').innerHTML =month+' '+dateArray[0]+', '+dateArray[2]+'&nbsp&nbsp&nbsp'+h+':'+m+':'+s+meridiem;
            t = setTimeout(function() {
                startTime()
            }, 500);

        }

        startTime();
    });
</script>

<script language="javascript">
    $(document).ready(function(){
        $('#portugal').thooClock({
            size:150,
            showNumerals:true,
            brandText:'THOOYORK',
            brandText2:'Germany',
            dialBackgroundColor:'transparent',
            minuteHandColor:'green',
            hourHandColor:'red',
            showNumerals:true,
            hourCorrection:'-5',
            onEverySecond:function(){
                //callback that should be fired every second
            }
        });

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

        function startTime() {
            var today = new Date();
            var time;
            time= today.toLocaleString('en-GB', { timeZone: 'Europe/Lisbon' });
            console.log(time);

            var timeArray=time.split(" ");

            var timeArray2=timeArray[1].split(':');

            var h = timeArray2[0];
            var m = timeArray2[1];
            var s = timeArray2[2];

            var meridiem=' AM';

            if(h>12)
            {
                h=h-12;
                meridiem=' PM';
            }

            dateArray=timeArray[0].split('/');

            var month=months[(dateArray[1]-1)];

            document.getElementById('timeInSouthPortugal').innerHTML =month+' '+dateArray[0]+', '+dateArray[2]+'&nbsp&nbsp&nbsp'+h+':'+m+':'+s+meridiem;
            t = setTimeout(function() {
                startTime()
            }, 500);

        }

        startTime();
    });


</script>

{{-- end time --}}


<script>
    function onSubmit(token) {
        document.getElementById("demo-form").submit();
    }
    $(window).on('load',function() {
        $(".twentytwenty-container").twentytwenty({
            default_offset_pct: 0.5, // How much of the before image is visible when the page loads
            orientation: 'horizontal', // Orientation of the before and after images ('horizontal' or 'vertical')
            // before_label: 'January 2017', // Set a custom before label
            // after_label: 'March 2017', // Set a custom after label
            // no_overlay: true, //Do not show the overlay with before and after
            move_slider_on_hover: true, // Move slider on mouse hover?
            move_with_handle_only: true, // Allow a user to swipe anywhere on the image to control slider movement.
            click_to_move: true // Allow a user to click (or tap) anywhere on the image to move the slider to that location.
        });
        $('a[data-toggle="tab"]').on('shown.bs.tab', function () {
            console.log('helad');
            $(".twentytwenty-container[data-orientation!='vertical']").trigger('resize').twentytwenty({
                default_offset_pct: 0.5, // How much of the before image is visible when the page loads
                orientation: 'horizontal', // Orientation of the before and after images ('horizontal' or 'vertical')
                // before_label: 'January 2017', // Set a custom before label
                // after_label: 'March 2017', // Set a custom after label
                // no_overlay: true, //Do not show the overlay with before and after
                move_slider_on_hover: true, // Move slider on mouse hover?
                move_with_handle_only: true, // Allow a user to swipe anywhere on the image to control slider movement.
                click_to_move: true // Allow a user to click (or tap) anywhere on the image to move the slider to that location.
            });
        });
    });

    // $(function(){
    //     $(".twentytwenty-container").twentytwenty({
    //         default_offset_pct: 0.5, // How much of the before image is visible when the page loads
    //         orientation: 'horizontal', // Orientation of the before and after images ('horizontal' or 'vertical')
    //         // before_label: 'January 2017', // Set a custom before label
    //         // after_label: 'March 2017', // Set a custom after label
    //         // no_overlay: true, //Do not show the overlay with before and after
    //         move_slider_on_hover: true, // Move slider on mouse hover?
    //         move_with_handle_only: true, // Allow a user to swipe anywhere on the image to control slider movement.
    //         click_to_move: true // Allow a user to click (or tap) anywhere on the image to move the slider to that location.
    //     });
    // });
    // $(window).on('load',function() {
    //     $(".twentytwenty-container").twentytwenty();
    // });

</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    @if(Session::has('success'))
    toastr.success('{{ Session::get('success') }}');
    @elseif(Session::has('info'))
    toastr.info('{{ Session::get('info') }}');
    @elseif(Session::has('error'))
    toastr.error('{{ Session::get('error') }}');
    @elseif(Session::has('errors'))
    toastr.error('{!! implode('', $errors->all('<div>:message</div>')) !!}');
    @endif
</script>
