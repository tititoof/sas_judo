export default {
    data() {
        return {
            name:               '',
            menus:              [],
            content:            '',
            categoriesSelected: [],
            albums:             [],
            albumsSelected:     [],
            tableOptions:       [],
            optionsEditor:      {
                modules: {
                    toolbar: [
                        ['contain'],
                        [{ 'table': ['newtable_1_1', 'newtable_1_2', 'newtable_1_3', 'newtable_1_4', 'newtable_1_5'] }], // new table (cursor needs to be out of table)
                        [{ 'table': 'append-row' }], // cursor needs to be in the table
                        [{ 'table': 'append-col' }], // cursor needs to be in the table
                        // Extended toolbar buttons
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
        onEditorChange({ editor, html }) {
            this.content = html
        }
    }
}