{"filter":false,"title":"contains.js","tooltip":"/resources/assets/js/components/editor/contains.js","undoManager":{"mark":80,"position":80,"stack":[[{"start":{"row":0,"column":0},"end":{"row":1,"column":0},"action":"insert","lines":["export class ImageResize {",""],"id":1}],[{"start":{"row":1,"column":0},"end":{"row":1,"column":1},"action":"insert","lines":["}"],"id":2}],[{"start":{"row":0,"column":13},"end":{"row":0,"column":24},"action":"remove","lines":["ImageResize"],"id":3},{"start":{"row":0,"column":13},"end":{"row":0,"column":24},"action":"insert","lines":["ContainBlot"]}],[{"start":{"row":0,"column":24},"end":{"row":0,"column":25},"action":"insert","lines":[" "],"id":4}],[{"start":{"row":0,"column":25},"end":{"row":0,"column":43},"action":"insert","lines":["extends Container "],"id":5}],[{"start":{"row":0,"column":42},"end":{"row":0,"column":43},"action":"remove","lines":[" "],"id":6}],[{"start":{"row":0,"column":44},"end":{"row":1,"column":0},"action":"insert","lines":["",""],"id":7}],[{"start":{"row":1,"column":0},"end":{"row":1,"column":4},"action":"insert","lines":["    "],"id":8}],[{"start":{"row":1,"column":4},"end":{"row":35,"column":3},"action":"insert","lines":["static create(value) {","    let tagName = 'contain';","    let node = super.create(tagName);","    return node;","  }","","  insertBefore(blot, ref) {","    if (blot.statics.blotName == this.statics.blotName) {","      console.log('############################ Not sure this is clean:')","      console.log(blot)","      console.log(blot.children.head)","      super.insertBefore(blot.children.head, ref);","    } else {","      super.insertBefore(blot, ref);","    }","  }","","  static formats(domNode) {","    return domNode.tagName;","  }","","  formats() {","    // We don't inherit from FormatBlot","    return { [this.statics.blotName]: this.statics.formats(this.domNode) }","  }","","  replace(target) {","    if (target.statics.blotName !== this.statics.blotName) {","      let item = Parchment.create(this.statics.defaultChild);","      target.moveChildren(item);","      this.appendChild(item);","    }","    if (target.parent == null) return;","    super.replace(target)","  }"],"id":9}],[{"start":{"row":1,"column":0},"end":{"row":1,"column":4},"action":"remove","lines":["    "],"id":10}],[{"start":{"row":1,"column":0},"end":{"row":1,"column":4},"action":"insert","lines":["    "],"id":11}],[{"start":{"row":2,"column":0},"end":{"row":2,"column":4},"action":"remove","lines":["    "],"id":12},{"start":{"row":3,"column":0},"end":{"row":3,"column":4},"action":"remove","lines":["    "]},{"start":{"row":4,"column":0},"end":{"row":4,"column":4},"action":"remove","lines":["    "]},{"start":{"row":5,"column":0},"end":{"row":5,"column":2},"action":"remove","lines":["  "]}],[{"start":{"row":2,"column":0},"end":{"row":2,"column":4},"action":"insert","lines":["    "],"id":13},{"start":{"row":3,"column":0},"end":{"row":3,"column":4},"action":"insert","lines":["    "]},{"start":{"row":4,"column":0},"end":{"row":4,"column":4},"action":"insert","lines":["    "]},{"start":{"row":5,"column":0},"end":{"row":5,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":2,"column":0},"end":{"row":2,"column":4},"action":"insert","lines":["    "],"id":14},{"start":{"row":3,"column":0},"end":{"row":3,"column":4},"action":"insert","lines":["    "]},{"start":{"row":4,"column":0},"end":{"row":4,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":7,"column":0},"end":{"row":7,"column":2},"action":"remove","lines":["  "],"id":15},{"start":{"row":8,"column":0},"end":{"row":8,"column":4},"action":"remove","lines":["    "]},{"start":{"row":9,"column":0},"end":{"row":9,"column":4},"action":"remove","lines":["    "]},{"start":{"row":10,"column":0},"end":{"row":10,"column":4},"action":"remove","lines":["    "]},{"start":{"row":11,"column":0},"end":{"row":11,"column":4},"action":"remove","lines":["    "]},{"start":{"row":12,"column":0},"end":{"row":12,"column":4},"action":"remove","lines":["    "]},{"start":{"row":13,"column":0},"end":{"row":13,"column":4},"action":"remove","lines":["    "]},{"start":{"row":14,"column":0},"end":{"row":14,"column":4},"action":"remove","lines":["    "]},{"start":{"row":15,"column":0},"end":{"row":15,"column":4},"action":"remove","lines":["    "]},{"start":{"row":16,"column":0},"end":{"row":16,"column":2},"action":"remove","lines":["  "]}],[{"start":{"row":9,"column":0},"end":{"row":9,"column":2},"action":"remove","lines":["  "],"id":16},{"start":{"row":10,"column":0},"end":{"row":10,"column":2},"action":"remove","lines":["  "]},{"start":{"row":11,"column":0},"end":{"row":11,"column":2},"action":"remove","lines":["  "]},{"start":{"row":12,"column":0},"end":{"row":12,"column":2},"action":"remove","lines":["  "]},{"start":{"row":14,"column":0},"end":{"row":14,"column":2},"action":"remove","lines":["  "]}],[{"start":{"row":7,"column":0},"end":{"row":7,"column":4},"action":"insert","lines":["    "],"id":17},{"start":{"row":8,"column":0},"end":{"row":8,"column":4},"action":"insert","lines":["    "]},{"start":{"row":9,"column":0},"end":{"row":9,"column":4},"action":"insert","lines":["    "]},{"start":{"row":10,"column":0},"end":{"row":10,"column":4},"action":"insert","lines":["    "]},{"start":{"row":11,"column":0},"end":{"row":11,"column":4},"action":"insert","lines":["    "]},{"start":{"row":12,"column":0},"end":{"row":12,"column":4},"action":"insert","lines":["    "]},{"start":{"row":13,"column":0},"end":{"row":13,"column":4},"action":"insert","lines":["    "]},{"start":{"row":14,"column":0},"end":{"row":14,"column":4},"action":"insert","lines":["    "]},{"start":{"row":15,"column":0},"end":{"row":15,"column":4},"action":"insert","lines":["    "]},{"start":{"row":16,"column":0},"end":{"row":16,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":8,"column":0},"end":{"row":8,"column":4},"action":"insert","lines":["    "],"id":18},{"start":{"row":9,"column":0},"end":{"row":9,"column":4},"action":"insert","lines":["    "]},{"start":{"row":10,"column":0},"end":{"row":10,"column":4},"action":"insert","lines":["    "]},{"start":{"row":11,"column":0},"end":{"row":11,"column":4},"action":"insert","lines":["    "]},{"start":{"row":12,"column":0},"end":{"row":12,"column":4},"action":"insert","lines":["    "]},{"start":{"row":13,"column":0},"end":{"row":13,"column":4},"action":"insert","lines":["    "]},{"start":{"row":14,"column":0},"end":{"row":14,"column":4},"action":"insert","lines":["    "]},{"start":{"row":15,"column":0},"end":{"row":15,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":9,"column":0},"end":{"row":9,"column":4},"action":"insert","lines":["    "],"id":19},{"start":{"row":10,"column":0},"end":{"row":10,"column":4},"action":"insert","lines":["    "]},{"start":{"row":11,"column":0},"end":{"row":11,"column":4},"action":"insert","lines":["    "]},{"start":{"row":12,"column":0},"end":{"row":12,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":14,"column":8},"end":{"row":14,"column":12},"action":"insert","lines":["    "],"id":20}],[{"start":{"row":18,"column":0},"end":{"row":18,"column":2},"action":"remove","lines":["  "],"id":21},{"start":{"row":19,"column":0},"end":{"row":19,"column":4},"action":"remove","lines":["    "]},{"start":{"row":20,"column":0},"end":{"row":20,"column":2},"action":"remove","lines":["  "]}],[{"start":{"row":18,"column":0},"end":{"row":18,"column":4},"action":"insert","lines":["    "],"id":22},{"start":{"row":19,"column":0},"end":{"row":19,"column":4},"action":"insert","lines":["    "]},{"start":{"row":20,"column":0},"end":{"row":20,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":19,"column":4},"end":{"row":19,"column":8},"action":"insert","lines":["    "],"id":23}],[{"start":{"row":22,"column":0},"end":{"row":22,"column":2},"action":"remove","lines":["  "],"id":24},{"start":{"row":23,"column":0},"end":{"row":23,"column":4},"action":"remove","lines":["    "]},{"start":{"row":24,"column":0},"end":{"row":24,"column":4},"action":"remove","lines":["    "]},{"start":{"row":25,"column":0},"end":{"row":25,"column":2},"action":"remove","lines":["  "]}],[{"start":{"row":22,"column":0},"end":{"row":22,"column":4},"action":"insert","lines":["    "],"id":25},{"start":{"row":23,"column":0},"end":{"row":23,"column":4},"action":"insert","lines":["    "]},{"start":{"row":24,"column":0},"end":{"row":24,"column":4},"action":"insert","lines":["    "]},{"start":{"row":25,"column":0},"end":{"row":25,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":23,"column":0},"end":{"row":23,"column":4},"action":"insert","lines":["    "],"id":26},{"start":{"row":24,"column":0},"end":{"row":24,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":27,"column":0},"end":{"row":27,"column":2},"action":"remove","lines":["  "],"id":27},{"start":{"row":28,"column":0},"end":{"row":28,"column":4},"action":"remove","lines":["    "]},{"start":{"row":29,"column":0},"end":{"row":29,"column":4},"action":"remove","lines":["    "]},{"start":{"row":30,"column":0},"end":{"row":30,"column":4},"action":"remove","lines":["    "]},{"start":{"row":31,"column":0},"end":{"row":31,"column":4},"action":"remove","lines":["    "]},{"start":{"row":32,"column":0},"end":{"row":32,"column":4},"action":"remove","lines":["    "]},{"start":{"row":33,"column":0},"end":{"row":33,"column":4},"action":"remove","lines":["    "]},{"start":{"row":34,"column":0},"end":{"row":34,"column":4},"action":"remove","lines":["    "]},{"start":{"row":35,"column":0},"end":{"row":35,"column":2},"action":"remove","lines":["  "]}],[{"start":{"row":29,"column":0},"end":{"row":29,"column":2},"action":"remove","lines":["  "],"id":28},{"start":{"row":30,"column":0},"end":{"row":30,"column":2},"action":"remove","lines":["  "]},{"start":{"row":31,"column":0},"end":{"row":31,"column":2},"action":"remove","lines":["  "]}],[{"start":{"row":27,"column":0},"end":{"row":27,"column":4},"action":"insert","lines":["    "],"id":29},{"start":{"row":28,"column":0},"end":{"row":28,"column":4},"action":"insert","lines":["    "]},{"start":{"row":29,"column":0},"end":{"row":29,"column":4},"action":"insert","lines":["    "]},{"start":{"row":30,"column":0},"end":{"row":30,"column":4},"action":"insert","lines":["    "]},{"start":{"row":31,"column":0},"end":{"row":31,"column":4},"action":"insert","lines":["    "]},{"start":{"row":32,"column":0},"end":{"row":32,"column":4},"action":"insert","lines":["    "]},{"start":{"row":33,"column":0},"end":{"row":33,"column":4},"action":"insert","lines":["    "]},{"start":{"row":34,"column":0},"end":{"row":34,"column":4},"action":"insert","lines":["    "]},{"start":{"row":35,"column":0},"end":{"row":35,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":28,"column":0},"end":{"row":28,"column":4},"action":"insert","lines":["    "],"id":30},{"start":{"row":29,"column":0},"end":{"row":29,"column":4},"action":"insert","lines":["    "]},{"start":{"row":30,"column":0},"end":{"row":30,"column":4},"action":"insert","lines":["    "]},{"start":{"row":31,"column":0},"end":{"row":31,"column":4},"action":"insert","lines":["    "]},{"start":{"row":32,"column":0},"end":{"row":32,"column":4},"action":"insert","lines":["    "]},{"start":{"row":33,"column":0},"end":{"row":33,"column":4},"action":"insert","lines":["    "]},{"start":{"row":34,"column":0},"end":{"row":34,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":29,"column":0},"end":{"row":29,"column":4},"action":"insert","lines":["    "],"id":31},{"start":{"row":30,"column":0},"end":{"row":30,"column":4},"action":"insert","lines":["    "]},{"start":{"row":31,"column":0},"end":{"row":31,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":0,"column":0},"end":{"row":1,"column":0},"action":"insert","lines":["",""],"id":32}],[{"start":{"row":1,"column":0},"end":{"row":2,"column":0},"action":"insert","lines":["",""],"id":33}],[{"start":{"row":1,"column":0},"end":{"row":1,"column":48},"action":"insert","lines":["let Container = Quill.import('blots/container');"],"id":34}],[{"start":{"row":1,"column":0},"end":{"row":1,"column":3},"action":"remove","lines":["let"],"id":35},{"start":{"row":1,"column":0},"end":{"row":1,"column":1},"action":"insert","lines":["c"]}],[{"start":{"row":1,"column":1},"end":{"row":1,"column":2},"action":"insert","lines":["o"],"id":36}],[{"start":{"row":1,"column":2},"end":{"row":1,"column":3},"action":"insert","lines":["n"],"id":37}],[{"start":{"row":1,"column":3},"end":{"row":1,"column":4},"action":"insert","lines":["s"],"id":38}],[{"start":{"row":1,"column":4},"end":{"row":1,"column":5},"action":"insert","lines":["t"],"id":39}],[{"start":{"row":0,"column":0},"end":{"row":0,"column":25},"action":"insert","lines":["import Quill from 'quill'"],"id":40}],[{"start":{"row":0,"column":0},"end":{"row":1,"column":0},"action":"insert","lines":["",""],"id":41}],[{"start":{"row":0,"column":0},"end":{"row":3,"column":2},"action":"insert","lines":["//","//","// CONTAINER TAG","//"],"id":42}],[{"start":{"row":6,"column":44},"end":{"row":7,"column":0},"action":"insert","lines":["",""],"id":50},{"start":{"row":7,"column":0},"end":{"row":7,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":7,"column":4},"end":{"row":7,"column":38},"action":"insert","lines":["constructor(quill, options = {}) {"],"id":52}],[{"start":{"row":7,"column":38},"end":{"row":8,"column":0},"action":"insert","lines":["",""],"id":53},{"start":{"row":8,"column":0},"end":{"row":8,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":8,"column":8},"end":{"row":8,"column":9},"action":"insert","lines":["}"],"id":54},{"start":{"row":8,"column":0},"end":{"row":8,"column":8},"action":"remove","lines":["        "]},{"start":{"row":8,"column":0},"end":{"row":8,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":7,"column":38},"end":{"row":8,"column":0},"action":"insert","lines":["",""],"id":55},{"start":{"row":8,"column":0},"end":{"row":8,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":8,"column":8},"end":{"row":9,"column":0},"action":"insert","lines":["",""],"id":56},{"start":{"row":9,"column":0},"end":{"row":9,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":8,"column":8},"end":{"row":10,"column":20},"action":"insert","lines":["let tagName = 'contain';","        let node = super.create(tagName);","        return node;"],"id":57}],[{"start":{"row":11,"column":0},"end":{"row":12,"column":0},"action":"remove","lines":["        ",""],"id":58}],[{"start":{"row":12,"column":0},"end":{"row":13,"column":0},"action":"insert","lines":["",""],"id":59}],[{"start":{"row":10,"column":0},"end":{"row":11,"column":0},"action":"remove","lines":["        return node;",""],"id":60}],[{"start":{"row":8,"column":0},"end":{"row":9,"column":0},"action":"remove","lines":["        let tagName = 'contain';",""],"id":61}],[{"start":{"row":8,"column":0},"end":{"row":9,"column":0},"action":"remove","lines":["        let node = super.create(tagName);",""],"id":62}],[{"start":{"row":7,"column":38},"end":{"row":8,"column":0},"action":"insert","lines":["",""],"id":63},{"start":{"row":8,"column":0},"end":{"row":8,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":8,"column":8},"end":{"row":9,"column":25},"action":"insert","lines":["this.quill = quill;","\t\tthis.options = options;"],"id":64}],[{"start":{"row":7,"column":38},"end":{"row":8,"column":0},"action":"insert","lines":["",""],"id":65},{"start":{"row":8,"column":0},"end":{"row":8,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":8,"column":8},"end":{"row":8,"column":9},"action":"insert","lines":["s"],"id":66}],[{"start":{"row":8,"column":9},"end":{"row":8,"column":10},"action":"insert","lines":["u"],"id":67}],[{"start":{"row":8,"column":10},"end":{"row":8,"column":11},"action":"insert","lines":["p"],"id":68}],[{"start":{"row":8,"column":11},"end":{"row":8,"column":12},"action":"insert","lines":["e"],"id":69}],[{"start":{"row":8,"column":12},"end":{"row":8,"column":13},"action":"insert","lines":["r"],"id":70}],[{"start":{"row":8,"column":13},"end":{"row":8,"column":15},"action":"insert","lines":["()"],"id":71}],[{"start":{"row":7,"column":0},"end":{"row":12,"column":0},"action":"remove","lines":["    constructor(quill, options = {}) {","        super()","        this.quill = quill;","\t\tthis.options = options;","    }",""],"id":72},{"start":{"row":7,"column":0},"end":{"row":8,"column":0},"action":"remove","lines":["",""]}],[{"start":{"row":0,"column":0},"end":{"row":42,"column":1},"action":"remove","lines":["//","//","// CONTAINER TAG","//","import Quill from 'quill'","const Container = Quill.import('blots/container');","export class ContainBlot extends Container {","    static create(value) {","        let tagName = 'contain';","        let node = super.create(tagName);","        return node;","    }","","    insertBefore(blot, ref) {","        if (blot.statics.blotName == this.statics.blotName) {","            console.log('############################ Not sure this is clean:')","            console.log(blot)","            console.log(blot.children.head)","            super.insertBefore(blot.children.head, ref);","        } else {","            super.insertBefore(blot, ref);","        }","    }","","    static formats(domNode) {","        return domNode.tagName;","    }","","    formats() {","        // We don't inherit from FormatBlot","        return { [this.statics.blotName]: this.statics.formats(this.domNode) }","    }","","    replace(target) {","        if (target.statics.blotName !== this.statics.blotName) {","            let item = Parchment.create(this.statics.defaultChild);","            target.moveChildren(item);","            this.appendChild(item);","        }","        if (target.parent == null) return;","        super.replace(target)","    }","}"],"id":73},{"start":{"row":0,"column":0},"end":{"row":290,"column":21},"action":"insert","lines":["let Container = Quill.import('blots/container');","let Scroll = Quill.import('blots/scroll');","let Inline = Quill.import('blots/inline');","let Block = Quill.import('blots/block');","let Delta = Quill.import('delta');","let Parchment = Quill.import('parchment');","let BlockEmbed = Quill.import('blots/block/embed');","let TextBlot = Quill.import('blots/text');","","","//","//","// CONTAINER TAG","//","","class ContainBlot extends Container {","  static create(value) {","    let tagName = 'contain';","    let node = super.create(tagName);","    return node;","  }","","  insertBefore(blot, ref) {","    if (blot.statics.blotName == this.statics.blotName) {","      console.log('############################ Not sure this is clean:')","      console.log(blot)","      console.log(blot.children.head)","      super.insertBefore(blot.children.head, ref);","    } else {","      super.insertBefore(blot, ref);","    }","  }","","  static formats(domNode) {","    return domNode.tagName;","  }","","  formats() {","    // We don't inherit from FormatBlot","    return { [this.statics.blotName]: this.statics.formats(this.domNode) }","  }","","  replace(target) {","    if (target.statics.blotName !== this.statics.blotName) {","      let item = Parchment.create(this.statics.defaultChild);","      target.moveChildren(item);","      this.appendChild(item);","    }","    if (target.parent == null) return;","    super.replace(target)","  }","}","","ContainBlot.blotName = 'contain';","ContainBlot.tagName = 'contain';","ContainBlot.scope = Parchment.Scope.BLOCK_BLOT;","ContainBlot.defaultChild = 'block';","ContainBlot.allowedChildren = [Block, BlockEmbed, Container];","Quill.register(ContainBlot);","","","//","//","// CONTAINER TR","//","","class TableRow extends Container {","  static create(value) {","    let tagName = 'tr';","    let node = super.create(tagName);","    node.setAttribute('row_id', value);","    return node;","  }","","  optimize() {","    super.optimize();","    let next = this.next;","    if (next != null && next.prev === this &&","        next.statics.blotName === this.statics.blotName &&","        next.domNode.tagName === this.domNode.tagName &&","        next.domNode.getAttribute('row_id') === this.domNode.getAttribute('row_id')) {","      next.moveChildren(this);","      next.remove();","    }","  }","","}","","TableRow.blotName = 'tr';","TableRow.tagName = 'tr';","TableRow.scope = Parchment.Scope.BLOCK_BLOT;","TableRow.defaultChild = 'td';","Quill.register(TableRow);","","//","//","// CONTAINER TABLE","//","","class TableTrick {","  static random_id() {","    return Math.random().toString(36).slice(2)","  }","  static find_td(what) {","    let leaf = quill.getLeaf(quill.getSelection()['index']);","    let blot = leaf[0];","    for(;blot!=null && blot.statics.blotName!=what;) {","      blot=blot.parent;","    }","    return blot; // return TD or NULL","  }","  static append_col() {","    let td = TableTrick.find_td('td')","    if(td) {","      let table = td.parent.parent;","      let table_id = table.domNode.getAttribute('table_id')","      td.parent.parent.children.forEach(function(tr) {","        let row_id = tr.domNode.getAttribute('row_id')","        let cell_id = TableTrick.random_id();","        let td = Parchment.create('td', table_id+'|'+row_id+'|'+cell_id);","        tr.appendChild(td);","      });","    }","  }","  static append_row() {","    let td = TableTrick.find_td('td')","    if(td) {","      let col_count = td.parent.children.length;","      let table = td.parent.parent;","      let new_row = td.parent.clone()","      let table_id = table.domNode.getAttribute('table_id')","      let row_id = TableTrick.random_id();","      new_row.domNode.setAttribute('row_id', row_id)","      for (var i = col_count - 1; i >= 0; i--) {","        let cell_id = TableTrick.random_id();","        let td = Parchment.create('td', table_id+'|'+row_id+'|'+cell_id);","        new_row.appendChild(td);","      };","      table.appendChild(new_row);","      console.log(new_row);","    }","  }","","}","","class Table extends Container {","  static create(value) {","    // special adding commands - belongs somewhere else out of constructor","    if(value == 'append-row') {","      let blot = TableTrick.append_row();","      return blot;","    } else if(value == 'append-col') {","      let blot = TableTrick.append_col();","      return blot;","    } else if(value.includes('newtable_')) {","      let node = null;","      let sizes = value.split('_');","      let row_count = Number.parseInt(sizes[1])","      let col_count = Number.parseInt(sizes[2])","      let table_id = TableTrick.random_id();","      let table = Parchment.create('table', table_id);","      for (var ri = 0; ri < row_count; ri++) {","        let row_id = TableTrick.random_id();","        let tr = Parchment.create('tr', row_id);","        table.appendChild(tr);","        for (var ci = 0; ci < col_count; ci++) {","          let cell_id = TableTrick.random_id();","          value = table_id+'|'+row_id+'|'+cell_id;","          let td = Parchment.create('td', value);","          tr.appendChild(td);","          let p = Parchment.create('block');","          td.appendChild(p);","          let br = Parchment.create('break');","          p.appendChild(br);","          node = p;","        }","      }","      let leaf = quill.getLeaf(quill.getSelection()['index']);","      let blot = leaf[0];","      let top_branch = null;","      for(;blot!=null && !(blot instanceof Container || blot instanceof Scroll);) {","        top_branch = blot","        blot=blot.parent;","      }","      blot.insertBefore(table, top_branch);","      return node;","    } else {","      // normal table","      let tagName = 'table';","      let node = super.create(tagName);","      node.setAttribute('table_id', value);","      return node;","    }","  }","","  optimize() {","    console.log(\"OPTIMIZE start\")","    super.optimize();","    let next = this.next;","    if (next != null && next.prev === this &&","        next.statics.blotName === this.statics.blotName &&","        next.domNode.tagName === this.domNode.tagName &&","        next.domNode.getAttribute('table_id') === this.domNode.getAttribute('table_id')) {","      next.moveChildren(this);","      next.remove();","    }","    console.log(quill.editor.getDelta())","    console.log(\"OPTIMIZE end\")","  }","","}","","Table.blotName = 'table';","Table.tagName = 'table';","Table.scope = Parchment.Scope.BLOCK_BLOT;","Table.defaultChild = 'tr';","Table.allowedChildren = [TableRow];","Quill.register(Table);","","//","//","// CONTAINER TD","//","","class TableCell extends ContainBlot {","","  static create(value) {","    console.log(value)","    let tagName = 'td';","    let node = super.create(tagName);","    let ids = value.split('|')","    node.setAttribute('table_id', ids[0]);","    node.setAttribute('row_id', ids[1]);","    node.setAttribute('cell_id', ids[2]);","    return node;","  }","","  format() {","    this.getAttribute('id');","  }","","  formats() {","    // We don't inherit from FormatBlot","    return { [this.statics.blotName]:","      this.domNode.getAttribute('table_id') + '|' +","      this.domNode.getAttribute('row_id') + '|' +","      this.domNode.getAttribute('cell_id') }","  }","","  optimize() {","    super.optimize();","","    // Add parent TR and TABLE when missing","    let parent = this.parent;","    if (parent != null && parent.statics.blotName != 'tr') {","      // we will mark td position, put in table and replace mark","      let mark = Parchment.create('block');","      this.parent.insertBefore(mark, this.next);","      let table = Parchment.create('table', this.domNode.getAttribute('table_id'));","      let tr = Parchment.create('tr', this.domNode.getAttribute('row_id'));","      table.appendChild(tr);","      tr.appendChild(this);","      table.replace(mark)","    }","","    // merge same TD id","    let next = this.next;","    if (next != null && next.prev === this &&","        next.statics.blotName === this.statics.blotName &&","        next.domNode.tagName === this.domNode.tagName &&","        next.domNode.getAttribute('cell_id') === this.domNode.getAttribute('cell_id')) {","      next.moveChildren(this);","      next.remove();","    }","  }","}","","TableCell.blotName = 'td';","TableCell.tagName = 'td';","TableCell.scope = Parchment.Scope.BLOCK_BLOT;","TableCell.defaultChild = 'block';","TableCell.allowedChildren = [Block, BlockEmbed, Container];","Quill.register(TableCell);","TableRow.allowedChildren = [TableCell];","","Container.order = [","  'list', 'contain',   // Must be lower","  'td', 'tr', 'table'              // Must be higher","];","","Quill.debug('debug');"]}],[{"start":{"row":0,"column":0},"end":{"row":1,"column":0},"action":"insert","lines":["",""],"id":74}],[{"start":{"row":0,"column":0},"end":{"row":0,"column":25},"action":"insert","lines":["import Quill from 'quill'"],"id":75}],[{"start":{"row":16,"column":0},"end":{"row":16,"column":1},"action":"insert","lines":["e"],"id":76}],[{"start":{"row":16,"column":1},"end":{"row":16,"column":2},"action":"insert","lines":["x"],"id":77}],[{"start":{"row":16,"column":2},"end":{"row":16,"column":3},"action":"insert","lines":["p"],"id":78}],[{"start":{"row":16,"column":3},"end":{"row":16,"column":4},"action":"insert","lines":["o"],"id":79}],[{"start":{"row":16,"column":4},"end":{"row":16,"column":5},"action":"insert","lines":["t"],"id":80}],[{"start":{"row":16,"column":5},"end":{"row":16,"column":6},"action":"insert","lines":[" "],"id":81}],[{"start":{"row":16,"column":4},"end":{"row":16,"column":5},"action":"insert","lines":["r"],"id":82}],[{"start":{"row":67,"column":0},"end":{"row":67,"column":1},"action":"insert","lines":["e"],"id":83}],[{"start":{"row":67,"column":1},"end":{"row":67,"column":2},"action":"insert","lines":["x"],"id":84}],[{"start":{"row":67,"column":2},"end":{"row":67,"column":3},"action":"insert","lines":["p"],"id":85}],[{"start":{"row":67,"column":3},"end":{"row":67,"column":4},"action":"insert","lines":["o"],"id":86}],[{"start":{"row":67,"column":4},"end":{"row":67,"column":5},"action":"insert","lines":["r"],"id":87}],[{"start":{"row":67,"column":5},"end":{"row":67,"column":6},"action":"insert","lines":["t"],"id":88}],[{"start":{"row":67,"column":6},"end":{"row":67,"column":7},"action":"insert","lines":[" "],"id":89}]]},"ace":{"folds":[],"scrolltop":180,"scrollleft":0,"selection":{"start":{"row":54,"column":0},"end":{"row":59,"column":28},"isBackwards":true},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":11,"state":"comment2","mode":"ace/mode/javascript"}},"timestamp":1503555012854,"hash":"c4fb6b2f0a7f382e3316b6b6671d963213078ba6"}