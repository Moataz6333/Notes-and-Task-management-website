let buttons = document.querySelectorAll(".classifications button");
let all = buttons[0];
// cliking buttons
for(let i=1 ; i<buttons.length ;i++){
    buttons[i].addEventListener('click',function(){
        if(! buttons[i].classList.contains("clicked")){
            clear();
            displayNote(buttons[i].id);
            buttons[i].classList.add("clicked");
            buttons[i].style.backgroundColor="black";
        }else{
            
            buttons[i].classList.remove("clicked");
            all.classList.add("clicked");
            all.style.backgroundColor="black";
            buttons[i].style.backgroundColor="#13C0F4";

            showAll();

        }
    });
}

//all btn clicked
all.addEventListener('click',function(){
    clear();
    showAll();
    all.classList.add("clicked");
    all.style.backgroundColor="black";
});

    //fucntion to clear all
    function clear(){
        for(let i=0 ; i<buttons.length ;i++){
            buttons[i].classList.remove("clicked");
            buttons[i].style.backgroundColor="#13C0F4";

        }
    }

    //function for displaying classes
    function displayNote(name){
        notes =document.querySelectorAll(".note");
        for(let i=0; i<notes.length ; i++){
            if(!notes[i].classList.contains(name)){
                notes[i].style.display="none";
            }else{
                notes[i].style.display="grid";
            }
        }
    }

    //function to show all
    function showAll(){
        notes =document.querySelectorAll(".note");
        for(let i=0; i<notes.length ; i++){
           
                notes[i].style.display="grid";
        }
    }

    
//  show function
    let notes =document.querySelectorAll(".note");
    for(let i=0; i<notes.length ;i++){
        notes[i].addEventListener("click",function(){
        window.location.href=`http://127.0.0.1:8000/show/${notes[i].id}`;
    });
    }
    




