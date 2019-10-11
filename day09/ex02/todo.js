window.onload = function() {

    const cookie_array = document.cookie.split(';');
        if (Array.isArray(cookie_array) && cookie_array[0] != '') {
            for (let i = 0; i < cookie_array.length; i++) {
                let tmp = cookie_array[i].split('=');
                addTask(tmp[1]);
            }
        }

    function addNewTODOPopup() {
        const name = prompt("ADD NEW TODO");
        addTask(name);
    }

    function addTask(name) {

        if (Boolean(name)) {
            const divNode = document.createElement("div");
            const textDivNode = document.createTextNode(name);
            divNode.appendChild(textDivNode);
            divNode.addEventListener("click", deleteTask);
            divNode.addEventListener("click", function() {
                delCookies(name);
            });
            document.getElementById("ft_list").insertBefore(divNode, document.getElementById("ft_list").firstChild);
            addCookies(name);
        }

    }

    function deleteTask() {
        if (confirm("REMOVE TODO?")) {
            this.parentNode.removeChild(this);
        }
    }

    function addCookies(name) {
        document.cookie = name + "=" + name + ";";
    }

    function delCookies(name) {
        document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    }


        window.addNewTODOPopup = addNewTODOPopup;
};
