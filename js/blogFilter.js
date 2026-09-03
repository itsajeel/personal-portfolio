// Auto-submit the month filter form when the dropdown changes

document.addEventListener('DOMContentLoaded', function () {

    var monthSelect = document.getElementById('month');

    if (monthSelect) {
        monthSelect.addEventListener('change', function () {
            monthSelect.form.submit();
        });
    }
});
