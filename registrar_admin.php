
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
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
            flex-direction: column;
            align-items: center;
            padding: 2em;
        }

        p {
            font-size: 1.2em;
            margin-bottom: 1em;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 1em;
        }

        label {
            margin-bottom: 0.5em;
            display: block;
        }

        input[type="text"],
        select {
            margin-bottom: 1em;
            padding: 0.5em;
            width: 300px;
        }

        button {
            padding: 0.5em 1em;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 0.5em;
            border-bottom: 1px solid #ddd;
        }

        .selected {
            background-color: #f0f0f0;
        }

        footer {
            background-color: #f0f0f0;
            padding: 1em;
            text-align: center;
            font-size: 0.8em;
            margin-top: 2em;
        }
    </style>
</head>

<body>
    <header>
        Control de Acceso - Administrador
    </header>
    <section>
        <p>Bienvenido, aquí puedes acceder a las funciones y configuraciones del sistema de control de acceso.</p>



        <form id="registroForm" method="GET" action="conexion.php">
            
            <div>
		<label for="noCuenta">Número de cuenta:</label>
            <input type="text" id="noCuenta" required pattern="[0-9]{7}" placeholder="1234567">
		
		</div>

            <label for="nombres">Nombres:</label>
            <input type="text" id="nombres" required pattern="[A-Za-záéíóúüñÁÉÍÓÚÜÑ]{1,65}" placeholder="Juan">

            <label for="apellidoPaterno">Apellido Paterno:</label>
            <input type="text" id="apellidoPaterno" required pattern="[A-Za-záéíóúüñÁÉÍÓÚÜÑ]{1,65}" placeholder="Pérez">

            <label for="apellidoMaterno">Apellido Materno:</label>
            <input type="text" id="apellidoMaterno" required pattern="[A-Za-záéíóúüñÁÉÍÓÚÜÑ]{1,65}" placeholder="Gómez">

            <label for="genero">Género:</label>
            <select id="genero">
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="No binario">No binario</option>
                <option value="Prefiero no decir">Prefiero no decir</option>
            </select>

            <label for="tipoUsuario">Tipo de usuario:</label>
            <select id="tipoUsuario">
                <option value="Administrativo">Administrativo</option>
                <option value="Alumno">Alumno</option>
                <option value="Docente">Docente</option>
            </select>

            <label for="idTarjeta">ID Tarjeta:</label>
            <input type="text" id="idTarjeta" required pattern="[A-Za-z0-9]{1,20}" placeholder="A9B8C7D6E5F4G3H2">

            <label for="idHuella">ID Huella:</label>
            <input type="text" id="idHuella" required pattern="[A-Za-z0-9]{1,20}" placeholder="5A6B7C8D9E0F1G2">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" accept="image/*">

            <button type="submit">Registrar</button>
        </form>

        <table id="registrosTable">
            <thead>
                <tr>
                    <th>Número de cuenta</th>
                    <th>Nombres</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Género</th>
                    <th>Tipo de usuario</th>
                    <th>ID Tarjeta</th>
                    <th>ID Huella</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí se agregarán los registros dinámicamente -->
            </tbody>
        </table>

        <div>
            
        </div>
    </section>
    <footer>
        Autor: WebDesigners | Teléfono: 7223486261 | Email: imartineza005@alumno.uaemex.mx | Versión: 1.0
    </footer>

    <script>
        var registros = [];

        function agregarRegistroTabla(registro) {
            var tableBody = document.querySelector("#registrosTable tbody");
            var row = document.createElement("tr");

            row.innerHTML = `
                <td>${registro.noCuenta}</td>
                <td>${registro.nombres}</td>
                <td>${registro.apellidoPaterno}</td>
                <td>${registro.apellidoMaterno}</td>
                <td>${registro.genero}</td>
                <td>${registro.tipoUsuario}</td>
                <td>${registro.idTarjeta}</td>
                <td>${registro.idHuella}</td>
                <td>
                    <button class="eliminarButton">Eliminar</button>
                    <button class="modificarButton">Modificar</button>
                </td>
            `;

            tableBody.appendChild(row);
        }

        // Obtener registros de la base de datos al cargar la página
        window.addEventListener("DOMContentLoaded", function () {
        // Obtener referencia a la tabla
        var registrosTable = document.querySelector("#registrosTable");

        // Realizar la solicitud AJAX para obtener los registros
    fetch("obtener_registros.php")
        .then(response => response.json())
        .then(data => {
        registros = data;
        registros.forEach(registro => {
            agregarRegistroTabla(registro);
        });
    })
        .catch(error => console.error(error));
    });

        function limpiarFormulario() {
            var noCuentaInput = document.querySelector("#noCuenta");
            var nombresInput = document.querySelector("#nombres");
            var apellidoPaternoInput = document.querySelector("#apellidoPaterno");
            var apellidoMaternoInput = document.querySelector("#apellidoMaterno");
            var generoSelect = document.querySelector("#genero");
            var tipoUsuarioSelect = document.querySelector("#tipoUsuario");
            var idTarjetaInput = document.querySelector("#idTarjeta");
            var idHuellaInput = document.querySelector("#idHuella");

            noCuenta.value = "";
            nombres.value = "";
            apellidoPaterno.value = "";
            apellidoMaterno.value = "";
            genero.value = "Masculino";
            tipoUsuario.value = "Administrativo";
            idTarjeta.value = "";
            idHuella.value = "";
        }

        var registroForm = document.querySelector("#registroForm");
        registroForm.addEventListener("submit", function (event) {
            event.preventDefault();

            var noCuenta = document.querySelector("#noCuenta");
            var nombres = document.querySelector("#nombres");
            var apellidoPaterno = document.querySelector("#apellidoPaterno");
            var apellidoMaterno = document.querySelector("#apellidoMaterno");
            var genero = document.querySelector("#genero");
            var tipoUsuario = document.querySelector("#tipoUsuario");
            var idTarjeta = document.querySelector("#idTarjeta");
            var idHuella = document.querySelector("#idHuella");

            var registro = {
                noCuenta: noCuenta.value,
                nombres: nombres.value,
                apellidoPaterno: apellidoPaterno.value,
                apellidoMaterno: apellidoMaterno.value,
                genero: genero.value,
                tipoUsuario: tipoUsuario.value,
                idTarjeta: idTarjeta.value,
                idHuella: idHuella.value
            };

            // Verificar si ya existe un registro con el mismo número de cuenta
            var duplicado = registros.some(function (reg) {
                return reg.noCuenta === registro.noCuenta;
            });

            if (duplicado) {
                alert("Ya existe un registro con el mismo número de cuenta. Por favor, verifica los datos.");
            } else {
                registros.push(registro);
                agregarRegistroTabla(registro);
                limpiarFormulario();
            }
        });

        var eliminarButton = document.querySelector("#eliminarButton");
        eliminarButton.addEventListener("click", function () {
            var selectedRows = document.querySelectorAll("#registrosTable tbody tr.selected");
            selectedRows.forEach(function (row) {
                row.remove();
            });
        });

        var registrosTable = document.querySelector("#registrosTable");
        registrosTable.addEventListener("click", function (event) {
            var target = event.target;
            var row = target.parentNode.parentNode;

            if (target.classList.contains("eliminarButton")) {
                row.remove();
            } else if (target.classList.contains("modificarButton")) {
                var cells = row.querySelectorAll("td");

                var noCuenta = document.querySelector("#noCuenta");
                var nombres = document.querySelector("#nombres");
                var apellidoPaterno = document.querySelector("#apellidoPaterno");
                var apellidoMaterno = document.querySelector("#apellidoMaterno");
                var genero = document.querySelector("#genero");
                var tipoUsuario = document.querySelector("#tipoUsuario");
                var idTarjeta = document.querySelector("#idTarjeta");
                var idHuella = document.querySelector("#idHuella");

                noCuenta.value = cells[0].textContent;
                nombres.value = cells[1].textContent;
                apellidoPaterno.value = cells[2].textContent;
                apellidoMaterno.value = cells[3].textContent;
                genero.value = cells[4].textContent;
                tipoUsuario.value = cells[5].textContent;
                idTarjeta.value = cells[6].textContent;
                idHuella.value = cells[7].textContent;

                row.classList.add("selected");
            }
        });
    </script>
</body>

</html>