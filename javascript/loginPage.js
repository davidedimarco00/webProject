let registrationForm = false;

function showRegistrationForm() {
        let html = `
                    <form id ="registrationForm" action="../webProject/loginPage.php" method="POST">

                    <div class='mb-3'>
                    <label for='Name' class='form-label'>Nome</label>
                    <input type='text' class='form-control' id='nameText' name="name" aria-describedby='emailHelp'>
                    </div>
                    
                    <div class='mb-3'>
                        <label for='exampleInputEmail1' class='form-label'>Cognome</label> 
                        <input type='text' class='form-control' id='surnameText' name="surname">
                    </div>
                    
                    <div class='mb-3'>
                        <label for='inputEmail' class='form-label'>Email</label> 
                        <input type='email' class='form-control' id='emailText'  name="email" aria-describedby='emailHelp'>
                    </div>
                    <div class="first" >
                        <label for="nickname" class="form-label">Nickname</label>
                        <input type="text" class="form-control" id="nickname" name="nickname">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <div class="buttonAndLink" id="lastDiv">
                        <button type="submit" id="registrationButton" class="btn btn-secondary">Registrati</button>
                    </div>
                    <hr>
                    <p>Se sei un venditore premi la casella</p>
                    <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="vendor" name="isVend" />
                    <label id="checkbox" class="form-check-label" for="exampleCheck1">Sono un venditore</label>
                    <hr>
                    <p>Dopo la registrazione in caso di esito positivo verrai reindirizzato alla mainpage.</p>
                    </div>        
        </form>
                    ` 

        if (registrationForm == false){
            $('form').hide();
            $('h2').after(html).hide().show('slow');
            $('#registrationForm').hide().show('slow');
            
            registrationForm = true;
            let links = document.getElementsByTagName('link');
            for (let i = 0; i < links.length; i++) {
                if (links[i].getAttribute('rel') == 'stylesheet') {
                    let href = links[i].getAttribute('href')
                                            .split('?')[0];
                    let newHref = href + '?version=' 
                                + new Date().getMilliseconds();
                    
                    links[i].setAttribute('href', newHref);
                }
            }
            $('#loginButton').hide();
            $('h2').text("Register");
        }
        }