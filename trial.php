<!DOCTYPE html>
<html>
<head>
    <title>Firebase CRUD Operations</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Fetch data from fetch_data.php
            $.ajax({
                url: 'fetch_data.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    data.forEach(function(item) {
                        var listItem = `<li><span id='name_${item.key}'>${item.name}</span> (<span id='email_${item.key}'>${item.email}</span>) <span id='change_${item.key}'><a href='javascript:void(0);' onclick='editData("${item.key}")'>Change</a></span> <a href='delete.php?key=${item.key}'>Delete</a></li>`;
                        $('ul').append(listItem);
                    });
                }
            });
        });

        function editData(key) {
            var name = document.getElementById("name_" + key).innerText;
            var email = document.getElementById("email_" + key).innerText;

            document.getElementById("name_" + key).innerHTML = `<input type='text' id='new_name_${key}' value='${name}'>`;
            document.getElementById("email_" + key).innerHTML = `<input type='text' id='new_email_${key}' value='${email}'>`;
            document.getElementById("change_" + key).innerHTML = `<a href='javascript:void(0);' onclick='saveData("${key}")'>Save</a>`;
        }              

        function saveData(key) {
            var newName = document.getElementById("new_name_" + key).value;
            var newEmail = document.getElementById("new_email_" + key).value;

            $.ajax({
                url: 'save.php',
                type: 'POST',
                data: {key: key, name: newName, email: newEmail},
                success: function(response) {
                    if(response === 'success') {
                        document.getElementById("name_" + key).innerText = newName;
                        document.getElementById("email_" + key).innerText = newEmail;
                        document.getElementById("change_" + key).innerHTML = `<a href='javascript:void(0);' onclick='editData("${key}")'>Change</a>`;
                    } else {
                        alert('Failed to update data');
                    }
                }
            });
        }
    </script>
</head>
<body>

    <div style="float: left; width: 50%;">
        <h2>Data from Firebase</h2>
        <ul>
            <!-- Data will be appended here by jQuery -->
        </ul>
    </div>

    <div style="float: right; width: 50%;">
        <h2>Add New Data</h2>
        <form action="update.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name"><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email"><br><br>

            <input type="submit" value="Add">
        </form>
    </div>

</body>
</html>
