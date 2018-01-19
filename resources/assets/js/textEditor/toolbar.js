const toolbar = {
    menus: [
        {
            command: "formatBlock",
            header: "Default Style",
            values: {
                h1: "Heading 1",
                h2: "Heading 2",
                h3: "Heading 3",
                h4: "Heading 4",
                h5: "Heading 5 ",
                h6: "Heading 6",
                p: "Paragraph"
            }
        },
        {
            command: "fontname",
            header: "Font",
            values: ["Arial", "Arial Black", "Courier New"]
        },
        {
            command: "fontsize",
            header: "Font Size",
            values: [
                7,
                8,
                9,
                10,
                11,
                12,
                13,
                14,
                15,
                18,
                20,
                22,
                24,
                26,
                30,
                36,
                42,
                48
            ]
        },
        {
            command: "forecolor",
            header: "- color -",
            values: {
                red: "Red",
                blue: "Blue",
                green: "Green",
                white: "White",
                black: "Black"
            }
        },
        {
            command: "backcolor",
            header: "- background -",
            values: {
                white: "White",
                red: "Red",
                green: "Green",
                black: "Black"
            }
        }
    ],
    buttons: [
        {
            text: "Print",
            command: "printDoc",
            icon: "fa-print"
        },
        {
            text: "Undo",
            command: "undo",
            icon: "fa-undo"
        },
        {
            text: "Redo",
            command: "redo",
            icon: "fa-repeat"
        },
        {
            text: "Bold",
            command: "bold",
            icon: "fa-bold"
        },
        {
            text: "Italic",
            command: "italic",
            icon: "fa-italic"
        },
        {
            text: "Underline",
            command: "underline",
            icon: "fa-underline"
        },
        {
            text: "Strike Through",
            command: "strikeThrough",
            icon: "fa-strikethrough"
        },
        {
            text: "Super script",
            command: "superscript",
            icon: "fa-superscript"
        },
        {
            text: "Sub script",
            command: "subscript",
            icon: "fa-subscript"
        },
        {
            text: "Left align",
            command: "justifyleft",
            icon: "fa-align-left"
        },
        {
            text: "Center align",
            command: "justifycenter",
            icon: "fa-align-center"
        },
        {
            text: "Right align",
            command: "justifyright",
            icon: "fa-align-right"
        },
        {
            text: "Ordered List",
            command: "insertorderedlist",
            icon: "fa-list-ol"
        },
        {
            text: "Un ordered list",
            command: "insertunorderedlist",
            icon: "fa-list"
        },
        {
            text: "Quote",
            command: "formatBlock",
            value: "blockquote",
            icon: "fa-quote-left"
        },
        {
            text: "Delete indentation",
            command: "outdent",
            icon: "fa-outdent"
        },
        {
            text: "Add indentation",
            command: "indent",
            icon: "fa-indent"
        },
        {
            text: "Hyperlink",
            command: "createLink",
            icon: "fa-link"
        },
        {
            text: "Remove Hyperlink",
            command: "unlink",
            icon: "fa-unlink"
        },
        {
            text: "Cut",
            command: "cut",
            icon: "fa-scissors"
        },
        {
            text: "Copy",
            command: "copy",
            icon: "fa-copy"
        },
        {
            text: "Paste",
            command: "paste",
            icon: "fa-paste"
        },
        {
            text: "Delete",
            command: "delete",
            icon: "fa-trash-o"
        }
    ]
};

export { toolbar };
