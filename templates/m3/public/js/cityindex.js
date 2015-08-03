
//检测浏览器 如：browser.IE
browser = (function () {
    var ua = navigator.userAgent.toLowerCase();
    return {
        VERSION: ua.match(/(msie|firefox|webkit|opera)[\/:\s](\d+)/) ? RegExp.$2 : '0',
        IE: (ua.indexOf('msie') > -1 && ua.indexOf('opera') == -1),
        GECKO: (ua.indexOf('gecko') > -1 && ua.indexOf('khtml') == -1),
        WEBKIT: (ua.indexOf('applewebkit') > -1),
        OPERA: (ua.indexOf('opera') > -1)
    };
})();
var C,SCount=0;
$(function () {
    C = new City();
    C.init();
});
var City = function () {
    var SCityPop = $("#SCityPop");
    var $li = $(".se");
    var city = $("#city");
    var se = $(".se");
    //var District = $("#District a:gt(0)");
    var District = $("#District a");
    var Campus = $("#Campus li");
    var STitle = $("#STitle");
    var csearch = $("#csearch");
    var SearchList = $("#SearchList");
    var SearchPop = $("#SearchPop");
    var cityname = $("#cityname");
    var poilist = $("#poilist");

    var cid = 0;
    var search = null;
    var init = function () {

        csearch.keyup(citysearch);
        $("body").click(function (c) {
            if (!($(c.target).parents().is("#SearchList") || $(c.target).is("#csearch"))) {
                SearchList.empty().hide();
                poilist.empty().hide();
            }
        });

        $li.click(function () {

            Campus.hide();
            District.hide();
            var $this = $(this).parent();
            cid = $this.attr("CID");
            $(".D" + cid).show();
            $("#Campus li[sd=" + cid + "]").show();


            //$(".S2304").show();
            //$(".S" + cid+"00").show();
            $this.find(".s1").removeClass("s1").addClass("s2");
            STitle.html($(".D" + cid).eq(0).html());
            cityname.html($this.find("span").html());
            if ($this.index() > 0) {
                var left = -144 * $this.index();

                if (browser.IE && browser.VERSION < 7) {
                    city.css("margin-left", left + "px");
                    right();
                    $(".s1").hide();
                }
                else {
                    $(".s1").fadeOut(500);
                    city.stop().animate({ marginLeft: left + "px" }, 500, function () {
                        right();
                    });
                }

            }
            else {
                if (browser.IE && browser.VERSION < 7) {
                    $(".s1").hide();
                    right();
                }
                else
                    $(".s1").fadeOut(500, function () { right(); });
            }
        });

        $("#District a").click(function () {
            C.sshow(this);
        });
    };
    var right = function () {
    	
        SCityPop.show(); 
        if(area_grade < 3){
    	    $('#StationPop').hide();
      	}
        SearchPop.show();
    };
    var reinit = function () {
        se.removeClass("s2").addClass("s1");
        if (browser.IE && browser.VERSION < 7) {
            city.css("margin-left", "0px");
            se.show();
        }
        else {
            se.fadeIn(500);
            city.stop().animate({ marginLeft: "0px" });
        }
        cid = 0;
        SearchPop.hide();
        SCityPop.hide();
    };
    var StationShow = function (e) {
        Campus.hide();
        STitle.html($(e).html());
        if ($(e).attr("DID") == undefined)
            $("li[SD=" + cid + "]").show();
        else {
            $(".S" + $(e).attr("DID")).show();
        }
    };
     
    var citysearch = function () {

        var val = csearch.val();
        if (search != null)
            clearTimeout(search);
        search = setTimeout(function () {
            if (val.length > 0 && val != "输入学校、地址，写字楼查找！") {
              
                var arr = [];
                $.ajax({ type: "GET",
                    url: searchurl,
                    data: { "position": val},
                    cache: false,
                    dataType: 'html',
                    success: function (data) {

                        //SCount = data.root.length;

                        if (data != null && data != '') {
                             
                            SearchList.html(data).show();
                        }
                        else
                            SearchList.empty().hide();

                       // mapabc_place_search(val, citycode);
                    },
                    error: function () {
                    }
                });

                var citycode = "";
                if (cid == 23)
                    citycode = "028";
                else if (cid == 28)
                    citycode = "0931";
                else if (cid == 18)
                    citycode = "027";
                else if (cid == 27)
                    citycode = "029";
                else if (cid == 4)
                    citycode = "023";
               

            }
            else {
                hide();
            }

        }, 300)

    };  
    var hide = function () {
        SearchList.empty().hide();
        poilist.empty().hide();
    };
    return {
        init: init,
        sshow: StationShow,
        re: reinit
    };
};
 

var InputFocus = function (ethis) {
    if (ethis.value == ethis.defaultValue) { ethis.value = ''; ethis.style.color = '#aaa' }
};

var InputBlur = function (ethis) {
    if (!ethis.value) { ethis.value = ethis.defaultValue; ethis.style.color = '#aaa' }
};
