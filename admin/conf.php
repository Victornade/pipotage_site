<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Configuration - Pipotager</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



<script language="JavaScript">
   
   reload_datas()
   
   function reload_datas() {
			   var text =[];
			   newtText=[];
				var texteEnLigne = [];
				 var conf = new XMLHttpRequest();

				conf.onreadystatechange = function()
			   {
					if (conf.readyState == 4)
					{
						// Makes sure it's found the file.
						text = conf.responseText;
						texteEnLigne = text.split(/\r\n|\n/);

						 for (var i=0; i<texteEnLigne.length; i++)
						 {
								
								 id=texteEnLigne[i].split(' = ');
								 if (document.getElementById(id[0]))
										document.getElementById(id[0]).placeholder=id[1];
								if(id[0] == 'arrosage_auto')
								{
									if(id[1] == 'On') {
										document.getElementById("arrosage_on").checked=true;
										document.getElementById("arrosage_off").checked=false;
										 document.getElementById("arrosage_etat").className="info";
									} else {
										document.getElementById("arrosage_on").checked=false;
										document.getElementById("arrosage_off").checked=true;
										document.getElementById("arrosage_etat").className="danger";
									   }
								}
							}

						} 
					}
				   conf.open("GET", "config.cfg", true);
					conf.send(null)
        
     }
</script>
<script>
        newttext=[]
function maj_config(id) {
                     var conf1 = new XMLHttpRequest();
                
                        conf1.onreadystatechange = function()
                          {
                                var newtext= "[config]";
                               if (conf1.readyState == 4)
                               {

                                   // Makes sure it's found the file.
                                   text = conf1.responseText;
                                   texteEnLigne = text.split(/\r\n|\n/);
                                    for (var i=1; i<texteEnLigne.length; i++)
                                    {
                                          ligne=texteEnLigne[i].split(' = ');
                                          if (ligne[0] == id )
                                          {
                                             ligne[1] = document.getElementById(id).value;
                                          }
                                          if (id == "arrosage_on" && ligne[0] == "arrosage_auto")
                                          {
                                                    ligne[1]= "On";
                                                   document.getElementById("arrosage_etat").className="info";
                                          }
                                            if (id == "arrosage_off" && ligne[0] == "arrosage_auto")
                                            {
                                                     ligne[1]= "Off";
                                                    document.getElementById("arrosage_etat").className="danger";
                                             }
                                         newtext=newtext + "/\r\n|\n/" + ligne[0] +" = "+ligne[1]
                                    }
                                }
                                
                                   if(newtext.length >= text.length/2) //On renvoie le fichier lorsqu'il est complet
                                   {    
                                         window.open("storedata.php?config="+newtext,"_self")
                                        
                                   }
                                } 
 
 
       conf1.open("GET", "config.cfg", true);
        conf1.send(null)
 
}
</script>
</head>

<body>

    <div id="wrapper">

     <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Pipotager 1.0</a>
            </div>
            <!-- Top Menu Items -->
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li >
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li >
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Graphiques</a>
                    </li>
                  <li class="active">
                        <a href="configuration.html"><i class="fa fa-fw fa-wrench"></i> Configuration</a>
                    </li>
                    <li>
                        <a href="camera.html"><i class="fa fa-fw fa-desktop"></i> Camera live</a>
                    </li>
                    <li>
                        <a href="photos.html"><i class="fa fa-fw fa-desktop"></i> Photos</a>
                    </li>                    
                    <li>
                        <a href="apropos.html"><i class="fa fa-long-arrow-right fa-child"></i> À propos de moi</a>
                    </li>
                    <li>
                        <a href="biographie.html"><i class="fa fa-fw fa-edit"></i> Biographie, Sitographie</a>
                    </li>
                   </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">


                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Panneau de configuration
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-wrench"></i> Panneau de Configuration
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

 
               <div class=" show row" id ="reservoir">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Le reservoir d'eau est vide !</strong> 
                        </div>
                    </div>
                </div>
                <!-- /.row -->

              
              
              
              
                <!-- /.row -->
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-fw fa-desktop"></i>Gestion de l'éclairage</h3>
                            </div>
                            <div class="panel-body">
                                <div>
                                <table class="table table-bordered">
                                <tr>
                                    <td>
                                                                <strong>Heure d'allumage :</strong>
                                    </td><td>
                                                                <input type="text" class="form-control" id="heure_jour" placeholder=" " onchange="maj_config('heure_jour')">
                                                      
                                    </td> 
                                </tr>
                                <tr>
                                    <td>
                                                        <strong>Heure d'extinction :</strong>
                                    </td><td>
                                                        <input type="text" class="form-control" id="heure_nuit" placeholder=" " onchange="maj_config('heure_nuit')">
                                    </td>
                                </tr>
                            </table>                         
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.row -->


 <!-- /.row -->
                <div class="row " >
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-fw fa-desktop"></i>Gestion de l'irrigation</h3>
                            </div>
                            <div  class="panel-body">
                                <divclass="table-responsive">
                                <table class="table table-bordered">
                                <tr id="arrosage_etat" class="active">
                                            <td>
                                                         <strong> Irrigation automatique : </strong>
                                            </td>
                                            <td>
                                                        <label class="radio-inline" onchange="maj_config('arrosage_on')">
                                                                    <input type="radio" name="inlineRadioOptions" id="arrosage_on" value="option2" onchange="maj_config('arrosage_on')"> On </label>
                                                        <label class="radio-inline" onchange="maj_config('arrosage_off')">
                                                                    <input type="radio" name="inlineRadioOptions" id="arrosage_off" value="option1" onchange="maj_config('arrosage_off')"> Off</label>
                                            </td>
                                </tr>
                                <tr> 
                                            <td>
                                                                             <div>Heure d'arrosage du matin :</div>
                                            </td><td>
                                                                             <input type="text" class="form-control" id="arrosage_matin" placeholder=" " onchange="maj_config('arrosage_matin')">
                                            </td>
                                    </tr>
                                    <tr>
                                              <td>
                                                                             <div>Heure d'arrosage du soir :</div>
                                            </td><td>
                                                                             <input type="text" class="form-control" id="arrosage_soir" placeholder=" " onchange="maj_config('arrosage_soir')">
   
                                            </td>

                                    <tr>
                                            <td>
                                                                             <div >Seuil d'humidité 1 (%) :</div>
                                            </td><td>
                                                                             <input type="text" class="form-control" id="seuil1" placeholder=" " onchange="maj_config('seuil1')">
                                            </td>
                                </tr>
                                 <tr>
                                            <td>
                                                                             <div >Seuil d'humidité 2 (%) :</div>
                                            </td><td>
                                                                             <input type="text" class="form-control" id="seuil2" placeholder=" " onchange="maj_config('seuil2')">
                                            </td>
                                </tr>                                
                                <tr>
                                            <td>                                
                                                                             <div>Seuil d'humidité 3 (%) :</div>
                                            </td><td>
                                                                             <input type="text" class="form-control" id="seuil3" placeholder=" " onchange="maj_config('seuil3')">
                                            </td>
                                </tr>
                              <tr>
                                            <td>                                
                                                                             <div>Seuil d'humidité 4 (%) :</div>
                                            </td><td>
                                                                             <input type="text" class="form-control" id="seuil4" placeholder=" " onchange="maj_config('seuil4')">
                                            </td>
                                </tr>                                                                
                                </table >
                             </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.row -->


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
