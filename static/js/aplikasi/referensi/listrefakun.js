$(document).ready(function() {
    gettree();
});


function gettree() {
    $('#jstree_akun').fancytree({
        title: "Daftar Akun",
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
            url: getbasepath() + '/refakun/json/listdataakunrootjson',
            data: {key: "1"},
            cache: false
        },
        lazyLoad: function(event, data) {
            var node = data.node;
            // console.log(node.key);
            //data.node.load(true);             
            // Issue an ajax request to load child nodes
            data.result = {cache: false, url: getbasepath() + '/refakun/json/listdataakunanakjson', data: {id: node.key, level: node.data.lvl}}
        },
        renderColumns: function(event, data) {
            /* var node = data.node, $tdList = $(node.tr).find(">td");
             var pilih = "<a class='icon-edit'  id='pilih" + node.key + "' href='javascript: void(0)' ></a>";
             $tdList.eq(2).html(pilih);*/
        }, click: function(event, data) {


        },
        select: function(event, data) {
            // var s = data.tree.getSelectedNodes().join(", ");
            $("#keyalamat").val(data.node.key)
        }
    });

}
function pindahhalaman() {
    var keyalamat = $("#keyalamat").val();
    if (keyalamat != '') {
        window.location.replace(getbasepath() + "/refakun/updateakun/" + $("#keyalamat").val());
    } else {
         bootbox.alert("Akun yang akan di ubah wajib dipilih");
    }
}
