

/*   employé */

/* let clickEmployeAnimaux = document.getElementById("employeLesAnimaux");
let AfficheEmployeAnimaux = document.getElementById("afficheEmpAnimaux");


let clickEmployeServices = document.getElementById("employeLeServices");
let AfficheEmployeServices = document.getElementById("afficheServEmploye"); */

/* veterinaire */

/* let clickVetAnimaux = document.getElementById("veterinaireAnimaux");
let AfficheVeteAnimaux = document.getElementById("afficheVetAnimaux");


let clickVetHabitat = document.getElementById("veterinaireHabitats");
let AfficheVetHabitat = document.getElementById("afficheVetHabitats");
 */

/* administrateur */

/* 
let clickadminservices = document.getElementById("adminServices");
let AfficheAdminServices = document.getElementById("afficheAdminServices");
 */

/* 
  if(clickEmployeAnimaux){
 clickEmployeAnimaux.addEventListener ("click", function (){
     AfficheEmployeAnimaux.style.display = "block"; 
     

})};  

 if(clickEmployeServices){
    clickEmployeServices.addEventListener ("click", function (){
        AfficheEmployeServices.style.display = "block"; 
       
   
   })};  

 
   if(clickadminservices){
    clickadminservices.addEventListener ("click", function (){
        AfficheAdminServices.style.display = "block"; 
               
   })};

   if(clickVetAnimaux){
    clickVetAnimaux.addEventListener ("click", function (){
        AfficheVeteAnimaux.style.display = "block"; 
               
   })}

   if(clickVetHabitat){
    clickVetHabitat.addEventListener ("click", function (){
        AfficheVetHabitat.style.display = "block"; 
               
   })}


 */
   function adminServices() {
    let AfficheAdminServices = document.getElementById('afficheAdminServices');
    if(AfficheAdminServices.style.display != '') {
        AfficheAdminServices.style.display = '';
    } else {
        AfficheAdminServices.style.display = 'none';
        
    }

    
  }
 
   function employeLesAnimaux() {
    let AfficheEmployeAnimaux = document.getElementById('afficheEmpAnimaux');
    if(AfficheEmployeAnimaux.style.display != '') {
        AfficheEmployeAnimaux.style.display = '';
    } else {
        AfficheEmployeAnimaux.style.display = 'none';
    }
  }

  
  function employeLeServices() {
    let AfficheEmployeServices = document.getElementById('afficheServEmploye');
    if(AfficheEmployeServices.style.display != '') {
        AfficheEmployeServices.style.display = '';
    } else {
        AfficheEmployeServices.style.display = 'none';
    }
  }

  
  function veterinaireAnimaux() {
    let AfficheVeteAnimaux  = document.getElementById('afficheVetAnimaux');
    if(AfficheVeteAnimaux.style.display != '') {
        AfficheVeteAnimaux.style.display = '';
    } else {
        AfficheVeteAnimaux.style.display = 'none';
    }
  }

  function veterinaireHabitats() {
    let AfficheVetHabitat = document.getElementById('afficheVetHabitats');
    if(AfficheVetHabitat.style.display != '') {
        AfficheVetHabitat.style.display = '';
    } else {
        AfficheVetHabitat.style.display = 'none';
    }
  }
 

 /*     
  <script type="text/javascript">
  function affiche_contenu() {
    var cible = document.getElementById('cible');
    if(cible.style.display != '') {
      cible.style.display = '';
    } else {
      cible.style.display = 'none';
    }
  }
  </script>
</head>
<body>
<div id="conteneur">

  <p>Cliquez sur le bloc ci-dessous :</p>
  <div id="source"
  onclick="affiche_contenu()">
  <p>Un texte quelconque.<br>Vraiment quelconque.</p>
  </div>

  <div id="cible" style="display:none;">
  <em>InnerHTML de la &lt;div id = "source"><br>dans la &lt;div id = "cible"></em>
  <p>Un texte quelconque.<br>Vraiment quelconque.</p>
  </div>
   
</div> */

