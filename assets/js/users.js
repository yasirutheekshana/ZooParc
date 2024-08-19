document.addEventListener('DOMContentLoaded', () => {
    fetch('../ZooParc/assets/php/fetchUsers.php')
        .then(response => response.json())
        .then(users => {
            const tableBody = document.querySelector('#users-table');
            tableBody.innerHTML = ''; // Clear existing content

            users.forEach(user => {
                const row = document.createElement('li');
                row.className = 'table-row';
                row.innerHTML = `
                    <div class="col col-1" data-label="ID">${user.id}</div>
                    <div class="col col-2" data-label="Name">${user.name}</div>
                    <div class="col col-3" data-label="Email">${user.email}</div>
                    <div class="col col-5" data-label="Actions">
                        <button class="delete-button" onclick="deleteUser(${user.id})">Delete</button>
                    </div>
                `;
                tableBody.appendChild(row);
            });
        })
        .catch(error => console.error('Error fetching users:', error));
});

function deleteUser(userId) {
    if (confirm('Are you sure you want to delete this user?')) {
        fetch('../ZooParc/assets/php/deleteUser.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                'id': userId
            })
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                alert(result.success);
                // Refresh the user list
                document.querySelector('#users-table').innerHTML = '';
                fetch('../ZooParc/assets/php/fetchUsers.php')
                    .then(response => response.json())
                    .then(users => {
                        const tableBody = document.querySelector('#users-table');
                        users.forEach(user => {
                            const row = document.createElement('li');
                            row.className = 'table-row';
                            row.innerHTML = `
                                <div class="col col-1" data-label="ID">${user.id}</div>
                                <div class="col col-2" data-label="Name">${user.name}</div>
                                <div class="col col-3" data-label="Email">${user.email}</div>
                                <div class="col col-5" data-label="Actions">
                                    <button class="delete-button" onclick="deleteUser(${user.id})">Delete</button>
                                </div>
                            `;
                            tableBody.appendChild(row);
                        });
                    })
                    .catch(error => console.error('Error fetching users:', error));
            } else {
                alert(result.error);
            }
        })
        .catch(error => console.error('Error deleting user:', error));
    }
}


