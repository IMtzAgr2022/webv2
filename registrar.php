<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Acceso</title>
    <style>
        body {

            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
            padding: 2em;
        }

        form {
            width: 50%;
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
            padding: 1em;
            cursor: pointer;
        }

        footer {
            background-color: #f0f0f0;
            padding: 1em;
            text-align: center;
            font-size: 0.8em;
            margin-top: 2em;
        }

        #helpButton {
            position: fixed;
            top: 10px;
            right: 10px;
            padding: 0.5em;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        #adminButton {
            position: fixed;
            top: 10px;
            right: 70px;
            padding: 0.5em;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .success-message {
            color: green;
            font-weight: bold;
            margin-bottom: 1em;
        }

        .error-message {
            color: red;
            font-weight: bold;
            margin-bottom: 1em;
        }
    </style>
    <script>
        function validateNoCuenta() {
            var noCuentaInput = document.getElementById("noCuenta");
            var noCuenta = noCuentaInput.value.trim();

            if (!/^\d{7}$/.test(noCuenta)) {
                alert("El número de cuenta debe contener exactamente 7 números enteros.");
                noCuentaInput.value = "";
                return false;
            }

            return true;
        }

        function validateNombres() {
            var nombresInput = document.getElementById("nombres");
            var nombres = nombresInput.value.trim();

            if (!/^[A-Za-záéíóúüÁÉÍÓÚÜ]{1,65}$/.test(nombres)) {
                alert("Los nombres deben contener únicamente letras y tener una longitud máxima de 65 caracteres.");
                nombresInput.value = "";
                return false;
            }

            return true;
        }

        function validateApellidoPaterno() {
            var apellidoPaternoInput = document.getElementById("apellidoPaterno");
            var apellidoPaterno = apellidoPaternoInput.value.trim();

            if (!/^[A-Za-záéíóúüÁÉÍÓÚÜ]{1,65}$/.test(apellidoPaterno)) {
                alert("El apellido paterno debe contener únicamente letras y tener una longitud máxima de 65 caracteres.");
                apellidoPaternoInput.value = "";
                return false;
            }

            return true;
        }

        function validateApellidoMaterno() {
            var apellidoMaternoInput = document.getElementById("apellidoMaterno");
            var apellidoMaterno = apellidoMaternoInput.value.trim();

            if (!/^[A-Za-záéíóúüÁÉÍÓÚÜ]{1,65}$/.test(apellidoMaterno)) {
                alert("El apellido materno debe contener únicamente letras y tener una longitud máxima de 65 caracteres.");
                apellidoMaternoInput.value = "";
                return false;
            }

            return true;
        }

        function validateIdTarjeta() {
            var idTarjetaInput = document.getElementById("idTarjeta");
            var idTarjeta = idTarjetaInput.value.trim();

            if (!/^[A-Za-z0-9]{1,20}$/.test(idTarjeta)) {
                alert("El identificador de tarjeta debe contener únicamente letras y números, y tener una longitud máxima de 20 caracteres.");
                idTarjetaInput.value = "";
                return false;
            }

            return true;
        }

        function validateIdHuella() {
            var idHuellaInput = document.getElementById("idHuella");
            var idHuella = idHuellaInput.value.trim();

            if (!/^[A-Za-z0-9]{1,20}$/.test(idHuella)) {
                alert("El identificador de huella debe contener únicamente letras y números, y tener una longitud máxima de 20 caracteres.");
                idHuellaInput.value = "";
                return false;
            }

            return true;
        }

        function validateForm() {
            return (
                validateNoCuenta() &&
                validateNombres() &&
                validateApellidoPaterno() &&
                validateApellidoMaterno() &&
                validateIdTarjeta() &&
                validateIdHuella()
            );
        }
    </script>
</head>

<body>
    <header>
        Sistema de Control de Acceso
    </header>
    <section>
        <form action="guardar_datos.php" method="post">
            
            <label for="noCuenta">*Número de cuenta:</label>
            <input type="text" id="noCuenta" name="noCuenta" required placeholder="1234567">

            <label for="nombres">*Nombres:</label>
            <input type="text" id="nombres" name="nombres" required placeholder="Jorge">

            <label for="apellidoPaterno">*Apellido Paterno:</label>
            <input type="text" id="apellidoPaterno" name="apellidoPaterno" required placeholder="López">

            <label for="apellidoMaterno">*Apellido Materno:</label>
            <input type="text" id="apellidoMaterno" name="apellidoMaterno" required placeholder="Zepeda">

            <label for="genero">*Género:</label>
            <select id="genero" name="genero" required>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="No binario">No binario</option>
                <option value="Prefiero no decir">Prefiero no decir</option>
            </select>

            <label for="tipoUsuario">*Tipo de usuario:</label>
            <select id="tipoUsuario" name="tipoUsuario" required>
                <option value="Administrativo">Administrativo</option>
                <option value="Alumno">Alumno</option>
                <option value="Docente">Docente</option>
            </select>

            <label for="idTarjeta">*Identificador de la Tarjeta:</label>
            <input type="text" id="idTarjeta" name="idTarjeta" required placeholder="A9B8C7D6E5F4G3H2">
            <button type="submit" id="submitBtn">Registrar</button>
        </form>
    </section>
    <footer>
        Autor: WebDesigners | Teléfono: 7223486261 | Email: imartineza005@alumno.uaemex.mx | Versión: 1.0
    </footer>
    <button id="helpButton">Ayuda</button>
     <button id="helpButton">Ayuda</button>
    <a href="pagina_login.html"><button id="adminButton">Administrador</button></a>
    <script>
        document.getElementById("helpButton").addEventListener("click", function () {
            //Lógica para mostrar la ayuda
            alert("Verifica que ingreses los datos solicitados, los campos de Identificador de Tarjeta y de Huella se llenan en automático cuando haya una lectura de ambos. Si tienes alguna pregunta adicional, no dudes en contactarnos. ¡Estamos aquí para ayudarte!");
        });
	    // Agrega este bloque de JavaScript para mostrar mensajes de éxito o error
        var urlParams = new URLSearchParams(window.location.search);
        var messageType = urlParams.get('message_type');
        var errorMessage = urlParams.get('error_message');
        var successMessage = urlParams.get('success_message');

        if (messageType && errorMessage) {
            if (messageType === 'error') {
                showError(errorMessage);
            }
        } else if (messageType && successMessage) {
            if (messageType === 'success') {
                showSuccess(successMessage);
            }
        }

        function showError(message) {
            var errorDiv = document.createElement('div');
            errorDiv.classList.add('error-message');
            errorDiv.textContent = message;
            document.body.insertBefore(errorDiv, document.getElementById('registroForm'));
        }

        function showSuccess(message) {
            var successDiv = document.createElement('div');
            successDiv.classList.add('success-message');
            successDiv.textContent = message;
            document.body.insertBefore(successDiv, document.getElementById('registroForm'));
        }
    </script>
</body>

</html>