<?php
  //createEvent
  include("connect.inc.php");
  if (isset($_GET['success'])){
    //Will go to the page just created
  }
  if (isset($_GET['create'])){
    extract($_POST);

    $uemail = $_SESSION['email'];
    $query = "SELECT * FROM users WHERE email = '$uemail'";
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();

    $location = $loc;
    $uid = $row['id'];
    $img = $row['profile_img'];

    if(strcmp($row['fb_link'],'No link')==0){
      echo "An event host must enter a valid Facebook link into their profile.";
    }
    else{
      $sTime = $month.'-'.$day.'-'.$hour1.'-'.$minute1;
      $etime = $month.'-'.$day.-'-'.$hour2.'-'.$minute2;
      $query2 = "INSERT INTO events (user_id, image, location, start_time, end_time, description) VALUES ('$uid', '$img', '$location', '$sTime', '$eTime', '$desc')";
      $result = $mysqli->query($query2);
      /*$returnedQuery= $mysqli->query($query);
      if(!$returnedQuery){
        $mysqli->error;
        echo $query;
      }*/
    }
  }
?>
<!doctype html>
<head>
  <title>Create an Event</title>
  <head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>

    <link type="text/css" rel="stylesheet" href="./css/websys-site.css"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
</head>

<body class="brown lighten-5">
    <div class="navbar-fixed">
      <nav class="brown darken-2">
        <div class="container">
          <div class="nav-wrapper">
            <a href="landing.html" class="brand-logo left"><img src="./images/cc-logo.png"></a>
            <ul class="right hide-on-med-and-down">
              <li><a href="about.html">About</a></li>
              <li><a href="meetups.html">Meetups</a></li>
              <li><a href="login.html">Login</a></li>
              <a class="waves-effect waves-light btn orange darken-4" href="signup.html">Sign Up</a>
            </ul>
          </div>
        </div>
      </nav>
    </div>

   <main>
      <div class="container">
        <div class="row">
          <div class="section">
            <div class="col s8 offset-s2">
              <h2 class = "title orange-text text-orange-darken-4">Create an Event</h2>
            </div>
            <div class="col s8 offset-s2">
              <form action="createEvent.php?create" method="post" class="card-panel">
                <div class="row">
                  <div class="input-field col s12">
                    <select name="loc" required>
                      <option value="" disabled selected>Select a location</option>
                      <option value="1">Student Union - Father's Marketplace</option>
                      <option value="2">DCC - Jazmine's</option>
                      <option value="3">Sage - The Beanery Cafe</option>
                      <option value="4">Pittsburgh - The Lally Gally</option>
                      <option value="5">Folsom Library - The Library Cafe</option>
                      <option value="6">EMPAC - Evelyn's</option>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="input-field col s12">
                    <input type="date" class="datepicker">
                    <label>Pick a date</label>
                  </div>
                </div>

                <div class="row">
                  <div class="input-field col s6">
                    <input placeholder="Month" type="number" name = "month" class = "validate">
                  </div>
                  <div class="input-field col s6">
                    <input placeholder="Day" type="number" name = "day" class="validate">
                  </div>
                </div>


                <div class="row">
                  <div class="input-field col s6">
                    <input placeholder="Hour" type="number" name="hour1" class="validate">
                    <label>Start time</label>
                  </div>
                  <div class="input-field col s6">
                    <input placeholder="Minute" type="number" name="minute1" class="validate">
                  </div>
                </div>

                <div class="row">
                  <div class="input-field col s6">
                    <input placeholder="Hour" type="number" name="hour2" class="validate">
                    <label>End time</label>
                  </div>
                  <div class="input-field col s6">
                    <input placeholder="Minute" type="number" name="minute2" class="validate">
                  </div>
                </div>

                <div class="row">
                  <div class="input-field col s12">
                    <input placeholder="Description" type="text" name="desc" class="validate">
                  </div>
                </div>

                <div class = "row">
                  <div class="col s12 center-align">
                    <button class="waves-effect waves-light btn orange darken-4" type="submit" name="action" value="join_adbeus">Espress-go!</button>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </main>

    <footer class="page-footer  brown darken-2">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <ul>
                  <li><a class="grey-text text-lighten-3" href="about.php">About</a></li>
                  <li><a class="grey-text text-lighten-3" href="meetups.php">Meetups</a></li>
                  <li><a class="grey-text text-lighten-3" href="login.html">Log In</a></li>
                  <li><a class="grey-text text-lighten-3" href="signup.html">Sign Up</a></li>
                  <li><a class="grey-text text-lighten-3" href="https://github.com/miknosaj/WebSys-Website">GitHub</a></li>
                </ul>
              </div>
              <div class="col l6 s12">
                <p class="grey-text text-lighten-4">Collective Caffeination is all about joining together. Something something Samm please put something in here.</p>
              </div>
            </div>
          </div>
          <div class="footer-copyright brown darken-4">
            <div class="container">
              Made with &#9749 by WebSys Group 7
            </div>
          </div>
    </footer>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script>
      $(document).ready(function() {
        $('select').material_select();
      });
      $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
      });
    </script>

  </body>
</html>
