/* Get our elements */
const player = document.querySelector('.player');
const video = player.querySelector('.viewer');
const progress = player.querySelector('.progress');
const progressBar = player.querySelector('.progress__filled');
const toggle = player.querySelector('.toggle');
const ranges = player.querySelectorAll('.player__slider');
const skipButtons = player.querySelectorAll('[data-skip]');
const full = player.querySelector('.full');

/* Build our Functions */
function togglePlay(){
    if(video.paused){
        video.play();
        toggle.innerHTML = '| |';    
    }else{
        video.pause();
        toggle.innerHTML = '►';
    }
}

function skip(){
    video.currentTime += parseFloat(this.dataset.skip);
}

function toggleRange(){
    video[this.name] = this.value;
}

function handleProgress(){
    const percent = (video.currentTime / video.duration)*100;
    progressBar.style.flexBasis = `${percent}%`;
}

function scrub(e){
    const scrubTime = (e.offsetX / progress.offsetWidth) * video.duration;
    video.currentTime = scrubTime;
}
/* Hook up event listeners */
let mousedown = false;
video.addEventListener('click', togglePlay);
toggle.addEventListener('click', togglePlay);
skipButtons.forEach(btn => btn.addEventListener('click', skip));
ranges.forEach(rng => rng.addEventListener('change', toggleRange));
//ranges.forEach(rng => rng.addEventListener('click', () clicked = true));
video.addEventListener('timeupdate', handleProgress);
progress.addEventListener('click', scrub);
progress.addEventListener('mousemove', (e) => mousedown && scrub(e));
progress.addEventListener('mousedown', () => mousedown = true);
progress.addEventListener('mouseup', () => mousedown = false);
full.addEventListener('click', function(){
  player.classList.toggle('fullscreen');  
})