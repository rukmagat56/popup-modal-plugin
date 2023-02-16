

 function popup_modal(){
    
    const myModalAlternative = new bootstrap.Modal('.modal');
     myModalAlternative.show();
    }

 setTimeout(popup_modal,2000);



function addEvent(obj, evt, fn) {
    if (obj.addEventListener) {
        obj.addEventListener(evt, fn, false);
    } else if (obj.attachEvent) {
        obj.attachEvent("on" + evt, fn);
    }
}

addEvent(document, 'mouseout', function(evt) {
    if (evt.toElement == null && evt.relatedTarget == null) {
        const myModalAlternative = new bootstrap.Modal('.modal');
        myModalAlternative.show();
    };
});


// function on_close(){
//     const myModalAlternative = new bootstrap.Modal('.modal');
//     myModalAlternative.exit();
// }
// document.querySelector('.close').addEventListener('click',on_close);


// function addEvent(obj, evt, fn) {
//     if (obj.addEventListener) {
//         obj.addEventListener(evt, fn, false);
//     } else if (obj.attachEvent) {
//         obj.attachEvent("on" + evt, fn);
//     }
// }

// addEvent(document, 'mouseout', function(evt) {
//     if (evt.toElement == null && evt.relatedTarget == null) {
//         const myModalAlternative = new bootstrap.Modal('.modal');
//      myModalAlternative.show();
//     };
// });

// document.querySelector('button.close').addEventListener("click", function(){
//     console.log('hello');
// });





