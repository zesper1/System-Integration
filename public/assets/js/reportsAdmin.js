    // Function to display report details

    document.querySelectorAll('.report-item').forEach(message => {
        message.addEventListener('click', function() {
            const messageId = this.dataset.id;
            const spliced = SpliceId(messageId);
            console.log(spliced);
            // Check if the message is already read
            if (!this.classList.contains('Read')) {
                markMessageAsRead(spliced);
            }
        });
    });

    function SpliceId(id){
        const spliced = id;
        const parts = spliced.split("-");
        return parts[1];
    }

    function markMessageAsRead(messageId) {
        fetch('../../../src/config/markAsRead.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: messageId })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            // Log the raw response text for debugging
            return response.text(); // Read as text first
        })
        .then(text => {
            console.log("Raw response:", text); // Log the response
            return JSON.parse(text); // Now parse the text to JSON
        })
        .then(data => {
            console.log("Parsed data:", data);
            if (data.success) {
                const messageDiv = document.getElementById(`report-${messageId}`);
                messageDiv.classList.remove('unread');
                messageDiv.classList.add('read');
            } else {
                console.error('Failed to mark as read');
            }
        })
        .catch(error => console.error('Error:', error));
    }
    

    function showDetails(reportIndex) {
        const report = reports[reportIndex];
        const attachment = report.attachment;
        
        var filedirec = "../../../public/assets/images/violations/" + report.attachment;
        // Update the details on the right side
        document.querySelector('.details-photo').src = report.photo;
        document.querySelector('.details-info').innerHTML = `
            <p><strong>Student Name:</strong> ${report.name}</p>
            <p><strong>Student ID:</strong> ${report.id}</p>
            <p><strong>Violation:</strong> ${report.violation}</p>
        `;
        document.querySelector('.violation-details p').textContent = report.details;

        if(attachment == null){
            document.querySelector('.rep-attachment').setAttribute('href', '#');
            document.querySelector('.rep-attachment').setAttribute('style', 'pointer-events: none; color: grey;');
            document.querySelector('.rep-attachment').setAttribute('title', 'No attachment available');
        } else {
            document.querySelector('.rep-attachment').setAttribute('href', filedirec);
            document.querySelector('.rep-attachment').setAttribute('style', 'color: blue;');
            document.querySelector('.rep-attachment').setAttribute('title', '');
        }
        // Show the main content section if hidden
        document.querySelector('.main-content').style.display = 'block';
    }

    // Add click event listeners to each report item
    document.querySelectorAll('.report-item').forEach((item, index) => {
        item.addEventListener('click', () => {
            // Highlight the selected report item
            document.querySelectorAll('.report-item').forEach(i => i.classList.remove('active'));
            item.classList.add('active');

            // Show the corresponding report details
            showDetails(index);
        });
    });
    console.log(reports);