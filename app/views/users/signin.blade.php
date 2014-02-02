@extends('layouts.main')

@section('content')
<section id="signin-form">
                <h1>I have an account</h1>
                {{ Form::open(array('url' => 'users/signin')) }}
                    <p>
                        {{ HTML::image('img/email.gif', 'Email Address') }}
                        {{ Form::email('email') }}
                    </p>
                    <p>
                        {{ HTML::image('img/password.gif', 'Password') }}
                        {{ Form::password('password') }}
                    </p>

                    {{ Form::button('signin', array('type' => 'submit', 'class' => 'secondary-cart')) }}
                    {{ Form::close() }}
            </section><!-- end signin-form -->
            <section id="signup">
                <h2>I'm a new customer</h2>
                <h3>You can create an account in just a few simple steps.<br>
                    Click below to begin.</h3>
                {{ HTML::link('users/newaccount', 'Create new account', array('class' => 'default-btn')) }}
</section><!--- end signup -->
@stop