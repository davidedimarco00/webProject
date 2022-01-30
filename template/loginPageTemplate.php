<div class="bg-image"></div>
<section>
    <div class="cardLogin">
        <img src="./images/LOGO/D-SOUND SYSTEM.png" alt="logoLogin">
        <h2>Log-in or Register</h2>
        <?php if(isset($templateParams["formmsg"])):?>
        <p><?php echo $templateParams["formmsg"]; ?></p>
        <?php endif; ?>
        <form action="../webProject/loginPage.php" method="POST">
            <div class="first" >
                <label for="nickname" class="form-label">Nickname</label>
                <input type="text" class="form-control" id="nickname" name="nickname">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="buttonAndLink" id="lastDiv">
                 <button type="submit" id="loginButton" href="#" class="btn btn-secondary">Login</button>
                <button type="button" id="registrationButton" class="btn btn-secondary" onclick="showRegistrationForm()">Register</button>
            </div>
        </form>
    </div>
</section>
<script type="text/javascript" src="./jsUtils/removeElement.js"></script>
<script type="text/javascript" src="./javascript/loginPage.js"></script>

