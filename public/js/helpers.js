window.addEventListener('DOMContentLoaded', () => {
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
    /**
     * Format number
     */
    const formatNumber = new Intl.NumberFormat();
    let elementFormat = document.querySelectorAll('.numberFormat');
    Array.from(elementFormat).forEach(function (e) {
        e.addEventListener('keyup', function () {
            let data = this.value.replace(/[^0-9]+/g, "");
            this.value = formatNumber.format(data);
        })
    })
    /**
     *  notify required
     */
    const eInputRequired = document.querySelectorAll('[required]');
    Array.from(eInputRequired).forEach(function (e) {
        e.addEventListener('invalid', function () {
            this.setCustomValidity('Không được để trống');
        })
        e.addEventListener('input', function () {
            this.setCustomValidity('');
        })
    })
});
