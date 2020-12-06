<?php session_start() ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="stylesheet" href="https://bootswatch.com/4/lumen/bootstrap.css" />
    <title>Hello, world!</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="#">TSA</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <?php if($_SESSION["first"] == ""){?>
                <li class="nav-item active">
                    <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
                </li>
            <?php }else{ ?>
                <li id="logout" class="nav-item active">
                   <button class="btn btn-danger">Logout</button>
                </li>
            <?php } ?>
          <li class="nav-item">
            <a class="nav-link" href="./events.php">Events</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container">
    
    <h1>Events</h1>
    <table class="table">
    <thead>
      <tr>
        <th scope="col">Event ID</th>
        <th scope="col">Event Name</th>
        <th scope="col">Individual or Team</th>
        <th scope="col"># per Team</th>
        <th scope="col">Seats Available</th>

        <!--<th scope="col">Regionally Required</th>-->
        <!--<th scope="col">State Max</th>-->
        <!--<th scope="col">National Max</th>-->
        <!--<th scope="col">IsQualifying</th>-->
        <!--<th scope="col">IsOnsite</th>-->
        <th scope="col">Register</th>
      </tr>
      <?php include("backend/includes/table.php")?>
    </thead>
    </table>

    </div>
   
   <?php require("backend/includes/footer.php") ?> 
   <script>
        $(document).ready(() => {
            $("#logout").click(() => {
                $.ajax({
                    url:"backend/scripts/logout.php",
                    method:"post",
                    data:{},
                    success: (response) => {
                        location.reload(true);
                    }
                }); //end ajax
            }); //end logout click
            $("button#register").click(function(){
                $eventId = $(this).parent().prev().prev().prev().prev().prev().text();
                $.ajax({
                    url:"backend/scripts/register.php",
                    method:"post",
                    data:{
                        "eId":$eventId
                    },
                    success: (response) => {
                        location.reload(true);
                    }
                }); //end ajax
            }); //end register click
        }); //end document ready
   </script>
   </body>
</html>
