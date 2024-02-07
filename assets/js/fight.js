


const fightBtn = document.querySelector('#fight')

fightBtn.addEventListener('click', async function (){


    let response = await fetch('./process/process_fight_ajax.php')
    let data = await response.json();
    console.log(data);
    document.querySelector('#fight_message').innerHTML += `
        <div class="alert alert-primary m-0" role="alert">
            ${data.result[0]}
        </div>
        <div class="alert alert-danger m-0" role="alert">
            ${data.result[1]}
        </div>
    `

    document.querySelector('#pv_monster').innerHTML = data.monster.hp <= 0 ? 0 : data.monster.hp
    document.querySelector('#pv_hero').innerHTML = data.hero.hp <= 0 ? 0 : data.hero.hp

    document.querySelector('.progress-bar-hero').style.width = data.hero.hp <= 0 ? 0 : data.hero.hp + "%"
    document.querySelector('.progress-bar-monster').style.width = data.monster.hp <= 0 ? 0 : data.monster.hp  + "%"

    if (data.monster.hp <= 0 || data.hero.hp <= 0 ) {
        fightBtn.classList.add('disabled')
    }

})



// let data = {
//     name : 'Hamza',
//     result : [
//         'Test1',
//         'Test2'
//     ]
// }

// data.name
// data.result[0]