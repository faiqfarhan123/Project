@extends('layouts.master')

@section('title')
Registration
@endsection('title')

@section('container')
    <div class="container" style="background-image: url('login/2.jpg'); width:100%; background-size: cover;">


            <section>               
                <div id="container_demo" >

                    <div id="wrapper">
                        

                        <div id="login" class="animate form">
                        
                            <form id="myForm" action="/register" method="POST"> 
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
                                    <label for="lnamesignup" class="uname" data-icon="u">Organization Name</label>
                                    <input id="lnamesignup" name="organization"  type="text" placeholder="Enter Your Organization Name" />
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
@endsection('container')
