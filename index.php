<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Ajax database call test</title>
        <script>
            //Adapted from https://www.w3schools.com/php/php_ajax_database.asp
            //test
            function showUser(str) {
                if (str == "") {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                } else {
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("txtHint").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("POST", "SqlQuery.php?q=" + str, true);
                    xmlhttp.send();
                }
            }
        </script>
    </head>
    <body>
        <input type="submit" class="button" name="display" value="Click here" onclick="showUser(this.value)"/>
        <div id="txtHint"><h2>The data from a row in the database will be displayed here...</h2></div>
    </body>
</html>
