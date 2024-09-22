// Initialize the Quill editor with the 'snow' theme
var quill = new Quill("#snow-editor", {
    theme: "snow",
    modules: {
        toolbar: [
            [{ font: [] }, { size: [] }],
            ["bold", "italic", "underline", "strike"],
            [{ color: [] }, { background: [] }],
            [{ script: "super" }, { script: "sub" }],
            [{ header: [!1, 1, 2, 3, 4, 5, 6] }, "blockquote", "code-block"],
            [{ list: "ordered" }, { list: "bullet" }, { indent: "-1" }, { indent: "+1" }],
            ["direction", { align: [] }],
            ["link", "image", "video"],
            ["clean"]
        ]
    }
});

// Handle form submission to include the Quill editor content
document.addEventListener("DOMContentLoaded", function () {
    var form = document.querySelector('form'); // Adjust if needed to target your form
    form.onsubmit = function () {
        // Get the HTML content from the Quill editor
        var quillContent = quill.root.innerHTML;

        // Set this content in a hidden input field
        document.getElementById('blogDescription').value = quillContent;

        // Debugging: log the content
        console.log('Quill content:', quillContent);
    };
});
