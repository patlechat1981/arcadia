
/* gestion switch cards */

function hide(id) {
  document.getElementById(id).style.display = 'none';
}


function show(id) {
  document.getElementById(id).style.display = 'block';
}
function employeLesAnimaux() {
  show('afficheEmpAnimaux');
  hide('afficheServEmploye');
}
function employeLeServices() {
  show('afficheServEmploye');
  hide('afficheEmpAnimaux');
}
function veterinaireAnimaux() {
  show('afficheVetAnimaux');
  hide('afficheVetHabitats');
}
function veterinaireHabitats() {
  show('afficheVetHabitats');
  hide('afficheVetAnimaux');
}
function administrateurService() {
  show('afficheAdminServices');
  hide('afficheAdminMembers');
}
function administrateurMembers() {
  show('afficheAdminMembers');
  hide('afficheAdminServices');
}
    /* gestion switch Cards */

    /*  gestion de mon Filter Search */

function search(element, idCard) {

  const value = element.value;
  console.log('valeur: ', element.value);

  const cardList = [...document.querySelectorAll(idCard)];
  cardList.forEach((card) => {
    const name = card.getAttribute('search_name');
    if (name.toLowerCase().indexOf(value.toLowerCase()) === -1) {
      card.style.display = "none";
    } else {
      card.style.display = "block";
    }
  })
}

function checkId(el, id) {
  if(id === parseInt(el.value)) {
    document.getElementById("delete_submit_" + id).removeAttribute("disabled");
  } else {
    document.getElementById("delete_submit_" + id).setAttribute("disabled", true);
  }
}

function checkEquals(a, idElementB, idButton) {
  const b = document.getElementById(idElementB);
  const button = document.getElementById(idButton);

  if(a.value !== b.value) {
    a.style = "border: 3px solid red";
    b.style = "border: 3px solid red";
    button.setAttribute("disabled", true);
  } else {
    a.style = "border: 3px solid green";
    b.style = "border: 3px solid green";
    button.removeAttribute("disabled");
  }
}

 /*fin  gestion de mon Filter Search */
