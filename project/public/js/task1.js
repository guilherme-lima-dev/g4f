$(function () {
    let container = document.querySelector('.container');
    let j = 10;
    let row = '';
    for(let i = 1; i <= 100; i++){
        if(j === 10){
            row = createRow();
            container.append(row);
            j=0;
        }
        let prime = isPrime(i);
        let multiples = getMultiples(i);

        let div = createDivCircle(prime, multiples, i);

        row.appendChild(div);
        j++;
    }
    $('[data-toggle="popover"]').click(()=>{
        $('[data-toggle="popover"]').popover();
        setTimeout(()=>{
            $('[data-toggle="popover"]').popover('hide');
        }, 3000)

    });

});

function createRow(){
    let row = document.createElement('div');
    row.classList.add('row');
    row.classList.add('d-flex');
    row.classList.add('justify-content-center');

    return row;
}

function createDivCircle(prime, multiples, number){
    let resultTooltip = prime ? "PRIMO" : multiples;
    let div = document.createElement('div');
    div.classList.add('col-lg-1');
    div.classList.add('col-md-1');
    div.classList.add('mb-5');
    div.classList.add('mb-lg-0');
    div.setAttribute("data-toggle","popover");
    div.setAttribute("data-placement","top");
    div.setAttribute("data-content",resultTooltip);

    div.innerHTML = "<span class='service-icon rounded-circle mx-auto mb-3' style='cursor:pointer;'> "+number+" </span>";
    return div;
}

function getMultiples(number){
    const arr = [], l = ~~(100/number); //l is floor limit loop

    for(let x = 1; x <= l; x++){
        arr.push(x*number);
    }

    return arr;
}

function isPrime(number){
    if(number<=1) {
        return false;
    }
    for(let i=2;i<=number/2;i++) {
        if((number%i)===0){
            return  false;
        }
    }
    return true;
}
