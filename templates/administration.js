
  function hide(id) {
    document.getElementById(id).style.display = 'none';
  }

  function show(id) {
    document.getElementById(id).style.display = 'block';
  }

  function adminServices() {
    show('afficheAdminServices');
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


  function search(element, idCard) {

    const value = element.value;
    console.log('valeur: ', element.value);
 
    const cardList = [...document.querySelectorAll(idCard)];
    cardList.forEach((card) => {
      const  name = card.getAttribute('search_name');
      if(name.toLowerCase().indexOf(value.toLowerCase()) === -1) {
        card.style.display = "none";
      } else {
        card.style.display = "block";
      }
    })
  }
