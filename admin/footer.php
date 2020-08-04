    <footer class="row">
      <div class="large-12 columns">
        <hr/>
        <div class="row">
          <div class="large-6 columns">
            <p>&copy; <?php echo say_year(); ?> Copyright. All rights reserved.</p>
          </div>
          <div class="large-6 columns">
            <ul class="inline-list right">
              <li><a href="./index.php">Inicio</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>

      <!-- Essential JavaScript Libraries
    ==============================================-->
    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
    <script type="text/javascript" src="syntax-highlighter/scripts/shCore.js"></script> 
    <script type="text/javascript" src="syntax-highlighter/scripts/shBrushXml.js"></script> 
    <script type="text/javascript" src="syntax-highlighter/scripts/shBrushCss.js"></script> 
    <script type="text/javascript" src="syntax-highlighter/scripts/shBrushJScript.js"></script> 
    <script type="text/javascript" src="syntax-highlighter/scripts/shBrushPhp.js"></script>

    <!-- Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <script type="text/javascript">
      SyntaxHighlighter.all()
    </script>
    <script type="text/javascript" src="js/custom.js"></script>

    <script type="text/javascript">

      $("#fileInput").change(function () {
        filePreview(this);
      });

      function filePreview(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.readAsDataURL(input.files[0]);
          reader.onload = function (e) {
            $('#upload + img').remove();
            $('#upload').after('<img src="'+e.target.result+'" class="photo"/>');
          }
        }
      }

    </script>
    
  </body>
</html>