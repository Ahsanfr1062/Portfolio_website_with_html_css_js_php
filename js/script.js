let containeri = document.querySelectorAll('.content-container')
    let question  = document.querySelector('.question')
    let answer = document.querySelectorAll('.answer')
    let container = document.querySelector('acordian');
    let task = document.createElement('div')
    task.classList.add('.content-container');
    let night = document.createElement('div');
    night.classList.add('.question');
    for(i = 0;i<containeri.length;i++){
        containeri[i].addEventListener('click',function() {
            console.log('ok');
            this.classList.toggle('active');
        })
    }