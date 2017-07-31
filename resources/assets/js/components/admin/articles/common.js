export default {
    data() {
        return {
            name:               '',
            menus:              [],
            content:            '',
            categoriesSelected: [],
            albums:             [],
            albumsSelected:     [],
            optionsEditor:      {
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                        ['blockquote', 'code-block'],

                        [{ 'header': 1 }, { 'header': 2 }],               // custom button values
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
                        [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
                        [{ 'direction': 'rtl' }],                         // text direction

                        [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
                        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                        [ 'link', 'image', 'video', 'formula' ],
                        [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
                        [{ 'font': [] }],
                        [{ 'align': [] }],
                        ['clean']                                         // remove formatting button
                    ],
                },
                theme: 'snow'
            },
            formErrors: [
                { 'name': 'name', 'human': 'Nom de l\'article'}, 
                { 'name': 'categories', 'human': "Menu(s)"}
            ]
        }
    },
    methods: {
        addAlbum() {
            const _self = this;
            _self.send(true);
        },
        onEditorBlur(editor) {
        },
        onEditorFocus(editor) {
        },
        onEditorReady(editor) {
        },
        onEditorChange({ editor, html, text }) {
            this.content = html
        }
    }
}