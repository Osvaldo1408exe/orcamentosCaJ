const currantYear = new Date().getFullYear() + 1;  
const buttons = document.querySelectorAll('.btn button');  
 
buttons.forEach(button => {
    const buttonValue = parseInt(button.textContent);  

    if (buttonValue > currantYear) { 
        button.style.display = "none";
    }
});