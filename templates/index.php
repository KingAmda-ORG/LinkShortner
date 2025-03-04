<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Link Shortner</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>
  <body>
  <section class="section">
    <div class="container">
      <div class="box">
        <div class="field">
          <label class="label">Long Link</label>
          <div class="control">
            <input class="input" placeholder="https://example.com/something/this-is-too-long-link" id="input">
          </div>
        </div>
        <div class="field" style="display: none;" id="output_div">
          <label class="label">Short Link</label>
          <div class="control">
            <i><a href="" id="output"></a></i>
          </div>
        </div>
        <button class="button is-primary" id="btn">Short it!</button>
      </div>
    </div>
  </section>
  </body>
  <script>
    $("#btn").click(function() {
      var input = $('#input').val();
      if (input == '') {
        alert('Please enter a long link');
        return;
      }
      if (input.indexOf('http') == -1) {
        input = 'http://' + input;
      }
      $("#btn").attr('disabled', true);
      var chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      var id = '';
      for (var i = 0; i < 6; i++) {
        id += chars[Math.floor(Math.random() * chars.length)];
      }
      $.ajax({
        url: '/api',
        type: 'POST',
        data: {
          url: input,
          key: id
        },
        success: function(data) {
          $('#output_div').show();
          $('#output').attr('href', window.location.href + id);
          $('#output').html(window.location.href + id);
        },
        error: function(data) {
          alert(data.statusText);
        }
      });
    });
  </script>
</html>
