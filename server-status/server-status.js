function updateServerStatus() {
    // Make an AJAX request to your server-side API endpoint
    fetch('/server-status/server-status.php')
        .then(response => response.json())
        .then(data => {
            // Update the widget based on the received data
            const statusElement = document.getElementById('server-status');
            const indicatorElement = document.querySelector('.status-indicator');

            statusElement.textContent = data.isOnline ? 'Online' : 'Offline';
            indicatorElement.className = 'status-indicator ' + (data.isOnline ? 'online' : 'offline');
        })
        .catch(error => {
            console.error('Error fetching server status:', error);
            // Handle errors appropriately
        });
}

// Initial call to update server status
updateServerStatus();