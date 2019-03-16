    <footer id="footer">
      <div class="container">
      	<div class="row">
          <div class="footer-wrapper">
            <div class="col-md-3 col-sm-3">
              <a href=""><img src="images/logo-black.png" alt="" class="footer-logo" /></a>
              <ul class="list-inline social-icons">
              	<li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
              	<li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
              	<li><a href="#"><i class="icon ion-social-googleplus"></i></a></li>
              	<li><a href="#"><i class="icon ion-social-pinterest"></i></a></li>
              	<li><a href="#"><i class="icon ion-social-linkedin"></i></a></li>
              </ul>
            </div>
            <div class="col-md-2 col-sm-2">
              <h5>For individuals</h5>
              <ul class="footer-links">
                <li><a href="">Signup</a></li>
                <li><a href="">login</a></li>
                <li><a href="">Explore</a></li>
                <li><a href="">Finder app</a></li>
                <li><a href="">Features</a></li>
                <li><a href="">Language settings</a></li>
              </ul>
            </div>
            <div class="col-md-2 col-sm-2">
              <h5>For businesses</h5>
              <ul class="footer-links">
                <li><a href="">Business signup</a></li>
                <li><a href="">Business login</a></li>
                <li><a href="">Benefits</a></li>
                <li><a href="">Resources</a></li>
                <li><a href="">Advertise</a></li>
                <li><a href="">Setup</a></li>
              </ul>
            </div>
            <div class="col-md-2 col-sm-2">
              <h5>About</h5>
              <ul class="footer-links">
                <li><a href="">About us</a></li>
                <li><a href="">Contact us</a></li>
                <li><a href="">Privacy Policy</a></li>
                <li><a href="">Terms</a></li>
                <li><a href="">Help</a></li>
              </ul>
            </div>
            <div class="col-md-3 col-sm-3">
              <h5>Contact Us</h5>
              <ul class="contact">
                <li><i class="icon ion-ios-telephone-outline"></i>+1 (234) 222 0754</li>
                <li><i class="icon ion-ios-email-outline"></i>info@thunder-team.com</li>
                <li><i class="icon ion-ios-location-outline"></i>228 Park Ave S NY, USA</li>
              </ul>
            </div>
          </div>
      	</div>
      </div>
      <div class="copyright">
        <p>Thunder Team © 2016. All rights reserved</p>
      </div>
		</footer>
    
    <!--preloader-->
    <div id="spinner-wrapper">
      <div class="spinner"></div>
    </div>
    
    <!-- Scripts
    ================================================= -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTMXfmDn0VlqWIyoOxK8997L-amWbUPiQ&callback=initMap"></script>
    <script src="{{ url('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/jquery.sticky-kit.min.js') }}"></script>
    <script src="{{ url('js/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ url('js/script.js') }}"></script>
    <!-- <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> -->
    <script src="{{ url('js/bootstrap-suggest.js') }}"></script>
    <script src="{{ url('js/dropzone.min.js') }}"></script>

    <script>
      var users;
      function getusersatdata() {
      $.get("{{ url('api/user', session()->get('id')) }}", function (data) {
        // let users = JSON.parse(data);
        var users = data;
        // var users = [
        //   {username: 'lodev09', fullname: 'Jovanni Lo'},
        //   {username: 'foo', fullname: 'Foo User'},
        //   {username: 'bar', fullname: 'Bar User'},
        //   {username: 'twbs', fullname: 'Twitter Bootstrap'},
        //   {username: 'john', fullname: 'John Doe'},
        //   {username: 'jane', fullname: 'Jane Doe'},
        // ];

      // console.log(users);
      });
      }
      users = $.get("{{ url('api/user', session()->get('id')) }}", function (data) {
            // let datas = JSON.parse(data);
            // console.log(data);
            return data;
          });
      // let dd = getusersatdata();
      // console.log(dd);
        $('textarea').suggest('@', {
          data: users,
          map: function(user) {
            return {
              value: user.user_name,
              text: '<a class="list-item" href="'+user.user_name+'"><strong>'+user.user_name+'</strong> <small>'+user.first_name+' '+user.last_name+'</small></a><br />'
            }
          }
        })
        $('textarea').suggest('#', {
          data: users,
          filter: {
              casesensitive: true,
              limit: 10
            },
          map: function(user) {
            return {
              value: user.user_name,
              text: '<a class="list-item" href="'+user.user_name+'"><strong>'+user.user_name+'</strong> <small>'+user.first_name+' '+user.last_name+'</small></a><br />'
            }
          }
        })

    </script>
  </body>
</html>











