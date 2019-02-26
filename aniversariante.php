<!DOCTYPE html>
<html>
  <head>
      <title>Tarea - Gerador Cartão de Aniversário</title>
      <meta charset="UTF-8">

      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="css/gerador.css" />
      <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
  </head>

  <body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>1. Instruções</h2>
        Preencha as informações abaixo e verifique o modelo e conteúdo ao lado na aba "Preview". <br/><br/> 
        Feito isso, para finalizar basta clicar em "Finalizar" e depois em "Fazer Download".
        <br/><br/>

        <label>Modelos</label>
        <select id="combo">
          <option value="modelo1">Modelo Institucional</option>
          <option value="modelo2">Modelo em Cor</option>
        </select>

        <br/><br/>

        <label>Nome</label>
        <input id="nomeValue" type="text" value="" placeholder="Digite o Nome Aqui" />

        <br/><br/>

        <label>Texto</label>
        <textarea id="textoValue">digite o texto aqui</textarea>

        <br/><br/>

        <div class="btn-download">
          <a id="generatorImg"><i class="fa fa-check-square-o" aria-hidden="true"></i> Clique aqui para finalizar</a> 
          <a id="downloadImg" href="" style="display:none;" download><i class="fa fa-download" aria-hidden="true"></i> Fazer Download</a>
          <a class="back" href="index.html">Voltar</a>
        </div>

    </div>

    <!-- Preview -->
    <div class="content">
      <h2>Preview</h2>
      <div class="wrapper">
        <div id="content-export" class="modelo1">
          <div id="nomePrint"></div>
          <div id="textoPrint"></div>
          <img crossOrigin="Anonymous" src="img/logo.png" />
        </div>
      </div>
    </div>


    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/html2canvas.js"></script>
      
    <script>
      $(function(){
          // Gerador Imagem
          $("#generatorImg").click(function(){
            html2canvas($("#content-export"), {
              onrendered: function(canvas) {
                var imgsrc = canvas.toDataURL("image/png");
                console.log(imgsrc);
                $("#downloadImg").attr('href',imgsrc);
                $("#generatorImg").hide();
                $("#downloadImg").show();
                $('#downloadImg').click(function() {
                    location.reload();
                });
              }
            });
          }); 
        }); 


        // Modelo 
          $('#combo').change(function() {
            if ($(this).val() == 'modelo1') {
              $("#content-export").addClass("modelo1");
              $("#content-export").removeClass("modelo2");
            }
            
            if ($(this).val() == 'modelo2') {
              $("#content-export").addClass("modelo2");
              $("#content-export").removeClass("modelo1");
            }
          
          });

        // Change Campos
        var nome = document.getElementById('nomeValue');

        nome.onkeyup = function() {
          document.getElementById('nomePrint').innerHTML = nome.value;
        }

        // Change Texto
        var texto = document.getElementById('textoValue');

        texto.onkeyup = function() {
          document.getElementById('textoPrint').innerHTML = texto.value;
        }

      </script>

   </body>
</html>