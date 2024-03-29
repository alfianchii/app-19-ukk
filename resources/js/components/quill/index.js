const defaultConfig = [
    [{ font: [] }],
    [{ align: [] }],
    ["bold", "italic", "underline", "strike"],
    [
        { list: "ordered" },
        { list: "bullet" },
        { indent: "-1" },
        { indent: "+1" },
    ],
    [{ header: [1, 2, 3, 4, 5, 6, false] }],
    [{ color: [] }, { background: [] }],
    ["blockquote", "code-block"],
    [{ script: "super" }, { script: "sub" }],
    ["clean"],
];

export function quillTextEditor(
    element,
    body,
    text,
    quillModules = defaultConfig,
    quillTheme = "snow",
    configs = [],
) {
    let quill = new Quill(element, {
        bounds: "#editor-container .editor",
        modules: { toolbar: [...quillModules, ...configs] },
        theme: quillTheme,
        placeholder: `Write ${text} here ...`,
    });

    function updateBody() {
        // Quill body
        const quillBody = document.getElementById(body);

        // Validates if quill is empty
        if (quill.getText().trim().length === 0) return (quillBody.value = "");
        quillBody.value = quill.root.innerHTML;
    }

    quill.on("text-change", updateBody);
}
