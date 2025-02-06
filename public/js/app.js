//navbar
function showSidebar(){
    const sidebar = document.querySelector('.sidebar');

    sidebar.style.display = 'flex';
}

function hideSidebar(){
    const sidebar = document.querySelector('.sidebar');

    sidebar.style.display = 'none';
}

// slider
// var counter = 1;
// setInterval(function(){
//     document.getElementById('radio' + counter).checked = true;
//     counter++;
//     if(counter > 2){
//         counter = 1;
//     }
// }, 5000); 

// let slideIndex = 0;

$('.carousel').carousel({
    interval: 2000
})

// image upload
// const selectImage = document.querySelector('.options');
// const inputImage = document.querySelectorAll('#file');

// selectImage.addEventListener('click', function(){
//     inputImage.click();
// });