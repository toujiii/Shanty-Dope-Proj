document.getElementById('sidebarToggle').addEventListener('click', function() {
    const sidebar = document.getElementById('adminSidebar');
    sidebar.classList.toggle('d-none');
});
const sidebar = document.getElementById('adminSidebar');
const sidebarToggle = document.getElementById('sidebarToggle');

sidebarToggle.addEventListener('click', function() {
    if (window.innerWidth < 1200) {
        sidebar.classList.toggle('sidebar-float');
    } else {
        sidebar.classList.toggle('d-block');
    }
});

document.addEventListener('click', function(event) {
    if (
        window.innerWidth < 1200 &&
        sidebar.classList.contains('sidebar-float') &&
        !sidebar.contains(event.target) &&
        event.target !== sidebarToggle
    ) {
        sidebar.classList.remove('sidebar-float');
    }
});