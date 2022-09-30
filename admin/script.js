
let val = document.querySelector('#check')
function exemple()
{
	if (document.getElementById("demo5").checked == false)
	{
        val.sub.disabled = true;
	}else{
        val.sub.disabled = false;
    }
}

    let form = document.querySelector('#ajoute')
    
    form.vote.addEventListener('change', function(){
        validvote(this);
    })
    const validvote = function(inputvote) {
        let voteRegexp = new RegExp('[01]{1}');
        let testvote = voteRegexp.test(inputvote.value);
        let small = inputvote.nextElementSibling;
        if(testvote){
            small.innerHTML = 'valeur vote valide';
        }else{
            small.innerHTML = 'valeur vote invalide';
        }
    };
