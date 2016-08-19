@extends('layouts.master')
@section('title')
Login
@endsection

@section('container')

<div class="container" style="height:100%; background-image: url('login/2.jpg'); width:100%; background-size: cover;">
            <section>               
                <div id="container_demo" >

                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="signin" method="POST" autocomplete="on"> 
                                
                                {{ Form::token() }}
                                        
                                <h1>Login</h1> 
                                    
                                        <h3>{{ $status }}</h3>
                                <p> 

                                    <label for="username" class="uname" data-icon="u" > Your email </label>
                                    <input id="username" name="usernamesignin"  type="text" placeholder="Enter Your Email"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="passwordsignin"  type="password" placeholder="Enter Your Password" /> 
                                </p>
                                <p class="keeplogin"> 
                                    <input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
                                    <label for="loginkeeping">Keep me logged in</label>
                                </p>

                                <p class="login button"> 
                                        <input type="submit" value="Login"/> 
                                </p>
                                <p class="change_link" style="padding: 5px 100px 5px 30px;">
                                    Not a member yet?
                                    <a href="iregister" class="to_register">Join us</a>
                                </p>

                            </form>
                        </div>
                    </div>
                </div>  
            </section>
        </div>
@endsection
