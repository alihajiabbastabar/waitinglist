<!DOCTYPE html>
<html>
<head>
    <title>Waiting List</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
    <div class="image-container">
        <img alt="pickleball"  src="img/logo.png"/>
    </div>
    <h1>Add or Remove Players from Waiting List</h1>
    <div id="message"></div>
    <div id="addremovebox">
        <input type="text" id="name" name="name" placeholder="Enter your desired name ..."><br />
        <button  id="add-player">Add Player</button>
        <button  id="remove-player">Remove Player</button>
    </div>
    <ul id="waiting-list"></ul>
</body>
</html>