document.querySelectorAll('[data-drawer-toggle]').forEach(button => {
    button.addEventListener('click', function () {
        const categoryId = this.getAttribute('data-drawer-toggle');
        // Hide all category containers
        document.querySelectorAll('[id^="category-"]').forEach(category => {
            category.classList.add('hidden');
        });
        document.getElementById(categoryId).classList.remove('hidden');
    });
});
