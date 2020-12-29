function submitApi(idModalDestroy, api) {
    let form = document.querySelector(idModalDestroy).querySelector('form');
    form.action = api;
    form.submit();
}

function questionLoading(mes) {
    if (confirm(mes) == false) {
        event.preventDefault();
    }
}

function destroyItems(url, idModal) {
    let id;
    let destroy = document.querySelectorAll('.destroy');
    let form = document.querySelector(idModal).querySelector('form');
    if (destroy) {
        Array.from(destroy).forEach(function (e) {
            e.addEventListener('click', function () {
                id = this.dataset.id;
            });
        })

        document.querySelector('#button-destroy').addEventListener('click', function () {
            let api = url + id;
            form.action = api;
            form.submit();
        })
    }
}
