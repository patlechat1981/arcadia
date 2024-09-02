

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

  function hideAll() {
    document.getElementById('afficheAdminServices').style.display = 'none';
    document.getElementById('afficheEmpAnimaux').style.display = 'none';
    document.getElementById('afficheServEmploye').style.display = 'none';
    document.getElementById('afficheVetAnimaux').style.display = 'none';
    document.getElementById('afficheVetHabitats').style.display = 'none';
  }

   function adminServices() {
    hideAll();
    let AfficheEmployeServices = document.getElementById('afficheAdminServices');
    AfficheEmployeServices.style.display = 'block';
  }
 
   function employeLesAnimaux() {
    hideAll();
    let AfficheEmployeAnimaux = document.getElementById('afficheEmpAnimaux');
    AfficheEmployeAnimaux.style.display = 'block';
  }

  
  function employeLeServices() {
    hideAll();
    let AfficheEmployeServices = document.getElementById('afficheServEmploye');
    AfficheEmployeServices.style.display = 'block';
  }

  
  function veterinaireAnimaux() {
    hideAll();
    let AfficheEmployeServices = document.getElementById('afficheVetAnimaux');
    AfficheEmployeServices.style.display = 'block';
  }

  function veterinaireHabitats() {
    hideAll();
    let AfficheEmployeServices = document.getElementById('afficheVetHabitats');
    AfficheEmployeServices.style.display = 'block';
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

