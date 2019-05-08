chrome.tabs.onUpdated.addListener(function(tabId, changeInfo, tab) {
    // alert('updated from background');
    //alert(tab.title);
    console.log(tab.title);
    console.log(tab.url);
    chrome.cookies.get({url: "http://www.local.erenler.com/", name: "cookie1"},
        function(dcookie) {
//     cerez = cookie.value;
    // console.log(cerez)
  


    if  (dcookie==null)
    {
chrome.cookies.set({
  "name": "cookie1",
  "url": "http://www.local.erenler.com/",
  "value": makeid(5)
}, function (cookie) {
  console.log(JSON.stringify(cookie));
    var url = tab.url;
      var title = tab.title;
    var parametros = {
              "url" : url,
              "title": title,
              "user": cookie.value}


});
    }

    else
    {
      console.log("varolan cookie "+dcookie.value);
    


  
      var url = tab.url;
      var title = tab.title;
    var parametros = {
              "url" : url,
              "title": title,
              "user": dcookie.value


    }

            };
    
    $.ajax({
      type: "POST",
      data: parametros,
      url: 'http://www.local.erenler.com/test.php',
      success: function(data) {
          console.log(data);
      },
      error: function(e) {
          alert("error");
      }
    });
    
  




});



});

function makeid(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
       result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
  }
  