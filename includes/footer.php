
<footer>
  <div class="footer-container">
  <?php wp_nav_menu( array(
  'theme_location' => 'main-menu',
  'container' => 'div',
  'container_id' => 'footer-navigation',
  'items_wrap' => '<ul id="footer-navigation-items" class="lower-nav">%3$s</ul>', ) ); ?>
  <div>
  <ul class="social">
      <li><a href="https://www.facebook.com/TheArtOfAlzheimers" target="_blank"><i class="fa fa-facebook fa-2x"></i></a></li>
      <li><a href=""><i class="fa fa-twitter-square fa-2x"></i></a></li>
      <li>
        <form>
          <input type="text" placeholder="janesmith@example.com">
          <button type="submit">sign-up</button>
        </form>
      </li>
  </ul>
  </div>
  </div><!--end footer-container-->
</footer>

</body>
</html>
