<div class="bg-image"></div>
<section>
    <div class="cardLogin">
        <img src="./images/LOGO/D-SOUND SYSTEM.png" alt="logoLogin">
        <h2>Log-in or Register</h2>
        <form action= "#" method="POST">
            <div class="first" >
                <label for="exampleInputEmail1" class="form-label">NickName</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label id="checkbox" class="form-check-label" for="exampleCheck1">Sono un venditore</label>
            </div>
            <div class="buttonAndLink">
                <button type="submit" href="../index.php" class="btn btn-primary">Login</button>
                <!-- Quando clicco devo fare l'accesso e andare sulla mainPage -->
                <button type="button" href="../index.php" class="btn btn-secondary" onclick="showRegistrationForm()">Register</button>
            </div>
            </form>
    </div>
</section>
<script type="text/javascript" src="./jsUtils/removeElement.js"></script>
<script type="text/javascript" src="./javascript/loginPage.js"></script>

