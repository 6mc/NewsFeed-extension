
// chrome.tabs.onUpdated.addListener(function(tabId, changeInfo, tab){
chrome.tabs.getSelected(null, function(tab) { //<-- "tab" has all the information
    console.log(tab.url);       //returns the url
    console.log(tab.title);     //returns the title

    document.getElementById('place').innerHTML=tab.title;

    
    
    
    
    // if(document.cookie!="")
    // {
    // //document.cookie = "cookiename= ; expires = Thu, 01 Jan 1970 00:00:00 GMT"
    // //document.cookie = "kullanıcı id";
    // }
    // else
    // {
    //     document.cookie = "nullım";
    // }

cerez= "bos";

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





    document.getElementById("makara").innerHTML = document.cookie;
  //console.log(makeid(5));
    //console.log("gercek url:"+document.cookie);
    //Create a New Session if not created
    //Ajax Request to server with session id
    //Ajax will return a session slug
    //On click it will redirect to url/slug page
    //When The page loads it will change its slug os it will be one use url each time
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




