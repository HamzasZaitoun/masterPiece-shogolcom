// Side Menu Functionality
const sideMenu = document.querySelector('aside');
const menuBtn = document.getElementById('menu-btn');
const closeBtn = document.getElementById('close-btn');
const darkMode = document.querySelector('.dark-mode');

menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
});

closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
});

darkMode.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode-variables');
    darkMode.querySelector('span:nth-child(1)').classList.toggle('active');
    darkMode.querySelector('span:nth-child(2)').classList.toggle('active');
})

// Edit and Save Buttons Functionality
function toggleEdit() {
    const jobForm = document.querySelectorAll('#jobForm input');
    const userForm = document.querySelectorAll('#userForm input');
    const categoryForm = document.querySelectorAll('#categoryForm input');
    const applicationsForm = document.querySelectorAll('#applicationsForm input');

    const saveButton = document.getElementById("saveButton");
    const editButton = document.getElementById("editButton");

    // Toggle each field between disabled and enabled state
    jobForm.forEach(element => {
        element.disabled = !element.disabled;
    });
    userForm.forEach(element => {
        element.disabled = !element.disabled;
    });
    categoryForm.forEach(element => {
        element.disabled = !element.disabled;
    });
    applicationsForm.forEach(element => {
        element.disabled = !element.disabled;
    });

    // Show the Save button and hide the Edit button in edit mode
    saveButton.style.display = saveButton.style.display === "none" ? "inline-block" : "none";
    editButton.style.display = editButton.style.display === "none" ? "inline-block" : "none";
}

function saveChanges() {
    const jobForm = document.querySelectorAll('#jobForm input');
    let jobData = {};
    const userForm = document.querySelectorAll('#userForm input');
    let userData = {};
    const categoryForm = document.querySelectorAll('#categoryForm input');
    let categoryData = {};
    const applicationsForm = document.querySelectorAll('#applicationsForm input');
    let applicationsData = {};

    // Collect updated data from the form and disable fields again
    jobForm.forEach(element => {
        jobData[element.id] = element.value;
        element.disabled = true;  // Lock fields after saving
    });
    userForm.forEach(element => {
        userData[element.id] = element.value;
        element.disabled = true;  // Lock fields after saving
    });
    categoryForm.forEach(element => {
        categoryData[element.id] = element.value;
        element.disabled = true;  // Lock fields after saving
    });
    applicationsForm.forEach(element => {
        applicationsData[element.id] = element.value;
        element.disabled = true;  // Lock fields after saving
    });

    // Hide the Save button and show the Edit button after saving
    document.getElementById("saveButton").style.display = "none";
    document.getElementById("editButton").style.display = "inline-block";
}

// SweetAlert for Confirmation on Form Submission
function userForm(form) {
    swal.fire({
        title: "Are you sure to add this user?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, Add it!",
        cancelButtonText: "No, cancel!",
        dangerMode: true,
    })
    .then((isOkay) => {
        if (isOkay) { form.submit(); }
    });
    return false;
}

function jobForm(form) {
    swal.fire({
        title: "Are you sure to add this job?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, Add it!",
        cancelButtonText: "No, cancel!",
        dangerMode: true,
    })
    .then((isOkay) => {
        if (isOkay) { form.submit(); }
    });
    return false;
}

function categoryForm(form) {
    swal.fire({
        title: "Are you sure?",
        text: "to add this category",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, Add it!",
        cancelButtonText: "No, cancel!",
        dangerMode: true,
    })
    .then((isOkay) => {
        if (isOkay) { form.submit(); }
    });
    return false;
}

// SweetAlert Confirmation for Save Changes
function sweetSaveChanges() {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: "btn btn-success",
          cancelButton: "btn btn-danger"
        },
        buttonsStyling: true
    });

    swalWithBootstrapButtons.fire({
        title: "Are you sure?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, Save it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            swalWithBootstrapButtons.fire({
                title: "Done!",
                text: "Your data has been edited.",
                icon: "success"
            });
            saveChanges();  // Trigger save after confirmation
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire({
                title: "Cancelled",
                icon: "error"
            });
        }
    });
}
