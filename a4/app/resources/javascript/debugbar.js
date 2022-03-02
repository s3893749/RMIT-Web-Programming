//Code created by Jack Harris 28/12/2021
let buttons =  []
let content = []

 window.onload = function(){
     buttons = [
         document.getElementById("messagesButton"),
         document.getElementById("sessionButton"),
         document.getElementById("requestButton")
     ]
     content = [
         document.getElementById("messageContent"),
         document.getElementById("sessionContent"),
         document.getElementById("requestContent")
     ]
 }

function showMessages(){

    buttons[0].className= "active"
    buttons[1].className= ""
    buttons[2].className= ""

    content[0].className="active-content"
    content[1].className="inactive-content"
    content[2].className="inactive-content"

}
function showSession(){

    buttons[0].className= ""
    buttons[1].className= "active"
    buttons[2].className= ""

    content[0].className="inactive-content"
    content[1].className="active-content"
    content[2].className="inactive-content"

}
function showRequest(){

    buttons[0].className= ""
    buttons[1].className= ""
    buttons[2].className= "active"

    content[0].className="inactive-content"
    content[1].className="inactive-content"
    content[2].className="active-content"

}
function closeDebugbar(){
    buttons[0].className= ""
    buttons[1].className= ""
    buttons[2].className= ""
    content[0].className="inactive-content"
    content[1].className="inactive-content"
    content[2].className="inactive-content"
}