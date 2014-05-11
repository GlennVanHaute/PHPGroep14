<nav class="nav-sidebar">
      <ul class="nav">
                    <li class="active"><a href="javascript:;">Home</a></li>
                    <li><a href="javascript:;">About</a></li>
                    <li><a href="javascript:;">Products</a></li>
                    <li><a href="javascript:;">FAQ</a></li>
                    <li class="visibleeuh <?php  if(isset($_SESSION['admin']) == true) {echo block;}?>"><a href="javascript:;">foruser</a></li>
                    <li class="nav-divider"></li>
                    <li><a href="logout.php"><i class="glyphicon glyphicon-off"></i> Sign out</a></li>
                    <div class="row"><div class="fb-login-button" data-max-rows="1" data-size="large" data-show-faces="false" data-auto-logout-link="true"></div></div>

      </ul>
 </nav>