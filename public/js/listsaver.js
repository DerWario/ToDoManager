document.addEventListener('DOMContentLoaded', function () {

    const mainContainer = document.querySelector('.main-container');
    const checkboxes = mainContainer.querySelectorAll('input[type="checkbox"]');


    checkboxes.forEach(checkbox => {
        checkbox.checked = localStorage.getItem(checkbox.id) === 'true';
    });

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            localStorage.setItem(checkbox.id, checkbox.checked.toString());
        });
    });
});

