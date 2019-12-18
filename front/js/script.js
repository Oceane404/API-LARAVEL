document.querySelector('button').addEventListener("click", () => { 
    let internID = document.querySelector('#gargamel').value;

    fetch(`http://192.168.33.10/api/interns/${internID}`)
    .then ((response) => {
        response.json()
        .then((date)=> {
            
            internFName = date.description[0].firstname;
            
            let h2 = document.createElement('p');
            h2.innerHTML = internFName;
            
            document.querySelector("#intern-infos").innerHTML = '';
            document.querySelector("#intern-infos").appendChild(h2);
        })
    })
      
})





