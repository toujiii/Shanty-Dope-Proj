document.addEventListener('DOMContentLoaded', function() {
    const desc = document.getElementById('charityDesc1');
    const toggle = document.getElementById('charityToggle1');
    if (desc && toggle) {
        desc.addEventListener('shown.bs.collapse', () => toggle.classList.replace('bi-caret-down-fill', 'bi-caret-up-fill'));
        desc.addEventListener('hidden.bs.collapse', () => toggle.classList.replace('bi-caret-up-fill', 'bi-caret-down-fill'));
    }
});
