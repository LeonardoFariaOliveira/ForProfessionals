

function onLoad(){

  document.getElementById("form_emp").style.display = "none";
  document.getElementById("form_emp_2").style.display = "none";
  document.getElementById("form_prof").style.display = "none";
  document.getElementById("form_prof_2").style.display = "none";
 document.getElementById("valid_1").style.display =  "none";
 document.getElementById("valid_1_2").style.display =  "none";
 document.getElementById("pos_button_login").style.display = "block";


}

function aparecer_emp(){

  document.getElementById("pos_button_login").style.display = "none";
 document.getElementById("form_emp").style.display = "inline-block";
 document.getElementById("form_emp").style.marginLeft = 0;
 document.getElementById("form_emp_2").style.display = "inline-block";
 document.getElementById("form_emp_2").style.marginLeft = 0;
 document.getElementById("admin").style.display = "none";
 document.getElementById("pos_button_login").style.display = "none";
 

}

function aparecer_emp_cadastro(){

  document.getElementById("pos_button_login").style.display = "none";
  if($(window).width() <= "480"){

    document.getElementById("form_emp_2").style.display = "inline-block";
    document.getElementById("form_emp_2").style.marginLeft = 0;

  }
  else{

    document.getElementById("form_emp").style.display = "inline-block";
    document.getElementById("form_emp").style.marginLeft = 0;

  }


 document.getElementById("pos_button_login").style.display = "none";
 

}

function aparecer_prof(){

  document.getElementById("pos_button_login").style.display = "none";
  document.getElementById("form_prof").style.display = "inline-block";
  document.getElementById("form_prof").style.marginLeft = 0;
 document.getElementById("admin").style.display = "none";
 document.getElementById("form_prof_2").style.display = "inline-block";
 document.getElementById("form_prof_2").style.marginLeft = 0;


}


function aparecer_prof_cadastro(){

  document.getElementById("pos_button_login").style.display = "none";
  if($(window).width() <= "430"){

    document.getElementById("form_prof_2").style.display = "inline-block";
    document.getElementById("form_prof_2").style.marginLeft = 0;

  }
  else{

    document.getElementById("form_prof").style.display = "inline-block";
    document.getElementById("form_prof").style.marginLeft = 0;

  }
//  document.getElementById("admin").style.display = "none";


}


function IsEqual(){

 let senha =	document.getElementById("senha").value;
 let confirm = document.getElementById("confirm_senha").value;


 if(senha != confirm){
  if( confirm == ""){
    document.getElementById("valid_1").style.display =  "none";
  
   }
   else if (confirm != ""){
    document.getElementById("valid_1").style.display =  "block";

   }

  

 }
 else{

   document.getElementById("valid_1").style.display =  "none";

 }



}

function IsEqual_2(){

  let senha =	document.getElementById("senha_2").value;
  let confirm = document.getElementById("confirm_senha_2").value;
 
  if(senha != confirm){
 
    if( confirm == ""){
      document.getElementById("valid_1_2").style.display =  "none";
    
     }
     else if (confirm != ""){
      document.getElementById("valid_1_2").style.display =  "block";
  
     }
 
  }
  else{
 
    document.getElementById("valid_1_2").style.display =  "none";
 
  }
 
 }

 
 
 

 function lookedin(){

    window.location = "../admin/admin_form.html";


 }


 function voltar(){

  document.getElementById("pos_button_login").style.display = "inline-block";
  document.getElementById("form_prof").style.display = "none";
  document.getElementById("form_prof").style.marginLeft = 9999;

  document.getElementById("form_emp").style.display = "none";
  document.getElementById("form_emp").style.marginLeft = 9999;

  document.getElementById("admin").style.display = "none";



 }

 function voltar_cadastro(){

  document.getElementById("pos_button_login").style.display = "inline-block";
  document.getElementById("form_prof").style.display = "none";
  document.getElementById("form_prof").style.marginLeft = 9999;
  document.getElementById("form_prof_2").style.display = "none";
  document.getElementById("form_prof_2").style.marginLeft = 9999;
  document.getElementById("form_emp").style.display = "none";
  document.getElementById("form_emp").style.marginLeft = 9999;
  document.getElementById("form_emp_2").style.display = "none";
  document.getElementById("form_emp_2").style.marginLeft = 9999;
  document.getElementById("admin").style.display = "none";



 }



