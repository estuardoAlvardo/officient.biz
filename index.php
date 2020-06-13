<?php 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Asistente Virtual</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaina+2:wght@400;500;600;700;800&display=swap" rel="stylesheet">


</head>
<body>

	<style type="text/css">
body{
	font-family: 'Baloo Bhaina 2', cursive;
}

.card0 {
    
    border-radius: 0px
}

.card2 {
    margin: 0px 40px
}

.logo {
    width: 100px;
    height: 100px;
    margin-top: 10px;
    margin-left: 40%


}


.image {
    width: 460px;
    height: 380px
}

.border-line {
    border-right: 1px solid #EEEEEE
}


.or {
    width: 10%;
    font-weight: bold
}

.text-sm {
    font-size: 19px !important
}

::placeholder {
    color: #BDBDBD;
    opacity: 1;
    font-weight: 300
}

:-ms-input-placeholder {
    color: #BDBDBD;
    font-weight: 300
}

::-ms-input-placeholder {
    color: #BDBDBD;
    font-weight: 300
}

input,
textarea {
    padding: 10px 12px 10px 12px;
    border: 1px solid lightgrey;
    border-radius: 2px;
    margin-bottom: 5px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    color: #2C3E50;
    font-size: 14px;
    letter-spacing: 1px
}

input:focus,
textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #304FFE;
    outline-width: 0
}

button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
}

a {
    color: inherit;
    cursor: pointer
}

.btn-blue {
    background-color: #1A237E;
    width: 150px;
    color: #fff;
    border-radius: 2px
}

.btn-blue:hover {
    background-color: #000;
    cursor: pointer
}

.bg-blue {
    color: #fff;
    background-color: #1A237E
}

@media screen and (max-width: 991px) {
    .logo {
        margin-left: 40%;
    }

    .image {
        width: 300px;
        height: 220px
    }

    .border-line {
        border-right: none
    }

    .card2 {
        border-top: 1px solid #EEEEEE !important;
        margin: 0px 15px
    }
}



	</style>
	<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
           
            <div class="col-lg-6">
                <div class="card2 card border-0 px-4 py-5">

                	<div class="row"> <img  src="img/logo.png" class="logo"> </div>
                	<form method="post" action="controller/login.php">
                    <div class="row px-3"> <label class="mb-1">
                            <h6 class="mb-0 text-sm">Usuario</h6>
                        </label> <input class="mb-4" type="text" name="txtUsuario" placeholder="Ingresa tu usuario"> </div>
                    <div class="row px-3"> <label class="mb-1">
                            <h6 class="mb-0 text-sm">Contraseña</h6>
                        </label> <input type="password" name="txtPassword" placeholder="Ingresa tu contraseña"> </div>
                    <div class="row px-3 mb-4">
                      
                    </div>
                    <div class="row mb-3 px-3"> <input type="submit" class="btn btn-blue text-center" value="Entrar"> </div>
                  </form>  
                   
                </div>
            </div>

             <div class="col-lg-6">
                <div class="card1 pb-5">
                    
                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="img/fonto.svg" class="image"> </div>
                    
                </div>
            </div>
        </div>

    </div>
</div>

</body>
</html>