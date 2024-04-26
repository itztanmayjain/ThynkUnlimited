// AdminPanel Javascript
let loginForm = document.querySelector('.user-content');

document.querySelector('#user-btn').onclick = () =>{
    loginForm.classList.toggle('active');
    navbar.classList.remove('active');
}

let banner = document.querySelector('.login-form');

document.querySelector('#login-btn').onclick = () =>{
    banner.classList.toggle('active');
    navbar.classList.remove('active');
}

$(document).ready(function(){
    $(".hamburger").click(function(){
       $(".wrapper").toggleClass("collapse");
    });
});

// Login Page JavaScript
function validation()  
{  
    var id=document.f1.email.value;  
    var ps=document.f1.password.value;  
    if(id.length=="" && ps.length=="") {  
        alert("User Name and Password fields are empty");  
        return false;  
    }  
    else  
    {  
        if(id.length=="") {  
            alert("User Name is empty");  
            return false;  
        }   
        if (ps.length=="") { 
        alert("Password field is empty");  
        return false;  
        }  
    }                             
}  

var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add-button'); //Add button selector
    var wrapper = $('.item'); //Input field wrapper
    var fieldHTML = '<div class="item"><br><br><label for="title">Title </label><input type="text" name="title"><br><br><label for="field">Chapter Description </label><textarea name="description" rows="4" cols="50"></textarea><br><br><label for="file">Upload Video</label><input type="file" id="myFile" name="filename"><br><br><br><a href="javascript:void(0);" class="remove_button"></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
            document.getElementById("counting").innerText = x;
        }
    });

});

//Add Course
submitForms = function(){
    document.forms["form1"].submit();
    document.forms["form2"].submit();
}

var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
