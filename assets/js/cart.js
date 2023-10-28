function changecart(type, element){
    let tabs = document.getElementsByClassName('click');

    for (i = 0; i < tabs.length; i++){
        tabs[i].style.background='var(--white)';
        tabs[i].style.color='var(--black)';
    }

    element.style.background='var(--green)';
    element.style.color='var(--white)';

    document.getElementById(type).style.display='block';
    switch(type){
        case'cart':
            document.getElementById('cart').style.display ='flex';
            document.getElementById('order-list').style.display ='none';
            break;

        case'order-list':
            document.getElementById('cart').style.display ='none';
            document.getElementById('order-list').style.display ='block';
            break;
    }
}