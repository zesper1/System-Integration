    // Function to display report details

    document.querySelectorAll('.report-item').forEach(message => {
        message.addEventListener('click', function() {
            const messageId = this.dataset.id;
            const spliced = SpliceId(messageId);
            console.log("id: "+ spliced);
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
    

    function showDetails(category, reportIndex) {
        var report = getReport(category, reportIndex);
        var attachmentPath = getAttachmentPath(category, report.attachment);
        
        // Update the details on the right side
        updateDetailsInfo(report);
        updateDetailsAttachment(report.attachment, attachmentPath);
    
        // Show the main content section if hidden
        document.querySelector('.main-content').style.display = 'block';
    }
    
    // Get the report based on category and index
    function getReport(category, reportIndex) {
        if (category === "violations") {
            return reports.violations[reportIndex];
        } else if (category === "complaints") {
            return reports.complaints[reportIndex];
        }
    }
    
    // Get the correct attachment path based on category
    function getAttachmentPath(category, attachment) {
        var baseDir;
        if (category === "violations") {
            baseDir = "../../../public/assets/images/violations/";
        } else if (category === "complaints") {
            baseDir = "../../../public/assets/images/complains/";
        }
        return baseDir + attachment;
    }
    
    // Update the details information (student info or report details)
    function updateDetailsInfo(report) {
        if (report.violation) {
            document.querySelector('.details-photo').src = report.photo;
            document.querySelector('.details-info').innerHTML = `
                <p><strong>Student Name:</strong> ${report.name}</p>
                <p><strong>Student ID:</strong> ${report.id}</p>
                <p><strong>Violation:</strong> ${report.violation}</p>
            `;
        } else {
            document.querySelector('.details-photo').src = report.photo;
            document.querySelector('.details-info').innerHTML = `
                <p><strong>Report Name: </strong>${report.reportName}</p>
                <p><strong>Complaint: </strong>${report.complaint}</p>
            `;
        }
        document.querySelector('.violation-details p').textContent = report.details;
    }
    
    // Update the attachment link and styles
    function updateDetailsAttachment(attachment, attachmentPath) {
        var attachmentElement = document.querySelector('.rep-attachment');
        if (attachment == null) {
            attachmentElement.setAttribute('href', '#');
            attachmentElement.setAttribute('style', 'pointer-events: none; color: grey;');
            attachmentElement.setAttribute('title', 'No attachment available');
        } else {
            attachmentElement.setAttribute('href', attachmentPath);
            attachmentElement.setAttribute('style', 'color: blue;');
            attachmentElement.setAttribute('title', '');
        }
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