$(document).ready(function () {
    $("#sidebarCollapse").on("click", function () {
        $("#sidebar, #content").toggleClass("active");
    });

    $(".show-report").click(function () {
        var reportId = $(this).data("report-id");
        $.ajax({
            url: "/get-report-details/" + reportId,
            type: "GET",
            success: function (response) {
                $("#reportModal").html(response);
            },
            error: function () {
                alert("Error fetching report details.");
            },
        });
    });

    $(".show-feedback").click(function () {
        var laporanId = $(this).data("feedback-id");
        $.ajax({
            url: "/get-feedback-details/" + laporanId,
            type: "GET",
            success: function (response) {
                $("#feedbackModalBody").html(response);
            },
            error: function () {
                alert("Error fetching feedback details.");
            },
        });
    });
});
document.getElementById("searchBtn").addEventListener("click", function () {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchId");
    filter = input.value.toUpperCase();
    table = document.querySelector("table");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
});
// Add an event listener to detect changes in the dropdown menu
document
    .getElementById("kategoriFilter")
    .addEventListener("change", function () {
        var selectedCategory = this.value; // Get the selected category value

        // Loop through each row in the table body
        var rows = document.querySelectorAll("#data tbody tr");
        rows.forEach(function (row) {
            var categoryCell = row.cells[3]; // Assuming the category is in the fourth cell (index 3)

            // Check if the selected category matches the row's category or if "All Categories" is selected
            if (
                selectedCategory === "all" ||
                categoryCell.textContent.trim() === selectedCategory
            ) {
                row.style.display = ""; // Show the row
            } else {
                row.style.display = "none"; // Hide the row
            }
        });
    });

var startDateInput = document.getElementById("startDate");
var endDateInput = document.getElementById("endDate");

// Add event listeners to detect changes in the date inputs
startDateInput.addEventListener("change", filterTableByDate);
endDateInput.addEventListener("change", filterTableByDate);

// Function to filter the table based on the date range
function filterTableByDate() {
    var startDate = new Date(startDateInput.value);
    var endDate = new Date(endDateInput.value);

    // Loop through each row in the table body
    var rows = document.querySelectorAll("#data tbody tr");
    rows.forEach(function (row) {
        var rowDate = new Date(row.cells[5].textContent); // Assuming the date is in the sixth cell (index 5)

        // Compare the row date with the selected date range
        if (
            (startDate == "Invalid Date" || rowDate >= startDate) &&
            (endDate == "Invalid Date" || rowDate <= endDate)
        ) {
            row.style.display = ""; // Show the row if it's within the selected date range
        } else {
            row.style.display = "none"; // Hide the row if it's outside the selected date range
        }
    });
}
