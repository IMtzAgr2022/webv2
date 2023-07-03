<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 1em;
            font-size: 1.5em;
        }

        section {
            display: flex;
            justify-content: center;
            flex-grow: 1;
            padding: 2em;
        }

        form {
            width: 80%;
            max-width: 400px;
            display: flex;
            flex-direction: column;
        }

        label,
        input,
        button {
            margin-bottom: 1em;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 0.5em 1em;
            cursor: pointer;
            font-size: 0.9em;
        }

        .password-container {
            position: relative;
        }

        .password-container input[type="password"] {
            padding-right: 2.5em;
        }

        .password-toggle {
            position: absolute;
            top: 50%;
            right: 5px;
            transform: translateY(-50%);
            cursor: pointer;
        }

        footer {
            background-color: #f0f0f0;
            padding: 1em;
            text-align: center;
            font-size: 0.8em;
        }
    </style>
</head>

<body>
    <header>
        Administrador - Iniciar sesión
    </header>
    <section>
        <form id="loginForm" method="GET" action="validar_login.php">
            <div>
                <label for="username">Nombre de usuario:</label>
                <input type="text" id="username" name="username" required placeholder="User">
            </div>
            <div class="password-container">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required placeholder="Password">
                <span class="password-toggle" onclick="togglePasswordVisibility()">&#128065;</span>
            </div>
            <button type="submit" id="submitBtn">Iniciar sesión</button>
        </form>
        <?php
        // Verificar si se ha pasado un mensaje de error en la URL
        if (isset($_GET['error'])) {
            // Mostrar el mensaje de error
            $error = $_GET['error'];
            echo '<script>alert("' . $error . '");</script>';
        }
        ?>
    </section>
    <footer>
        Autor: WebDesigners | Teléfono: 7223486261 | Email: imartineza005@alumno.uaemex.mx | Versión: 1.0
    </footer>

    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
</body>

</html>
