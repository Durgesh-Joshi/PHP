    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php">MicroBlog</a>      
      <span><?php if($_SESSION['name'] != ''){
        echo "Welcome ", $_SESSION['name'];
      } ?></span>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="form-inline ml-auto my-2 my-lg-0" method="POST">
          <?php  
            if($_SESSION['name'] != '')
            {
          ?>
              <a href="NewPost.php" class="btn btn-outline-success my-2 mx-2 my-sm-0">
                <b>&#43;</b> New Post
              </a>
              <a href="profile.php" class="btn btn-outline-success my-2 mx-2 my-sm-0"> Profile </a>
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="logout" value="logout">Log Out</button>
          <?php
            }
            else
            {
          ?>
              <input class="form-control mr-sm-2" type="text" placeholder="Enter Username" name="username" required>
              <input class="form-control mr-sm-2" type="password" placeholder="Enter Password" name="password" required>
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="login" value="login">Login</button>          
              <a href="SignUp.php" class="btn btn-outline-success my-2 mx-2 my-sm-0">Sign Up</a>
          <?php
            }
          ?>                    
        </form>
      </div>
    </nav>