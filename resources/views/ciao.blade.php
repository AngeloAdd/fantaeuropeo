<x-layout>

<div class="container">
    <div class="row">
        <div class="col-8">
            <input id="searchTeams" class="form-control" type="text">
        </div>
        <div class="col-8">
            <ul id="teamsList" class="list-unstyled text-dark d-flex flex-wrap justify-content-around align-items-center w-100">
            
            </ul>
        </div>
    </div>
</div>

@push('scripts')

    <script>
    
  // Example GET method implementation:
if(document.getElementById('searchTeams'))
{
    let search = document.getElementById('searchTeams');
    let list = document.getElementById('teamsList');
    async function getData(url = '/api/squadre') {
        
            
            const response = await fetch(url, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify()
            });
            return response.json(); // parses JSON response into native JavaScript objects
        
    }

    getData()
    .then(data => {

        
        let rose = data.map( el => el.team )
        let flat = rose.flat(1)
        let players = flat.map(el => `${el.name.charAt(0).toUpperCase() + el.name.slice(1)} ${el.surname.charAt(0).toUpperCase()+ el.surname.slice(1)}`)

        
        /* search.addEventListener('keyup', (el) => {
            let value = el.target.value.toLowerCase();
            if(value === ""){
                return list.innerHTML = "";
            }
            
            let ricercaPerTeam = data.filter( el => {
                    return el.national_team.toLowerCase().match(value)
                })
            showTeams(ricercaPerTeam);
            }) */
             
            search.addEventListener('keyup', (el) => {
            let value = el.target.value.toLowerCase();
            if(value === ""){
                return list.innerHTML = "";
            }
            let ricercaPerGiocatore = players.filter( el => {
                    return el.toLowerCase().match(value)
                })
            showPlayers(ricercaPerGiocatore);
            })


            function showTeams (teams) {
                list.innerHTML = "";
                return teams.forEach( el => {
                    let li = document.createElement('li');
                    li.classList.add('m-3')
                    li.appendChild(document.createTextNode(el.national_team))
                    return list.appendChild(li)
                });
            }

            function showPlayers (teams) {
                list.innerHTML = "";
                return teams.forEach( (el, i) => {
                    if(i<11){
                        let li = document.createElement('li');
                        li.classList.add('m-3')
                        li.appendChild(document.createTextNode(el))
                        return list.appendChild(li)
                    } else{
                        return;
                    }
                });
            }

            
            
    
    
    })
}

    </script>

@endpush

</x-layout>