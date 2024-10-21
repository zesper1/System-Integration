    // Function to display report details
    function showDetails(reportIndex) {
        const report = reports[reportIndex];
        var filedirec = "../../../public/assets/images/violations/" + report.attachment;
        // Update the details on the right side
        document.querySelector('.details-photo').src = report.photo;
        document.querySelector('.details-info').innerHTML = `
            <p><strong>Student Name:</strong> ${report.name}</p>
            <p><strong>Student ID:</strong> ${report.id}</p>
            <p><strong>Violation:</strong> ${report.violation}</p>
        `;
        document.querySelector('.violation-details p').textContent = report.details;
        document.querySelector('.rep-attachment').setAttribute('href', filedirec);
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