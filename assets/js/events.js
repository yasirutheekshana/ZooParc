document.addEventListener('DOMContentLoaded', () => {
    fetch('../ZooParc/assets/php/fetchEvents.php')
        .then(response => response.json())
        .then(events => {
            const tableBody = document.querySelector('#users-table');
            tableBody.innerHTML = ''; // Clear existing content

            events.forEach(event => {
                const row = document.createElement('li');
                row.className = 'table-row';
                row.innerHTML = `
                    <div class="col col-1" data-label="ID">${event.id}</div>
                    <div class="col col-2" data-label="Name">${event.event_name}</div>
                    <div class="col col-3" data-label="Description">${event.description}</div>
                    <div class="col col-4" data-label="Date">${event.event_date}</div>
                    <div class="col col-5" data-label="Time">${event.event_time}</div>
                    <div class="col col-6" data-label="Actions">
                        <button class="edit-button" onclick="editEvent(${event.id})">Edit</button>
                        <button class="delete-button" onclick="deleteEvent(${event.id})">Delete</button>
                    </div>
                `;
                tableBody.appendChild(row);
            });
        })
        .catch(error => console.error('Error fetching events:', error));
});

function deleteEvent(eventId) {
    if (confirm('Are you sure you want to delete this event?')) {
        fetch(`../ZooParc/assets/php/deleteEvent.php?id=${eventId}`, {
            method: 'GET',
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Event deleted successfully');
                location.reload(); // Reload the page to refresh the list of events
            } else {
                alert('Error deleting event: ' + data.message);
            }
        })
        .catch(error => console.error('Error:', error));
    }
}

function editEvent(eventId) {
    window.location.href = `editEvent.php?id=${eventId}`;
}
