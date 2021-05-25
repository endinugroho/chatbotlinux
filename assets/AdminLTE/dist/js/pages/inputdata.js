var inputdata = function () {
    //new

    var simpanData = function () {
        $('#updatemanpower').click(function () {
            $.post({
                url: "http://localhost/csb/index.php/inputdata/simpan",

                data: {                
                    data1: $("#manpowerbmc").val(),
                    data2: $("#ritaselebih").val(),
                    data3: $("#ritasesopir").val(),
                },
                dataType: 'json'
            }).done(function (data) {
                //            formKapal.loading('stop');
               
            });
        });
    }

    var simpanDataRepo = function () {
        $('#updaterepo').click(function () {
            $.post({
                url: "http://localhost/csb/index.php/inputdata/simpanrepo",

                data: {                
                    data1: $("#plp20fullharga").val(),
                    data2: $("#plp20fullretase").val(),
                    data3: $("#plp40fullharga").val(),
                    data4: $("#plp40fullretase").val(),
                    data5: $("#c420fullharga").val(),
                    data6: $("#c420fullretase").val(),
                    data7: $("#c440fullharga").val(),
                    data8: $("#c440fullretase").val(),
                    data9: $("#ctp20empharga").val(),
                    data10: $("#ctp20empretase").val(),
                    data11: $("#ctp20fullharga").val(),
                    data12: $("#ctp20fullretase").val(),
                    data13: $("#ctp40empharga").val(),
                    data14: $("#ctp40empretase").val(),
                    data15: $("#ctp40fullharga").val(),
                    data16: $("#ctp40fullretase").val(),
                    data17: $("#ttl20fullharga").val(),
                    data18: $("#ttl20fullretase").val(),
                    data19: $("#ttl40fullharga").val(),
                    data20: $("#ttl40fullretase").val(),
                },
                dataType: 'json'
            }).done(function (data) {
                //            formKapal.loading('stop');
               
            });
        });
    }    
    return {
        init: function () {
            simpanData();
            simpanDataRepo();
        }
    };

}();

jQuery(document).ready(function () {
    inputdata.init();
});

