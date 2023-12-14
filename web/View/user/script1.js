const container = document.getElementById('container');
const SaveInfoBtn = document.getElementById('register');
const FindTrimesterBtn = document.getElementById('login');


SaveInfoBtn.addEventListener('click',()=> {
    container.classList.add("active");
});

FindTrimesterBtn.addEventListener('click', () => {
    container.classList.remove("active");
});