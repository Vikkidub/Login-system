<!-- LOGIN -->
<div class="container">

    <h1 class="header">Welcome</h1>
    <div>Log in using your login information</div>
    <form method="post" action="user_login.php">
        <input name="username" id="usernameId" placeholder="username"> <br>
        <input type="password" name="password" id="passwordId" placeholder="password">
        <br>
        <button type="submit">Enter</button>
    </form>
    <p>

        <!-- SIGN UP -->
    <div class="signupDiv">
        <div class="header">Or sign up</div>
        <form method="post" action="submit_user.php">
            <input type="text" id="usernameId" placeholder="username" name="username"> </br>
            <input type="password" id="passwordId" placeholder="password" name="password"> </br>
    </div>
    <button type="submit">Submit</button>
    </form>

</div>