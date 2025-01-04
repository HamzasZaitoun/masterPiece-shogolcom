// JavaScript to handle tab switching
document.addEventListener('DOMContentLoaded', function () {
    const tabLinks = document.querySelectorAll('.tab-link');
    const contentSections = document.querySelectorAll('.content-section');

    tabLinks.forEach((tab) => {
        tab.addEventListener('click', function () {
            tabLinks.forEach((link) => link.classList.remove('active'));
            contentSections.forEach((section) => section.style.display = 'none');
            tab.classList.add('active');            
            const targetTab = tab.getAttribute('data-tab');
            document.getElementById(targetTab).style.display = 'block';
        });
    });
    // document.getElementById('posts').style.display = 'block';
});
