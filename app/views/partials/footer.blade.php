<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script >
<script >window.jQuery || document.write('<script src="{{asset('assets/minified/jquery.min.js')}}"><\/script>')</script >
<script src="{{asset('assets/minified/application.min.js')}}" ></script >

<script src="{{asset('js/popcorn.js')}}"> </script>
<script src="{{asset('js/popcorn.capture.js')}}"> </script>

<script type="text/javascript">

$('video').each(function(){

var video = Popcorn($(this));

// Once the video has loaded into memory, we can capture the poster
video.on( "canplayall", function() {

  this.currentTime( 100 ).capture();

});

});



</script>
 
@yield('page-script')
<?php echo html_entity_decode(Setting::where('option', '=', 'footer_code')->first()->value); ?>


</body>
</html>
