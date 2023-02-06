<!DOCTYPE html>
<html>
<link rel='stylesheet' href='index.css'>
<div class="img" id="divImg">
    <img id="img" src="https://cdn.pixabay.com/photo/2016/11/14/17/39/person-1824144__340.png">
</div>

<body>
    <form id="login" action="connect.php" method="post">
        <div class="form" id="content">
            <h1>
                <span>Login</span>
            </h1>
            <div class="email">
                <p id="demo"></p>
                <label>email</label>
                <input placeholder="@gmail.com" type="text" name="email" id="email">
            </div>
            <div class="senha">
                <label>senha</label>
                <input placeholder="*****" type="password" name="senha" id="senha">
            </div>
            <div>
                <button id="bt" type="button">login</button>
                <p></p>
            </div>
        </div>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function new_Client() {

            window.location = "https://localhost/projeto%20pessoal/Login_JS/teste.html";
        }

        function exist_Client() {

            window.location = "https://localhost/projeto%20pessoal/Login_JS/success.html";
        }

        $(document).ready(function () {
            $("#bt").click(function (e) {
                /* WHEN THE BUTTON IS CLICKED OR THE FORM IS SUBMITTED */
                e.preventDefault(); /* STOP THE PAGE FROM REFRESHING */
                var email = document.getElementById("email").value;
                var result = document.getElementById("demo");
                var senha = document.getElementById("senha").value;
                if (email.length === 0) {
                    return document.getElementById("demo").innerHTML = '<h3>email vazio</h3>';
                    // var result = "<?php
                    // echo phpFunction() 
                    ?> ";
                }
                if (senha.length === 0) {
                    return document.getElementById("demo").innerHTML = '<h3>senha vazio</h3>';
                }
                /* STORE THE VALUE OF THE EMAIL FIELD */
                // var dataString = "email="+email; /* STORE THE EMAIL TO A DATA STRING */
                $.ajax({
                    /* CALL AJAX */
                    method: "POST",
                    type: "POST",
                    url: "connect.php",
                    /* SUBMIT THE DATA TO THIS PAGE */
                    data: {
                        'action': "login",
                        'email': email,
                        'senha': senha
                    },
                    success: function (data) {
                        if (data.length === 2) {
                            console.debug(data);
                            return document.getElementById("demo").innerHTML = '<h3>email existente</h3>';
                        }
                        if (data.length === 3) {
                            console.debug(data);
                            exist_Client();
                        }
                        if (data.length === 1) {
                            console.debug(data);
                            // return document.getElementById("demo").innerHTML = '<h3>criando usuario ...</h3>';
                            new_Client();
                            // window.location.replace("https://localhost/projeto%20pessoal/Login_JS/teste.htmlm");
                        } else {
                            console.debug(data);
                            alert("servidor ocupado");
                        }
                        // $("#email").val(""); /* EMPTY THE EMAIL FIELD */
                    }
                });
                return false;
            });
        });
    </script>
</body>

</html>