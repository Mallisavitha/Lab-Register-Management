function changeMode(mode) {
    if (mode === 'STUDENT') {
        window.location.href = 'student.html'; 
    } else if (mode === 'STAFF') {
        window.location.href = 'staff.html'; 
    }else if (mode === 'ADMIN') {
        window.location.href = 'admin_login.html'; 
    }
}
document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("loginForm");

    form.addEventListener("submit", function(event) {
        event.preventDefault();
        const laptopOption = document.getElementById("dot-1").checked || document.getElementById("dot-2").checked;

        if (laptopOption) {
            window.location.href = 'submit.html';
        } else {
            alert("Please select the Laptop option.");
        }
    });

    const cancelButton = document.querySelector("button[type='cancel']");
    cancelButton.addEventListener("click", function() {
        history.back(); 
    });
});

document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); 
    var query = document.getElementById("msg").value;
    if (query.trim() !== "") {
        window.location.href = "submit.html";
    } else {
        alert("Please fill out the query field.");
    }
});



document.addEventListener("DOMContentLoaded", function() {
    var okButton = document.getElementById("okButton");

    okButton.addEventListener("click", function() {
        window.close();
    });
});



$(document).ready(function() {
    $('#registerNumber').on('blur', function() {
        var registerNumber = $(this).val();

        $.ajax({
            type: 'POST',
            url: 'fetch_data.php',
            data: { registerNumber: registerNumber },
            success: function(response) {
                var data = JSON.parse(response);
                $('input[name="name"]').val(data.name);
                $('input[name="departmentYear"]').val(data.departmentYear);
            },
            error: function() {
                console.log('Error fetching data from the server.');
            }
        });
    });
});


