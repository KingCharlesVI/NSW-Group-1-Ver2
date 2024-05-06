document.addEventListener("DOMContentLoaded", function() {
    const progressBar = document.getElementById("progress-bar");
    const totalSections = 2; // Total number of sections including the first one

    // Calculate and update progress
    function updateProgress() {
        const currentSection = parseInt(window.location.hash.replace("#section", ""));
        const progress = (currentSection / totalSections) * 100;
        progressBar.style.width = progress + "%";
    }

    // Update progress when the page loads and if the hash changes
    updateProgress();
    window.addEventListener("hashchange", updateProgress);
});