// Function to toggle button visibility
function toggleButtonVisibility(buttonId) {
    const button = document.getElementById(buttonId);

    // Toggle the 'hidden' class
    if (button.classList.contains('hidden')) {
        button.classList.remove('hidden');
    } else {
        button.classList.add('hidden');
    }
}

// Function to open a website when a button is clicked
function openWebsite(url) {
    window.open(url, '_blank');  // Opens the website in a new tab
}
