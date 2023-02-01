<?php

if(isset($_POST['submit']))
{
  /*print_r($_POST['nome']);
  print_r('<br>');
  print_r($_POST['email']);
  print_r('<br>');
  print_r($_POST['telefone']);
  print_r('<br>');
  print_r($_POST['serviços']);
  print_r('<br>');
  print_r($_POST['data']);
  print_r('<br>');
  print_r($_POST['hora']);
}*/
include_once('conexao.php');
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$servicos = $_POST['servicos'];
$dia = $_POST['dia'];
$hora = $_POST['hora'];
$erro = '';

//N pode ser esta vazio
if(empty($nome)){
    $erro = "Preencha o nome";
}else if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
    $erro = "<font color=\"gold\">Preencha o email corretamente EX:exemplo@gmail.com";
}else if(empty($telefone) || strlen($telefone)>12){
    $erro = "<font color=\"gold\">Preencha um numero EX:(22)94628-9283";
}
if($erro){
    echo "ERRO: $erro";
}else {      
$result = mysqli_query($conexao, "INSERT INTO cadastro(nome,email,telefone,servicos,dia,hora)
VALUES ('$nome','$email','$telefone','$servicos','$dia','$hora')");
echo "<b><font color=\"gold\"> Sua reserva foi feita com sucesso </font></b>";
}

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário | GN</title>
    <style>

        echo{
        color:yellow;
        }
        
        body{
            font-family:Helvetica (Max Miedinger, 1957);
            background-image: linear-gradient(to right,black, black);
        }
        .box{
            color: gold;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 60%;
        }
        fieldset{
            border: 4px solid gold;
        }
        legend{
            border: 1px solid gold;
            padding: 10px;
            text-align: center;
            background-color: ;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .labelInput{
            font-size:20px;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }
        #serviços{
          width: 30%;
         }
         
         #hora{
            background color: yellow;
         }
         .appt{
            color: black;
         }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit{
            background-image: linear-gradient(to right,#FFD700, #FFD700);
            width: 100%;
            border: none;
            padding: 15px;
            color: black;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right,gold, gold));
        }
    </style>
</head>
<body>
    <div class="box">
        <form action="contato.php" method="POST">
            <fieldset>
                <legend><b>Reserva de Clientes</b></legend>
                <br>
                <div class="inputBox">
                    <input value="<?php if(isset($_POST['nome'])) echo $_POST['nome']; ?>" type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput" >Nome completo:</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email:</label>          
                  </div> 
                <br><br>
                <div class="inputBox">
                    <input value="<?php if(isset($_POST['telefone'])) echo $_POST['telefone']; ?>" type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone:</label>
                </div>
                <br><br>
                <label for="servicos">Serviços:</label>
                <select id="servicos" name="servicos" STYLE="color: black; font-family: Verdana; font-weight: bold; font-size: 14px; background-color: gold;">
                <option value="escova">Escova</option>
                 <option value="tratamento">Tratamento</option>
                 <option value="penteado">Penteado</option>
                <option value="corte">Corte</option>
                <option value="coloracao">Coloração</option>
                <option value="mechas">Mechas</option>
                </select>
                </form>
                <br><br><br>
                 <label for="birthdaytime">Data:</label>
                 <input type="date" id="dia" name="dia" STYLE="color: black; font-family: Verdana; font-weight: bold; font-size: 14px; background-color: gold;" size="10" maxlength="30">
                </form>
                <br><br><br>
                 <label for="appt">Hora:</label>
                <input type="time" id="hora" name="hora" style="background-color: gold; ">              
                 </form>
                <br><br>
                <input type="submit" name="submit" id="submit" >
                <br><br>
                 <h3>se você ja fez sua reserva <a href="index.html" style="color: gold;">clique aqui</a>
            </fieldset>
        </form>
    </div>
</body>
</html>