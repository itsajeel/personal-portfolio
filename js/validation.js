// Form validation and clear button for the blog entry form

document.addEventListener('DOMContentLoaded', function () {

    var form = document.getElementById('blogForm');
    var titleInput = document.getElementById('title');
    var postInput = document.getElementById('post');
    var clearBtn = document.getElementById('clearBtn');

    // Validate before submitting
    form.addEventListener('submit', function (event) {

        titleInput.classList.remove('input-error');
        postInput.classList.remove('input-error');

        var titleEmpty = titleInput.value.trim() === '';
        var postEmpty = postInput.value.trim() === '';

        if (titleEmpty || postEmpty) {
            event.preventDefault();

            if (titleEmpty) {
                titleInput.classList.add('input-error');
            }
            if (postEmpty) {
                postInput.classList.add('input-error');
            }

            alert('Please fill in both the title and post fields before submitting.');
        }
    });

    // Clear button - ask first to prevent accidental clicks
    clearBtn.addEventListener('click', function () {

        var userConfirmed = confirm('Are you sure you want to clear the form?');

        if (userConfirmed) {
            titleInput.value = '';
            postInput.value = '';
            titleInput.classList.remove('input-error');
            postInput.classList.remove('input-error');
        }
    });

});
