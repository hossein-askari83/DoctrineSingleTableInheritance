<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Translation</title>
</head>

<body>
    <h1>Create Translation</h1>

    <form method="POST" action="{{ url("insert-translation") }}" enctype="multipart/form-data" id="form">
        @csrf

        <label for="word">Select a Word:</label><br>
        <select name="word" id="word">
            @foreach ($words as $id => $word)
                <option value="{{ $word->getId() }}">{{ $word->getTitle() }}</option>
            @endforeach
        </select><br><br>

        <label for="title">Title of Translation:</label><br>
        <input type="text" id="title" name="title"><br><br>

        <label for="type">Type of Translation:</label><br>
        <select name="translation_type" id="type">
            <option value="Verb">Verb</option>
            <option value="Noun">Noun</option>
            <option value="Adjective">Adjective</option>
            <!-- Add other types if needed -->
        </select><br><br>

        <div id="verbFields" style="display: none;">
            <label for="past_form">Past Form:</label><br>
            <input type="text" id="past_form" name="past_form"><br><br>
        </div>

        <div id="nounFields" style="display: none;">
            <label for="plural_form">Plural Form:</label><br>
            <input type="text" id="plural_form" name="plural_form"><br><br>
        </div>

        <div id="adjectiveFields" style="display: none;">
            <label for="superlative_form">Superlative Form:</label><br>
            <input type="text" id="superlative_form" name="superlative_form"><br><br>

            <label for="comparative_form">Comparative Form:</label><br>
            <input type="text" id="comparative_form" name="comparative_form"><br><br>
        </div>

        <button type="submit">Submit</button>
    </form>

    <script>
        document.getElementById('type').addEventListener('change', function() {
            var type = this.value;

            document.getElementById('verbFields').style.display = 'none';
            document.getElementById('nounFields').style.display = 'none';
            document.getElementById('adjectiveFields').style.display = 'none';

            if (type === 'Verb') {
                document.getElementById('verbFields').style.display = 'block';
            } else if (type === 'Noun') {
                document.getElementById('nounFields').style.display = 'block';
            } else if (type === 'Adjective') {
                document.getElementById('adjectiveFields').style.display = 'block';
            }


        });
    </script>
</body>

</html>
