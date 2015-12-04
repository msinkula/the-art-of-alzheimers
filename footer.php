    </article>

    <div class="footer-container">

    <footer>

      <?php wp_nav_menu( array(

      'theme_location' => 'main-menu',

      'container' => 'div',

      'container_id' => 'footer-navigation',

      'items_wrap' => '<ul id="footer-navigation-items" class="lower-nav">%3$s</ul>', ) ); ?>

     <div>

        <ul class="social">

          <li><a href="https://www.facebook.com/TheArtOfAlzheimers" target="_blank"><i class="fa fa-facebook fa-2x"></i></a></li>

          <li><a href=""><i class="fa fa-twitter-square fa-2x"></i></a></li>

          <li><a href="http://www.theartofalzheimers.net/wp/email/"> Sign-up for email list</a></li>

        <ul>

      </div>

    </footer>

  </div>

  <?php wp_footer(); ?>

  <script>

    $(window).load(function() {

      $('.flexslider').flexslider({

        animation: "slide",
		smoothHeight: true,

      });

    });

  </script>





<script>

$(window).load(function(){

  $('#navigation-items').append('<li class="hidden-donate"><a href="https://co.clickandpledge.com/sp/d1/default.aspx?wid=109053" target="_blank">Donate</a><li>');

  $('.hidden-donate').hide();



$(window).width(function() {

  var $window = $(window);

  if($window.width() < 852){

    $('.hidden-donate').show();

    $('.donate').hide();

  } else {

    $('.hidden-donate').hide();

    $('.donate').show();

  }

  $(window).resize(function(){

    var $window = $(window);

    if($window.width() < 852){

      $('.hidden-donate').show();

      $('.donate').hide();

    } else {

      $('.hidden-donate').hide();

      $('.donate').show();

    }

  });

 });

});

</script>

</body>

</html>

