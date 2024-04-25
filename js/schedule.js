// Define the array of events
const events = [
    { title: "Training", date: "Event Date", description: "Event Description" },
    { title: "Operation", date: "Event Date", description: "Event Description" },
    { title: "Event 3 Title", date: "Event Date", description: "Event Description" }
];

// Function to display upcoming events
function displayUpcomingEvents() {
    const eventElements = document.querySelectorAll('.event');
    events.forEach((event, index) => {
        const eventElement = eventElements[index];
        eventElement.querySelector('h3').textContent = event.title;
        eventElement.querySelector('.event-date').textContent = event.date;
        eventElement.querySelector('.event-description').textContent = event.description;
    });
}

// Function to update events periodically (e.g., every week)
function updateEvents() {
    // Rotate events array to simulate a weekly loop
    const lastEvent = events.pop();
    events.unshift(lastEvent);
    // Display updated events
    displayUpcomingEvents();
}

// Initialize function to display initial set of events
function init() {
    displayUpcomingEvents();
    // Update events periodically (e.g., every week)
    setInterval(updateEvents, 7 * 24 * 60 * 60 * 1000); // Update every 7 days
}

// Call init function when the page loads
document.addEventListener('DOMContentLoaded', init);