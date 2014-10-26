$(document).ready(function() {
    gettree();
});


function gettree() {
    $('#jstree_skpd').fancytree({
        title: "Daftar SKPD",
        extensions: ["table"],
        table: {
            indentation: 20, // indent 20px per node level
            nodeColumnIdx: 1, // render the node title into the 2nd column
            checkboxColumnIdx: 0  // render the checkboxes into the 1st column
        },
        checkbox: true, // Show checkboxes.
        selectMode: 1, // 1:single, 2:multi, 3:multi-hier
        fx: {height: "toggle", duration: 200}, // Animations, e.g. null or { height: "toggle", duration: 200 }
        keyboard: true,
        source: {
            url: getbasepath() + '/refskpd/json/listdataskpdrootjson',
            data: {key: "1"},
            cache: false
        },
        lazyLoad: function(event, data) {
            var node = data.node;
            console.log("lazy loading ");
            //data.node.load(true);             
            // Issue an ajax request to load child nodes
            data.result = {cache: false, url: getbasepath() + '/refskpd/json/listdataskpdanakjson', data: {id: node.key}}
        },
        renderColumns: function(event, data) {
            var node = data.node, $tdList = $(node.tr).find(">td");
            console.log(node);
            $tdList.eq(2).text(node.data.kodeskpd);
            $tdList.eq(3).text(node.data.kodeunit);
        }

    });
}
