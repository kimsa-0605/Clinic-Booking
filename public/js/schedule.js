function myfunc(div) {
    var items = document.querySelectorAll('.book-slots-day-item');
    
    items.forEach(function(item) {
        item.classList.remove("active");
    });

    div.classList.add("active");
}

function myfuncItem(div) {
    var items = document.querySelectorAll('.book-slot_timevalue');
    
    items.forEach(function(item) {
        item.classList.remove("active");
    });

    div.classList.add("active");
}