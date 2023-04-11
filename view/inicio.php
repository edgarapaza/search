<?php
  session_start();

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Sistema Busqueda: ARP</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="../css/bootstrap.css" media="screen">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
      <script src="../bower_components/respond/dest/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      a:hover{
        text-decoration: none;
      }
      body{
        background: rgb(2,0,36);
        background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(0,0,0,0.5466561624649859) 0%, rgba(0,88,106,1) 100%);
      }
      .texto{
        color: white;
        font-size: 3.5em;
      }
    </style>

  </head>
  <body>

    <div class="container">

        <div class="row">
          <div class="col-lg-8 col-md-7 col-sm-6">
            <p class="texto">OFICINA DE INFORMATICA</p>
            <h1 class="texto">Sistema de Busqueda</h1>
          </div>
        </div>

      <div class="bs-docs-section">
        <div class="row">
          <div class="col-lg-6">
            <div class="bs-component">
              <div class="list-group panel panel-warning">
                <a href="../viewold/index.php" class="panel panel-warning">
                  <div class="panel-heading"><h2>Sistema Anterior</h2></div>
                </a>
                <li class="list-group-item">Abogado: Julio Garnica Rosado 1990 a 1993</li>
                <li class="list-group-item">Provincia de Azangaro</li>
                <li class="list-group-item">Provincia de Carabaya</li>
                <li class="list-group-item">Provincia de Lampa</li>
                <li class="list-group-item">Provincia de San Roman 1</li>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="bs-component">
              <div class="list-group panel panel-success">
                <a href="index.php" class="panel panel-success">
                  <div class="panel-heading"><h2>Sistema Actual</h2></div>
                </a>
                <li class="list-group-item">Luis Alfredo Cuba Ovalle - Juliaca</li>
                <li class="list-group-item">Julio Edgar Lezano Zuñiga - Puno</li>
                <li class="list-group-item">Elard Wilfredo Vilca Monteaguado - Puno</li>
                <li class="list-group-item">Guillermo Garnica - Puno</li>
                <li class="list-group-item">Hildebrando Castillo Sachun - San Roman</li>
                <li class="list-group-item">Gino Ernesto Yangali Iparraguirre - San Roman</li>
                <li class="list-group-item">Selmo Ivan Carcausto Tapia - San Roman</li>
                <li class="list-group-item">Jose Pardes Fernandez - San Roman</li>
                <li class="list-group-item">Luis Alfredo Vasquez Romero - San Roman</li>
              </div>
            </div>
          </div>

        </div>

      <footer>
        <div class="row">
          <div class="col-lg-12">

           <h3>Contactos</h3>
           <p>Desarrollado en el ARP - Ing Edgar Apaza Choque Dic 2015</p>
            <p>Dirección: Jr. Arequipa # 1143</p>
            <p>Teléfonos. 051-600704 / 051-600705</p>
            <p>Email: <a href="http://archivo@regionalpuno.gob.pe" >archivo@regionalpuno.gob.pe</a></p>
          </div>
        </div>
      </footer>

    </div>
  </div>


    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <script type="text/javascript">
  /* <![CDATA[ */
  (function(){try{var s,a,i,j,r,c,l=document.getElementsByTagName("a"),t=document.createElement("textarea");for(i=0;l.length-i;i++){try{a=l[i].getAttribute("href");if(a&&a.indexOf("/cdn-cgi/l/email-protection") > -1  && (a.length > 28)){s='';j=27+ 1 + a.indexOf("/cdn-cgi/l/email-protection");if (a.length > j) {r=parseInt(a.substr(j,2),16);for(j+=2;a.length>j&&a.substr(j,1)!='X';j+=2){c=parseInt(a.substr(j,2),16)^r;s+=String.fromCharCode(c);}j+=1;s+=a.substr(j,a.length-j);}t.innerHTML=s.replace(/</g,"&lt;").replace(/>/g,"&gt;");l[i].setAttribute("href","mailto:"+t.value);}}catch(e){}}}catch(e){}})();
  /* ]]> */
  </script>
</body>
</html>
