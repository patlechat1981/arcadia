 
                //LISTES DE TOUS LES ANIMAUX
 let userList = [
              
            {
                "race": "Mario",
               "surname": "Rossi",
                "age": 22,
                "avatar": `<img src="/assets/images animaux/animaux_jungle/baboon.jpg" alt="">`
            },
            {
                "name": "Lisa",
                "surname": "Miao",
                "age": 17,
                "avatar": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQGKuSwhUo-wJS3O6mRG4NHGAimIwLJ1b5yLFMLAxgH8RIJf4y5iBN-HcAL3pTXCqQuVYk&usqp=CAU"
            },
            {
                "name": "Luise",
                "surname": "Alphonse",
                "age": 50,
                "avatar": "https://images.squarespace-cdn.com/content/v1/5899247486e6c0878c6d8dbd/1618241262162-A566IE5DRQ28BQQIZT6L/Staff+Photos.png"
            }
        ]

        function disegnaUtenti(etaMinimo) {
            document.getElementById('lista_utenti').innerHTML = ""
            
            userList.forEach(function (objet) {
                if (objet.age > etaMinimo) {
                    console.log(`${objet.name} - ${objet.surname} .`)

                    document.getElementById('lista_utenti').innerHTML += `
            <div class="user">
                <b> ${objet.name} </b>
                ${objet.surname} <br>
                <img src="${objet.avatar}" style=" height:210px"></img>
            </div>`
                }
            })
        }