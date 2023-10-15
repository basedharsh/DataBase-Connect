<!DOCTYPE html>
<html>
<head>
    <title>Cookie and Session Example</title>
</head>
<body>
    <h1>Cookie and Session Example</h1>

  
    <button onclick="setCookie()">Set Cookie</button>
    <p id="cookieOutput"></p>

    
    <button onclick="deleteCookie()">Delete Cookie</button>
    <p id="deleteCookieOutput"></p>


    <button onclick="startSession()">Start Session</button>
    <p id="sessionOutput"></p>


    <button onclick="deleteSession()">Delete Session</button>
    <p id="deleteSessionOutput"></p>

    <script>
        function setCookie() {
            
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById('cookieOutput').innerHTML = xhr.responseText;
                }
            };
            xhr.open('GET', 'setCookie.php', true);
            xhr.send();
        }

        function deleteCookie() {
            
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById('deleteCookieOutput').innerHTML = xhr.responseText;
                }
            };
            xhr.open('GET', 'deleteCookie.php', true);
            xhr.send();
        }

        function startSession() {
           
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById('sessionOutput').innerHTML = xhr.responseText;
                }
            };
            xhr.open('GET', 'startSession.php', true);
            xhr.send();
        }

        function deleteSession() {
           
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById('deleteSessionOutput').innerHTML = xhr.responseText;
                }
            };
            xhr.open('GET', 'deleteSession.php', true);
            xhr.send();
        }
    </script>
</body>
</html>
