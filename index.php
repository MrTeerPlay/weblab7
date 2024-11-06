<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Анкета опитування</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Анкета опитування</h1>
    <form id="surveyForm">
        <label for="name">Ім'я:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="question1">Ваше улюблене хобі:</label><br>
        <textarea id="question1" name="question1" required></textarea><br><br>

        <label for="question2">Який ваш улюблений колір?</label><br>
        <input type="text" id="question2" name="question2" required><br><br>

        <input type="submit" value="Відправити">
    </form>

    <div id="responseMessage"></div>

    <script>
        $(document).ready(function() {
            $('#surveyForm').submit(function(event) {
                event.preventDefault(); // Запобігаємо стандартній відправці форми

                $.ajax({
                    type: 'POST',
                    url: 'submit.php',
                    data: $(this).serialize(), // Серіалізуємо дані форми
                    success: function(response) {
                        $('#responseMessage').html(response);
                    },
                    error: function() {
                        $('#responseMessage').html('Сталася помилка при відправці форми.');
                    }
                });
            });
        });
    </script>
</body>
</html>