<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Link Shortner</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>
  <script>
    let passwd = prompt("Enter password");
    while (passwd == null) {
      passwd = prompt("Enter password");
    }
    $.ajax({
      url: '/login',
      type: 'POST',
      data: {
        passwd: passwd
      },
      success: function(data) {
        document.cookie = "passwd=" + passwd;
        window.location.href = "/admin";
      },
      error: function(data) {
        alert(data.responseText);
      }
    });
  </script>
</html>
