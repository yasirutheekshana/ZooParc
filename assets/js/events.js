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
                        <button class="edit-button" onclick="openEditModal(${event.id})">Edit</button>
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

// Open the edit modal and populate the form
function openEditModal(eventId) {
    fetch(`../ZooParc/assets/php/getEvent.php?id=${eventId}`)
        .then(response => response.json())
        .then(event => {
            // Populate the form fields with event data
            document.getElementById('editEventId').value = event.id;
            document.getElementById('editEventName').value = event.event_name;
            document.getElementById('editEventDescription').value = event.description;
            document.getElementById('editEventDate').value = event.event_date;
            document.getElementById('editEventTime').value = event.event_time;

            // Show the modal
            const modal = document.getElementById('editModal');
            modal.style.display = 'block';
        })
        .catch(error => console.error('Error fetching event data:', error));
}

// Close the modal when clicking the close button
document.querySelector('.modal .close').addEventListener('click', () => {
    document.getElementById('editModal').style.display = 'none';
});

// Handle form submission for updating the event
document.getElementById('editEventForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const eventId = document.getElementById('editEventId').value;
    const eventName = document.getElementById('editEventName').value;
    const eventDescription = document.getElementById('editEventDescription').value;
    const eventDate = document.getElementById('editEventDate').value;
    const eventTime = document.getElementById('editEventTime').value;

    fetch('../ZooParc/assets/php/updateEvent.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            id: eventId,
            event_name: eventName,
            description: eventDescription,
            event_date: eventDate,
            event_time: eventTime
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Event updated successfully');
            location.reload(); // Reload the page to refresh the list of events
        } else {
            alert('Error updating event: ' + data.message);
        }
    })
    .catch(error => console.error('Error:', error));
});
