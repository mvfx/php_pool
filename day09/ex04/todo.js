$(document).ready(function(){
    $.ajax({
        url: 'select.php',
        success: function (response) {
            var arr = JSON.parse(response);
            if (Array.isArray(arr) && arr[0] != '') {
                for (i = 0; i < arr.length; i++) {
                    if (arr[i] != '') {
                        tmp = arr[i].split(';');
                        addTaskToDOM(tmp[1]);
                    }
                }
            }
        }
    });
})

function addNewTODOPopup() {
    const name = prompt("ADD NEW TODO");
    addTask(name);
}


function addTask(name) {
    addTaskToDOM(name);
    $.ajax({
        type: "GET",
        url: "insert.php?" + name + "=" + name
    });
}

function addTaskToDOM(name) {
    if (Boolean(name)) {
        $('#ft_list').prepend($('<div>' + name + '</div>').click(deleteTask));
    }
}

function deleteTask() {

    if (confirm("REMOVE TODO?")) {
        this.remove();
        makeDel(this.innerHTML);
    }
}


function makeDel(name) {
    $.ajax({
        type: "GET",
        url: "delete.php?" + name + "=" + name,
        success: function () {
            console.log('delete success');
        }
    });
}