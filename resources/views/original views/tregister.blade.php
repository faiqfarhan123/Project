<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration</title>
        <meta name="description" content="">

       <link rel="stylesheet" href="login/font-awesome/css/font-awesome.min.css" type="text/css">
        <link href="login/css/main.css" rel="stylesheet"> 
        


        <!-- <link rel="shortcut icon" href="../favicon.ico">  -->
        <!-- <link rel="stylesheet" type="text/css" href="csss/demo.css" /> -->
        <link rel="stylesheet" type="text/css" href="login/css/style3.css" />
        <!-- <link rel="stylesheet" type="text/css" href="csss/animate-custom.css" /> -->
		
		
		
		
		 <!-- google font links start -->
	  
	  <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat+Alternates:400,700' rel='stylesheet' type='text/css'>
	<!-- google font end -->
		
		

	<!-- footer -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">

    <!--/head-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Bootstrap Core CSS -->
    <link href="login/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="login/css/small-business.css" rel="stylesheet">
    

</head>

<body id = "page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style = "border-width: 0 0 3px; background-color: white; border-color: #EF420A; padding-bottom: 10px; " >
        <div class="container-fluid" style="margin-right: 30px;">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <img src="login/Drawing.png" alt="">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
                <ul class="nav navbar-nav navbar-right" style = "margin-left: 50px; margin-right: 20px; color: black;" >	
						 <a class = "btn btn-link" style = "color: #f05f40; font-size:17px; padding-top: 12px; margin-left: 100px;"  href = "signin"> Sign In </a>
						 <a class ="btn btn-default" style = "border-radius: 0; border: 1px; padding: 15px 15px 15px 15px; background-color: #f05f40; color:white; " href = "register"> 
						 Create an Event 
						 </a>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <div class="container" style="background-image: url('login/2.jpg'); width:100%; background-size: cover;">


            <section>				
                <div id="container_demo" >

                    <div id="wrapper">
						

                        <div id="login" class="animate form">
						
                            <form id="myForm" action="/tregister" method="POST"> 
                                <h1> Sign up </h1> 
								{{ Form::token() }}
                                        
                               {{ $registrationStatus }}

                                <p> 
                                    <label for="fnamesignup" class="uname" data-icon="u">Your First Name</label>
                                    <input id="fnamesignup" name="fname"  type="text" placeholder="Enter Your First Name" />
                                </p>
                                <p> 
                                    <label for="lnamesignup" class="uname" data-icon="u">Your Last Name</label>
                                    <input id="lnamesignup" name="lname"  type="text" placeholder="Enter Your Last Name" />
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Email</label>
                                    <input id="passwordsignup" name="email"  type="text" placeholder="Enter Your Email"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Password </label>
                                    <input id="passwordsignup_confirm" name="password"  type="password" placeholder="Enter your password"/>
                                </p>

                                <p class="signin button"> 
                                    <input type="submit" value="Sign up"/> 
                                     
                                </p>



                                <p class="change_link" style="padding: 5px 60px 5px 30px;">  
                                    Already a member ?
                                    <a href="signin" class="to_register"> Go back to Login </a>
                                </p>

                            </form>

                        </div>

                    </div>
                </div>  
            </section>
        </div>

		
		
    <!-- jQuery -->
    <script src="login/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="login/js/bootstrap.min.js"></script>

	<script src="login/js/jquery.js"></script> 
        <script src="login/js/bootstrap.min.js"></script> 
        <script src="login/js/jquery.prettyPhoto.js"></script> 
        <script src="login/js/jquery.isotope.min.js"></script> 
        <script src="login/js/main.js"></script>
</body>


		<!-- Footer -->
        <footer class="footer-distributed">

			<div class="footer-left">

				<h3>Ticket<span>Manager</span></h3>

				<p class="footer-links">
					<a href="#">Home</a>
				
					<a href="#">How it Works</a>
					
					<a href="#">Events</a>
					
					<a href="#">Pricing</a>
					
					<a href="#">About</a>
					
				</p>
				
			</div>

			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
				</div>

				<div>
					<i class="fa fa-phone"></i>
					<p>+00 00 00 00</p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:support@company.com">support@company.com</a></p>
				</div>

			</div>

			<div class="footer-right">

				<p class="footer-company-about">
					<span>About the company</span>
					We are web developers, email us for any queries.
				</p>

				<div class="footer-icons">

					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-github"></i></a>

				</div>

			</div>

		</footer>
		
		
		
			<style>
body{
font-family: Raleway;
}

h1,h2,h3,h4{
font-family: Montserrat;
}
	
	</style>
		
		
		
		
		

</html>
