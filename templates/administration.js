
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
 
  function search(idCard) {
    const cardList = [...document.querySelectorAll(idCard)];
    cardList.forEach((card) => {
      console.log(card.getAttribute('search_name'));
      // todo
    })
  }

  //example 
  search(".cardanimal")