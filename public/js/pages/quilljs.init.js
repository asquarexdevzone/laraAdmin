// Initialize multiple Quill editors
document.addEventListener("DOMContentLoaded", function () {
    // Initialize each Quill editor with a unique selector
    var editors = document.querySelectorAll('[id^="snow-editor-"]'); // Select all elements whose id starts with "snow-editor-"

    editors.forEach(function (editorElement, index) {
        var quill = new Quill(editorElement, {
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

        // Save a reference to the quill instance on the editor element
        editorElement.quillInstance = quill;
    });

    // Handle form submission
    var form = document.querySelector('form'); // Adjust if needed to target your form
    form.onsubmit = function () {
        // Loop through all Quill editors to get their content
        editors.forEach(function (editorElement, index) {
            var quillContent = editorElement.quillInstance.root.innerHTML;

            // Set the content in the hidden input field corresponding to the editor
            var hiddenInputId = editorElement.id.replace('snow-editor', 'blogDescription');
            document.getElementById(hiddenInputId).value = quillContent;

            // Debugging: log the content
            console.log('Quill content for editor ' + (index + 1) + ':', quillContent);
        });
    };
});
