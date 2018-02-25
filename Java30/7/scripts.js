let countdown;
const timerDisplay = document.querySelector('.display__time-left');
const setTime = document.querySelector('[name=minutes]');
const endTime = document.querySelector('.display__end-time');
const buttons = document.querySelectorAll('[data-time]');
const audio = document.querySelector('.done');
//const form = document.querySelector('#custom');

function timer(seconds){
    clearInterval(countdown);
    const now = Date.now();
    const then = now + seconds * 1000;
    displayEndTime(then);
    displayTimeLeft(seconds);
    
    countdown = setInterval(() => {
        const secondsLeft = Math.round((then - Date.now()) / 1000);
        if(secondsLeft < 1){
            audio.play();
            clearInterval(countdown);
        }
        displayTimeLeft(secondsLeft);
    }, 1000)
}

function displayTimeLeft(seconds){
    
    const min = Math.floor(seconds / 60);
    const remainderSec = seconds % 60;
    const display = `${min}:${remainderSec < 10 ? '0' : ''}${remainderSec}`;
    
    timerDisplay.textContent = display;
    document.title = 'Time Left: '+ display;
}

function displayEndTime(timestamp){
    const end = new Date(timestamp);
    const hours = end.getHours();
    const minutes = end.getMinutes();
    endTime.textContent = `Be Back At: ${hours}:${minutes < 10 ? '0' : ''}${minutes}`;
}

function startTime(e){
    const seconds = this.dataset.time;
    timer(seconds);
}


buttons.forEach(btn => btn.addEventListener('click', startTime));
document.customForm.addEventListener('submit', function(e){
    e.preventDefault();
    const mins = this.minutes.value;
    this.reset();
    this.focus();
    timer(mins * 60);
})