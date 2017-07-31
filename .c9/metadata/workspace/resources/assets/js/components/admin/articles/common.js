{"filter":false,"title":"common.js","tooltip":"/resources/assets/js/components/admin/articles/common.js","undoManager":{"mark":63,"position":63,"stack":[[{"start":{"row":0,"column":0},"end":{"row":25,"column":1},"action":"insert","lines":["export default {","    data() {","        return {","            name:       '',","            files:      [],","            files_id:   Array,","            allPictures:[],","            pictures:   [],","            upload:     {},","            active:     false,","            uploadName: 'Télécharger',","            filesIds:   '',","            formErrors: [","                { 'name': 'name', 'human': 'Nom'}, ","                { 'name': 'pictures', 'human': \"Images\"}","            ]","        }","    },","    computed: {","        getFilesIds: function() {","            const _self = this;","            let str = _self.filesIds.replace(/(^[,\\s]+)|([,\\s]+$)/g, '')","            return str.split(',')","        }","    },","}"],"id":1}],[{"start":{"row":17,"column":5},"end":{"row":24,"column":6},"action":"remove","lines":[",","    computed: {","        getFilesIds: function() {","            const _self = this;","            let str = _self.filesIds.replace(/(^[,\\s]+)|([,\\s]+$)/g, '')","            return str.split(',')","        }","    },"],"id":2}],[{"start":{"row":3,"column":12},"end":{"row":15,"column":13},"action":"remove","lines":["name:       '',","            files:      [],","            files_id:   Array,","            allPictures:[],","            pictures:   [],","            upload:     {},","            active:     false,","            uploadName: 'Télécharger',","            filesIds:   '',","            formErrors: [","                { 'name': 'name', 'human': 'Nom'}, ","                { 'name': 'pictures', 'human': \"Images\"}","            ]"],"id":3},{"start":{"row":3,"column":12},"end":{"row":31,"column":17},"action":"insert","lines":["name:               '',","                menus:              [],","                content:            '',","                categoriesSelected: [],","                albums:             [],","                albumsSelected:     [],","                optionsEditor:      {","                    modules: {","                        toolbar: [","                            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons","                            ['blockquote', 'code-block'],","","                            [{ 'header': 1 }, { 'header': 2 }],               // custom button values","                            [{ 'list': 'ordered'}, { 'list': 'bullet' }],","                            [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript","                            [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent","                            [{ 'direction': 'rtl' }],                         // text direction","","                            [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown","                            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],","                            [ 'link', 'image', 'video', 'formula' ],","                            [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme","                            [{ 'font': [] }],","                            [{ 'align': [] }],","                            ['clean']                                         // remove formatting button","                        ],","                    },","                    theme: 'snow'","                }"]}],[{"start":{"row":4,"column":0},"end":{"row":4,"column":4},"action":"remove","lines":["    "],"id":4},{"start":{"row":5,"column":0},"end":{"row":5,"column":4},"action":"remove","lines":["    "]},{"start":{"row":6,"column":0},"end":{"row":6,"column":4},"action":"remove","lines":["    "]},{"start":{"row":7,"column":0},"end":{"row":7,"column":4},"action":"remove","lines":["    "]},{"start":{"row":8,"column":0},"end":{"row":8,"column":4},"action":"remove","lines":["    "]},{"start":{"row":9,"column":0},"end":{"row":9,"column":4},"action":"remove","lines":["    "]},{"start":{"row":10,"column":0},"end":{"row":10,"column":4},"action":"remove","lines":["    "]},{"start":{"row":11,"column":0},"end":{"row":11,"column":4},"action":"remove","lines":["    "]},{"start":{"row":12,"column":0},"end":{"row":12,"column":4},"action":"remove","lines":["    "]},{"start":{"row":13,"column":0},"end":{"row":13,"column":4},"action":"remove","lines":["    "]},{"start":{"row":15,"column":0},"end":{"row":15,"column":4},"action":"remove","lines":["    "]},{"start":{"row":16,"column":0},"end":{"row":16,"column":4},"action":"remove","lines":["    "]},{"start":{"row":17,"column":0},"end":{"row":17,"column":4},"action":"remove","lines":["    "]},{"start":{"row":18,"column":0},"end":{"row":18,"column":4},"action":"remove","lines":["    "]},{"start":{"row":19,"column":0},"end":{"row":19,"column":4},"action":"remove","lines":["    "]},{"start":{"row":21,"column":0},"end":{"row":21,"column":4},"action":"remove","lines":["    "]},{"start":{"row":22,"column":0},"end":{"row":22,"column":4},"action":"remove","lines":["    "]},{"start":{"row":23,"column":0},"end":{"row":23,"column":4},"action":"remove","lines":["    "]},{"start":{"row":24,"column":0},"end":{"row":24,"column":4},"action":"remove","lines":["    "]},{"start":{"row":25,"column":0},"end":{"row":25,"column":4},"action":"remove","lines":["    "]},{"start":{"row":26,"column":0},"end":{"row":26,"column":4},"action":"remove","lines":["    "]},{"start":{"row":27,"column":0},"end":{"row":27,"column":4},"action":"remove","lines":["    "]},{"start":{"row":28,"column":0},"end":{"row":28,"column":4},"action":"remove","lines":["    "]},{"start":{"row":29,"column":0},"end":{"row":29,"column":4},"action":"remove","lines":["    "]},{"start":{"row":30,"column":0},"end":{"row":30,"column":4},"action":"remove","lines":["    "]},{"start":{"row":31,"column":0},"end":{"row":31,"column":4},"action":"remove","lines":["    "]}],[{"start":{"row":33,"column":5},"end":{"row":33,"column":6},"action":"insert","lines":[","],"id":5}],[{"start":{"row":33,"column":6},"end":{"row":34,"column":0},"action":"insert","lines":["",""],"id":6},{"start":{"row":34,"column":0},"end":{"row":34,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":34,"column":4},"end":{"row":34,"column":5},"action":"insert","lines":["m"],"id":7}],[{"start":{"row":34,"column":5},"end":{"row":34,"column":6},"action":"insert","lines":["e"],"id":8}],[{"start":{"row":34,"column":6},"end":{"row":34,"column":7},"action":"insert","lines":["t"],"id":9}],[{"start":{"row":34,"column":7},"end":{"row":34,"column":8},"action":"insert","lines":["h"],"id":10}],[{"start":{"row":34,"column":8},"end":{"row":34,"column":9},"action":"insert","lines":["o"],"id":11}],[{"start":{"row":34,"column":9},"end":{"row":34,"column":10},"action":"insert","lines":["d"],"id":12}],[{"start":{"row":34,"column":10},"end":{"row":34,"column":11},"action":"insert","lines":["s"],"id":13}],[{"start":{"row":34,"column":11},"end":{"row":34,"column":12},"action":"insert","lines":[":"],"id":14}],[{"start":{"row":34,"column":12},"end":{"row":34,"column":13},"action":"insert","lines":[" "],"id":15}],[{"start":{"row":34,"column":13},"end":{"row":34,"column":14},"action":"insert","lines":["{"],"id":16}],[{"start":{"row":34,"column":14},"end":{"row":36,"column":5},"action":"insert","lines":["","        ","    }"],"id":17}],[{"start":{"row":35,"column":8},"end":{"row":43,"column":9},"action":"insert","lines":["onEditorBlur(editor) {","        },","        onEditorFocus(editor) {","        },","        onEditorReady(editor) {","        },","        onEditorChange({ editor, html, text }) {","            this.content = html","        }"],"id":18}],[{"start":{"row":34,"column":14},"end":{"row":35,"column":0},"action":"insert","lines":["",""],"id":19},{"start":{"row":35,"column":0},"end":{"row":35,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":35,"column":8},"end":{"row":38,"column":14},"action":"insert","lines":["addAlbum() {","                const _self = this;","                _self.send(true);","            },"],"id":20}],[{"start":{"row":36,"column":0},"end":{"row":36,"column":4},"action":"remove","lines":["    "],"id":21},{"start":{"row":37,"column":0},"end":{"row":37,"column":4},"action":"remove","lines":["    "]},{"start":{"row":38,"column":0},"end":{"row":38,"column":4},"action":"remove","lines":["    "]}],[{"start":{"row":36,"column":8},"end":{"row":36,"column":12},"action":"remove","lines":["    "],"id":22}],[{"start":{"row":36,"column":8},"end":{"row":36,"column":12},"action":"insert","lines":["    "],"id":23}],[{"start":{"row":31,"column":13},"end":{"row":31,"column":14},"action":"insert","lines":[","],"id":24}],[{"start":{"row":31,"column":14},"end":{"row":32,"column":0},"action":"insert","lines":["",""],"id":25},{"start":{"row":32,"column":0},"end":{"row":32,"column":12},"action":"insert","lines":["            "]}],[{"start":{"row":32,"column":12},"end":{"row":35,"column":13},"action":"insert","lines":["formErrors: [","                { 'name': 'name', 'human': 'Nom'}, ","                { 'name': 'pictures', 'human': \"Images\"}","            ]"],"id":26}],[{"start":{"row":33,"column":47},"end":{"row":33,"column":48},"action":"insert","lines":[" "],"id":27}],[{"start":{"row":33,"column":48},"end":{"row":33,"column":49},"action":"insert","lines":["d"],"id":28}],[{"start":{"row":33,"column":49},"end":{"row":33,"column":50},"action":"insert","lines":["e"],"id":29}],[{"start":{"row":33,"column":50},"end":{"row":33,"column":51},"action":"insert","lines":[" "],"id":30}],[{"start":{"row":33,"column":51},"end":{"row":33,"column":52},"action":"insert","lines":["l"],"id":31}],[{"start":{"row":33,"column":52},"end":{"row":33,"column":53},"action":"insert","lines":["\\"],"id":32}],[{"start":{"row":33,"column":53},"end":{"row":33,"column":54},"action":"insert","lines":["'"],"id":33}],[{"start":{"row":33,"column":54},"end":{"row":33,"column":55},"action":"insert","lines":["a"],"id":34}],[{"start":{"row":33,"column":55},"end":{"row":33,"column":56},"action":"insert","lines":["r"],"id":35}],[{"start":{"row":33,"column":56},"end":{"row":33,"column":57},"action":"insert","lines":["t"],"id":36}],[{"start":{"row":33,"column":57},"end":{"row":33,"column":58},"action":"insert","lines":["i"],"id":37}],[{"start":{"row":33,"column":58},"end":{"row":33,"column":59},"action":"insert","lines":["c"],"id":38}],[{"start":{"row":33,"column":59},"end":{"row":33,"column":60},"action":"insert","lines":["l"],"id":39}],[{"start":{"row":33,"column":60},"end":{"row":33,"column":61},"action":"insert","lines":["e"],"id":40}],[{"start":{"row":34,"column":27},"end":{"row":34,"column":35},"action":"remove","lines":["pictures"],"id":41},{"start":{"row":34,"column":27},"end":{"row":34,"column":28},"action":"insert","lines":["c"]}],[{"start":{"row":34,"column":28},"end":{"row":34,"column":29},"action":"insert","lines":["a"],"id":42}],[{"start":{"row":34,"column":29},"end":{"row":34,"column":30},"action":"insert","lines":["t"],"id":43}],[{"start":{"row":34,"column":30},"end":{"row":34,"column":31},"action":"insert","lines":["e"],"id":44}],[{"start":{"row":34,"column":31},"end":{"row":34,"column":32},"action":"insert","lines":["g"],"id":45}],[{"start":{"row":34,"column":32},"end":{"row":34,"column":33},"action":"insert","lines":["o"],"id":46}],[{"start":{"row":34,"column":33},"end":{"row":34,"column":34},"action":"insert","lines":["r"],"id":47}],[{"start":{"row":34,"column":27},"end":{"row":34,"column":34},"action":"remove","lines":["categor"],"id":48},{"start":{"row":34,"column":27},"end":{"row":34,"column":37},"action":"insert","lines":["categories"]}],[{"start":{"row":34,"column":50},"end":{"row":34,"column":56},"action":"remove","lines":["Images"],"id":49},{"start":{"row":34,"column":50},"end":{"row":34,"column":51},"action":"insert","lines":["M"]}],[{"start":{"row":34,"column":51},"end":{"row":34,"column":52},"action":"insert","lines":["e"],"id":50}],[{"start":{"row":34,"column":52},"end":{"row":34,"column":53},"action":"insert","lines":["n"],"id":51}],[{"start":{"row":34,"column":53},"end":{"row":34,"column":54},"action":"insert","lines":["u"],"id":52}],[{"start":{"row":34,"column":54},"end":{"row":34,"column":55},"action":"insert","lines":["("],"id":53}],[{"start":{"row":34,"column":55},"end":{"row":34,"column":56},"action":"insert","lines":["s"],"id":54}],[{"start":{"row":34,"column":56},"end":{"row":34,"column":57},"action":"insert","lines":[")"],"id":55}],[{"start":{"row":43,"column":0},"end":{"row":44,"column":0},"action":"remove","lines":["        onEditorBlur(editor) {",""],"id":56}],[{"start":{"row":43,"column":0},"end":{"row":44,"column":0},"action":"remove","lines":["        },",""],"id":57}],[{"start":{"row":43,"column":0},"end":{"row":44,"column":0},"action":"remove","lines":["        onEditorFocus(editor) {",""],"id":58}],[{"start":{"row":43,"column":0},"end":{"row":44,"column":0},"action":"remove","lines":["        },",""],"id":59}],[{"start":{"row":43,"column":0},"end":{"row":44,"column":0},"action":"remove","lines":["        onEditorReady(editor) {",""],"id":60}],[{"start":{"row":43,"column":0},"end":{"row":44,"column":0},"action":"remove","lines":["        },",""],"id":61}],[{"start":{"row":43,"column":39},"end":{"row":43,"column":43},"action":"remove","lines":["text"],"id":62}],[{"start":{"row":43,"column":38},"end":{"row":43,"column":39},"action":"remove","lines":[" "],"id":63}],[{"start":{"row":43,"column":37},"end":{"row":43,"column":38},"action":"remove","lines":[","],"id":64}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":43,"column":37},"end":{"row":43,"column":37},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1501492674889,"hash":"33d2bc037e0e1e8933630202e4277c9cb28a35d9"}