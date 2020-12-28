function submitApi(idModalDestroy, api) {
    let form = document.querySelector(idModalDestroy).querySelector('form');
    form.action = api;
    form.submit();
}
