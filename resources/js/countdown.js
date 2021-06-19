// Set the date we're counting down to
const countDown = document.getElementById('countDown');
const gameDate = countDown.getAttribute('data-date')
let countDownDate = new Date(gameDate).getTime();

// Update the count down every 1 second
let x = setInterval(function() {

// Get today's date and time
let now = new Date().getTime();

// Find the distance between now and the count down date
let distance = countDownDate - now;

// Time calculations for days, hours, minutes and seconds
let days = Math.floor(distance / (1000 * 60 * 60 * 24));
let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
let seconds = Math.floor((distance % (1000 * 60)) / 1000);

// Display the result in the element with id="countDown"
countDown.innerHTML = days + "d " + hours + "h "
+ minutes + "m " + seconds + "s";

// If the count down is finished, write some text
if (distance < 0) {
    clearInterval(x);
    countDown.innerHTML = "Pronositici";
}
}, 500);