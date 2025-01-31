<?php 
    include "bienvenue.php";
?>
<DOCTYPE html>
<html lang="en">
<html>
    <head>
        <title>Chatbot</title>
        <style>
            #zoneconversation{
                background-color:coral;
                overflow: scroll;
                border:1px solid;
            }
            #inputtext{
                width:918px;
            }
        </style>
    </head>
    <body>
        <div id="profil_utilisateur" name="profilutilisateur"></div>
        <a href="connexion.html">connexion</a>
        <div style="height:500px;width:1000px" id="zoneconversation" name="zoneconversation">
            <div id="zonemessages"></div>
        </div>
        <input type="text" id="inputtext" name="msg">
        <button onclick="sendMessage()">Envoyer</button>
        <script>
            window.onload=loadMessage();
            function sendMessage(){
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange=function(){
                    if(xhr.readyState==4 && xhr.status ==200){
                        var msg = document.getElementByid("message");
                        msg.value=" ";
                    }else{
                        console.log(xhr.responseText); 
                    }
                }
                xhr.open('POST','../controller/msgController.php?action=send',true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.send('message='+msg.value);
                loadMessage();
            }
            function loadMessage(){
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange=function(){
                    if(xhr.readyState==4 && xhr.status ==200){
                        document.getElementByid("conversation").innerHTML = xhr.responseText;
                    }else{
                        console.log(xhr.responseText); 
                    }
                }
                xhr.open('GET','../controller/msgController.php?action=msgs',true);
                xhr.send('message='+msg.value);
            }
            setinterval(loadMessage(),1000);
        </script>
        
    </body>
</html>