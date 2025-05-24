document.addEventListener('DOMContentLoaded', function() {
    const commentButton = document.getElementById('commentButton');
    const commentInput = document.getElementById('commentInput');

    if (commentButton && commentInput) {
        commentButton.addEventListener('click', function() {
            commentInput.focus();
        });
    } else {
        console.error("Elements not found!");
    }
});

