// Check for saved user preference, if any, on load of the website
if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark');
} else {
    document.documentElement.classList.remove('dark');
}

function updateToggleButtons() {
    const toggleButtons = document.querySelectorAll('.dark-mode-toggle');
    const isDark = document.documentElement.classList.contains('dark');
    toggleButtons.forEach(btn => {
        btn.textContent = isDark ? 'Light Mode' : 'Dark Mode';
    });
}

document.addEventListener('DOMContentLoaded', () => {
    const toggleButtons = document.querySelectorAll('.dark-mode-toggle');
    updateToggleButtons();

    toggleButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            console.log('Dark mode toggle clicked');
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.theme = 'light';
                console.log('Switched to light mode');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.theme = 'dark';
                console.log('Switched to dark mode');
            }
            updateToggleButtons();
        });
    });
});
