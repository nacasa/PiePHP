<body>
    <form class="form-signin" action="/PiePHP/user/register" method="POST">
        <h2 class="form-signin-heading">Inscription sur PiePHP</h2>
        
        <label for="email" class="sr-only">Email</label>
          <input type="email" id="email" class="form-control" placeholder="Adresse e-mail" name="email" required autofocus>


          <label for="password" class="sr-only">Password</label>
          <input type="password" id="password" class="form-control" placeholder="Mot de passe" name="password" required>
          <br/>

        <button class="btn btn-lg btn-primary btn-block" value="Submit" type="submit">S'inscrire</button><br/>
    </form>
</body>

